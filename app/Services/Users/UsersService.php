<?php

namespace App\Services\Users;


use App\Services\Services;
use App\Services\Users\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersService extends Services
{
    private UserRepositoryInterface $_repository;
    private RoleRepositoryInterface $_roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        parent::__construct();
        $this->_repository = $userRepository;
        $this->_roleRepository = $roleRepository;
    }

    /**
     * Получить полный список пользователей (за исключением удаленных) без пагинации
     *
     * @return Collection
     */
    public function get_full_list(): Collection
    {
        return $this->_repository->get_full_list();
    }

    /**
     * Получить полный список пользователей (включая удаленные) без пагинации
     *
     * @return Collection
     */
    public function get_full_list_with_trashed(): Collection
    {
        return $this->_repository->get_full_list_with_trashed();
    }

    /**
     * Получить список всех пользователей (за исключением удаленных) с пагинацией
     *
     * @return LengthAwarePaginator
     */
    public function get_all(): LengthAwarePaginator
    {
        return $this->_repository->get_all();
    }

    /**
     * Получить полный список пользователей (включая удаленные) с пагинацией
     *
     * @return LengthAwarePaginator
     */
    public function get_all_with_trashed(): LengthAwarePaginator
    {
        return $this->_repository->get_all_with_trashed();
    }

    /**
     * Получить список всех пользователей для указанной организации c возможностью указания роли.
     * Если организация не указана - будет получен список пользователей текущей организации.
     * Если роль пользователя не указана - будет получен список всех пользователей организации.
     * @param int|null $organizationId
     * @param int|null $roleId
     * @return Collection|null
     */
    public function getUsersForOrganization(?int $organizationId, ?int $roleId): ?Collection
    {
        if (!$organizationId) {
            $organizationId = auth()->user()->organization_id;
        }
        return $this->_repository->getUsersForOrganization($organizationId, $roleId);
    }

    /**
     * Получить список пользователей для указанной организации в соответствии с ролью пользователя
     * @param int $organizationId
     * @param string $userRole
     * @return LengthAwarePaginator
     */
    public function getUsersListForOrganization(int $organizationId, string $userRole): LengthAwarePaginator
    {
        return $this->_repository->getUsersListForOrganization($organizationId, $userRole);
    }

    /**
     * Фильтрация по пользователям
     * @param array $filter ;
     * @return LengthAwarePaginator
     */
    public function filter(array $filter): LengthAwarePaginator
    {
        return $this->_repository->filter($filter);
    }


    /**
     * Создание нового пользователя в хранилище
     *
     * @param array $data
     * @return JsonResponse
     */
    public function create(array $data): JsonResponse
    {
        if (!isset($data['organization_id'])) {
            $user = Auth::user();
            $data['organization_id'] = $user->organization_id;
        }

        if (empty($data)) {
            return self::sendJsonResponse(true, 'danger', [
                'title' => 'Ошибка!',
                'message' => 'Пустой массив данных'
            ]);
        }

        if (auth()->check()) {
            $user = auth()->user();
            if (!$user->hasRole('developer,admin,orgadmin,ddadmin,teacher,librarian')) {
                $data['is_course_author'] = 0;
                $data['is_expert'] = 0;
                $data['is_leading'] = 0;
                $data['is_lector'] = 0;
                $data['with_digital_department'] = 0;
            }
        }

        if (!empty($data['password'])) {
            $password = $data['password'];
            $data['password'] = Hash::make($password);
        }

        if (!isset($data['is_leading'])) {
            $data['is_leading'] = 0;
        }

        if (!isset($data['is_lector'])) {
            $data['is_lector'] = 0;
        }

        if (!isset($data['is_expert'])) {
            $data['is_expert'] = 0;
        }

        if (!isset($data['is_course_author'])) {
            $data['is_course_author'] = 0;
        }

        if (!isset($data['is_approved'])) {
            $data['is_approved'] = 0;
        }

        if (!isset($data['is_blocked'])) {
            $data['is_blocked'] = 0;
        }

        $withDigitalDepartment = (isset($data['with_digital_department']) && $data['with_digital_department'] == 1) ? 1 : 0;
        unset($data['with_digital_department']);

        $user = $this->_repository->create($data, $withDigitalDepartment);

        if ($user && $user->id) {
            $role = $this->_roleRepository->find($data['role']);
            if ($role) {
                $user->attachRole($role);
            }
            return self::sendJsonResponse(false, 'success', [
                'id' => $user->id,
                'title' => 'Успешно!',
                'message' => 'Информация успешно сохранена',
            ]);
        } else {
            return self::sendJsonResponse(false, 'danger', [
                'title' => 'Ошибка!',
                'message' => 'При сохранении данных произошла ошибка',
            ]);
        }
    }

    /**
     * Обновление пользователя в хранилище
     *
     * @param array $data
     * @param int $id
     * @return JsonResponse
     */
    public function update(array $data, int $id): JsonResponse
    {
        $myself = auth()->user();
        $myselfOrganization = $myself->organization_id;

        if (!in_array($myself->roles()->first()->slug,
                ['developer', 'admin']) && $myselfOrganization != $data['organization_id']) {
            abort(403);
        }

        if (empty($data)) {
            return response()->json([
                'error' => true,
                'errorTitle' => 'Ошибка!',
                'errorMessage' => 'Пустой массив данных'
            ]);
        }

        if (isset($data['password']) && strlen($data['password']) > 0) {
            $password = $data['password'];
            $data['password'] = Hash::make($password);
        } else {
            unset($data['password']);
        }
        $withDigitalDepartment = (!isset($data['with_digital_department'])) ? 0 : 1;
        unset($data['with_digital_department']);

        $roleSlug = null;
        if (isset($data['role'])) {
            $roleSlug = $data['role'];
            unset($data['role']);
        }

        $user = $this->_repository->update($data, $withDigitalDepartment, $id);

        if ($user) {
            if ($roleSlug) {
                $role = $this->_roleRepository->find($roleSlug);
                if ($role) {
                    $user->syncRoles([$role->id]);
                }
            }

            return self::sendJsonResponse(false, 'success', [
                'id' => $user->id,
                'title' => 'Успешно!',
                'message' => 'Информация успешно сохранена'
            ]);
        } else {
            return self::sendJsonResponse(true, 'danger', [
                'title' => 'Ошибка!',
                'message' => 'При сохранении данных произошла ошибка'
            ]);
        }
    }

    /**
     * Мягкое удаление пользователя
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        if (!$id) {
            return response()->json([
                'error' => true,
                'errorCode' => '#0001',
                'errorMessage' => 'Не указан ID ресурса'
            ]);
        }

        $result = $this->_repository->destroy($id);

        if ($result) {
            return response()->json([
                "error" => false,
                "successTitle" => "Успешно!",
                "successMessage" => "Ресурс удален успешно",
                "restoreLink" => route('dashboard.users.restore', ['id' => $id]),
                "deleteLink" => route('dashboard.users.delete', ['id' => $id])
            ]);
        } else {
            return response()->json([
                'error' => true,
                'errorCode' => '#D0003',
                'errorMessage' => 'Не удалось удалить ресурс'
            ]);
        }
    }

    /**
     * Восстановление удаленного пользователя
     *
     * @param int $id
     * @return JsonResponse
     */
    public function restore(int $id): JsonResponse
    {
        if (!$id) {
            return response()->json([
                'error' => true,
                'errorCode' => '#0001',
                'errorMessage' => 'Не указан ID ресурса'
            ]);
        }

        $result = $this->_repository->restore($id);

        if ($result) {
            return response()->json([
                'error' => false,
                'successTitle' => 'Успешно!',
                'successMessage' => 'Ресурс восстановлен успешно',
                'updateStatusLink' => route('dashboard.users.toggle-blocked-status', ['item' => $id]),
                'editLink' => route('dashboard.users.edit', ['id' => $id]),
                'destroyLink' => route('dashboard.users.destroy', ['id' => $id]),
                'statusIconClass' => 'icon fas fa-lock blocked',
//                'published' => $result
            ]);
        } else {
            return response()->json([
                'error' => true,
                'errorCode' => '#0004',
                'errorMessage' => 'Не удалось восстановить пользователя'
            ]);
        }
    }

    /**
     * Удаление пользователя из хранилища (восстановлению не подлежит)
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        if (!$id) {
            return response()->json([
                'error' => true,
                'errorCode' => '#0001',
                'errorMessage' => 'Не указан ID ресурса'
            ]);
        }

        $result = $this->_repository->delete($id);

        if ($result) {
            return response()->json([
                'error' => false,
                'successTitle' => 'Успешно!',
                'successMessage' => 'Ресурс удален успешно',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'errorCode' => '#0003',
                'errorMessage' => 'Не удалось удалить ресурс'
            ]);
        }
    }

}
