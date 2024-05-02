<?php

namespace App\Services\Users;


use App\Helpers\JsonHelper;
use App\Models\Department;
use App\Models\User;
use App\Services\Departments\Repositories\DepartmentRepositoryInterface;
use App\Services\Roles\Repositories\RoleRepositoryInterface;
use App\Services\Services;
use App\Services\Users\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UsersService extends Services
{
    private UserRepositoryInterface $_repository;

    private RoleRepositoryInterface $roleRepository;

    private DepartmentRepositoryInterface $departmentRepository;


    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository,
        DepartmentRepositoryInterface $departmentRepository)
    {
        $this->_repository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->departmentRepository = $departmentRepository;
    }


    public function getByEmail(string $email): Model|JsonResponse
    {
        if (!$this->_repository->emailExist($email)) {
            return $this->sendJsonResponse(true, 'success', [
                'title' => 'Ошибка при верификации email',
                'message' => 'Такого email не существует'
            ]);
        }
        return $this->_repository->getByEmail($email);
    }

    public function get(int $organizationId): JsonResponse
    {
        $users = $this->_repository->get($organizationId);
        //Сюда можно добавить ещё какую-нибудь инфу
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'users' => $users
        ]);
    }

    public function create(array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }
        $user = $this->_repository->create($data);
        if ($user and $user->id) {
            if (isset($data['role'])) {
                Log::debug('role = '.$data['role']);
                $role = $this->roleRepository->find($data['role']);
                Log::debug('role eloquent = '.$role);
            }
            else {
                $role = $this->roleRepository->find('user');
            }
            $user->attachRole($role);

            if (isset($data['departments_ids'])){
                $departmentsIds = $data['departments_ids'];
                foreach ($departmentsIds as $id){
                    Log::debug('department id = '.$id);
                    $user->departments()->attach($id);
                }
            }
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Пользователь успешно создан',
                'user' => $user
            ]);
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла  ошибка'
        ]);
    }

    public function find(int $id): JsonResponse
    {
        $user =  $this->_repository->find($id);
        if($user and $user->id){
            return JsonHelper::sendJsonResponse(true,[
               'title' => 'Успешно',
                'user' => $user
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
           'title' => 'Ошибка',
           'message' => 'Ошибка при поиске пользователя'
        ]);
    }


    public function delete(int $id): JsonResponse
    {
        $result = $this->_repository->delete($id);
        if ($result) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Пользователь удален успешно'
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Ошибка при удалении из базы данных'
            ]);
        }
    }

    public function update(int $id,array $data):JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $result = $this->_repository->update($id, $data);

        if ($result) {
            $user = User::query()->find($id);
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'user' => $user
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $result->id
            ]);
        }
    }

    public function addDepartment(int $userId, array $departmentsIds): JsonResponse
    {
        $user = $this->_repository->find($userId);
        if($user and $user->id){
            foreach ($departmentsIds as $departmentId){
               if($this->departmentRepository->exist($departmentId)){
                   $user->departments()->attach($departmentId);
               }
            }
            $updatedUser = $this->_repository->find($userId);
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'message' => 'Кафедра успешно привязана',
                'user' => $updatedUser
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
           'title' => 'Ошибка',
           'message' => 'При получении пользователя произошла ошибка'
        ]);

    }

    public function search(array $data):JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $users =  $this->_repository->search($data);

        if ($users) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Пользователи успешно найдены',
                'users' => $users
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => "Произошла ошибка при получении пользователей",
            ]);
        }
    }

    public function configureAccess(int $organizationId,array $programSpecialties)
    {
        $role = $this->roleRepository->find('inspector');
        $inspectors = $role->users();
        $data = [
            'organization_id' => $organizationId
        ];
        $organizationInspectors =  $this->_repository->filterUsers($inspectors,$data);
        foreach ($organizationInspectors as $inspector){

        }

    }
}
