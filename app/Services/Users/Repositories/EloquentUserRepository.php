<?php

namespace App\Services\Users\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EloquentUserRepository implements UserRepositoryInterface
{

    private UserRepositoryInterface $_repository;

    /**
     * Получить полный список пользователей (за исключением удаленных) без пагинации
     *
     * @return Collection
     */
    public function get_full_list(): Collection
    {
        return User::all();
    }

    /**
     * Получить полный список пользователей (включая удаленные) без пагинации
     *
     * @return Collection
     */
    public function get_full_list_with_trashed(): Collection
    {
        return User::withTrashed()->all();
    }

    /**
     * Получить список всех пользователей (за исключением удаленных) с пагинацией
     *
     * @return LengthAwarePaginator
     */
    public function get_all(): LengthAwarePaginator
    {
        return User::query()->with('organization')->paginate(20);
    }

    /**
     * Получить список всех ресурсов (включая удаленные) с пагинацией
     *
     * @return LengthAwarePaginator
     */
    public function get_all_with_trashed(): LengthAwarePaginator
    {
        return User::withTrashed()->with('organization')->paginate(20);
    }

    /**
     * Поиск пользователя по его идентификатору (ID)
     *
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function find(int $id)
    {
        $user = $this->_repository->find($id);

        if ($user->roles()->count() > 0) {
            $user->role_name = $user->roles()->first()->name;
            $user->role_slug = $user->roles()->first()->slug;
        } else {
            $user->role_name = null;
            $user->role_slug = null;
        }

        return $user;
    }


    /**
     * Получить список пользователей для указанной организации в соответствии с ролью пользователя
     * @param int $organizationId
     * @param string $userRole
     * @return LengthAwarePaginator
     */
    public function getUsersListForOrganization(int $organizationId, string $userRole): LengthAwarePaginator
    {
        $query = User::query()->select('users.*');
        $query->where('organization_id', '=', $organizationId);
        switch ($userRole) {
            case 'teacher':
                $query->join('role_user', function ($join) {
                    $join->on('users.id', '=', 'role_user.user_id');
                });
                $query->join('roles', function ($join) {
                    $join->on('role_user.role_id', '=', 'roles.id');
                    $join->where('roles.slug', '=', 'student');
                });
                $query->where('is_approved', '=', 1);
                break;
            default:
                break;
        }
        $query->orderBy('name', 'ASC');

        return $query->paginate(20);
    }

    /**
     * Получить список пользователей для указанной организации в соответствии с ролью пользователя без пагинации
     *
     * @param int $organizationId
     * @param string $userRole
     * @return array
     */
    public function getUsersListForOrganizationWithoutPaginate(int $organizationId, string $userRole): array
    {
        $query = User::query()->select('users.*');

        $query->where('organization_id', '=', $organizationId);
        switch ($userRole) {
            case 'teacher':
                $query->join('role_user', function ($join) {
                    $join->on('users.id', '=', 'role_user.user_id');
                });
                $query->join('roles', function ($join) {
                    $join->on('role_user.role_id', '=', 'roles.id');
                    $join->where('roles.slug', '=', 'student');
                });
                $query->where('is_approved', '=', 1);
                break;
            default:
                break;
        }
        $query->orderBy('name', 'ASC');

        return $query->get()->toArray();
    }


    /**
     * Поиск пользователя по заданным параметрам
     *
     * @param array $filter
     * @param bool $withPagination
     * @return LengthAwarePaginator|Collection
     */
    public function search(array $filter, bool $withPagination)
    {
        $query = User::query();

        if (isset($filter['login']) && strlen($filter['login']) > 0) {
            $query->where('login', 'like', '%' . $filter['login'] . '%');
        }

        if (isset($filter['email']) && strlen($filter['email']) > 0) {
            $query->where('email', 'like', '%' . $filter['email'] . '%');
        }

        if (isset($filter['organization_id']) && strlen($filter['organization_id']) > 0) {
            $query->where('organization_id', '=', $filter['organization_id']);
        }

        $query->orderBy('name', 'ASC');

        if ($withPagination) {
            return $query->paginate(20);
        } else {
            return $query->get();
        }
    }

    /**
     * Фильтрация пользователей в панели управления
     * @param array #filter;
     * @return LengthAwarePaginator
     */
    public function filter(array $filter): LengthAwarePaginator
    {
        $query = User::query()->with('organization')->select('users.*');
        if (!empty($filter)) {
            if (isset($filter['name'])) {
                $query->where('name', 'like', '%' . $filter['name'] . '%');
            }
            if (isset($filter['login'])) {
                $query->where('login', 'like', '%' . $filter['login'] . '%');
            }
            if (isset($filter['email'])) {
                $query->where('email', 'like', '%' . $filter['email'] . '%');
            }
            if (isset($filter['organization_id'])) {
                $query->where('organization_id', '=', $filter['organization_id']);
            }
            if (isset($filter['role'])) {
                $query->join('role_user', function ($join) {
                    $join->on('role_user.user_id', '=', 'users.id');
                });
                $query->where('role_user.role_id', '=', $filter['role']);
            }
        }
        $query->groupBy('users.id');
        $query->orderBy('users.name', 'ASC');

        return $query->paginate(20);
    }


    /**
     * Создание нового пользователя в хранилище
     * @param array $data
     * @param int $withDigitalDepartment
     * @return Model|bool
     */
    public function create(array $data, int $withDigitalDepartment): Model|bool
    {
        DB::beginTransaction();

        try {
            $user = User::query()->create($data);
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }

        DB::commit();
        return $user;
    }

    /**
     * Обновление пользователя в хранилище
     * @param array $data
     * @param int $withDigitalDepartment
     * @param int $id
     * @return Model|bool
     */
    public function update(array $data, int $withDigitalDepartment, int $id): Model|bool
    {
        DB::beginTransaction();

        try {
//            tap(User::query()->where('id', $id))->update($data)->first();
            $user = User::query()->where('id', '=', $id)->first();
            $user->update($data);
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }

        DB::commit();
        return $user;
    }

    /**
     * Мягкое удаление пользователя
     *
     * @param int $id
     * @return bool|Response|int
     */
    public function destroy(int $id)
    {
        return User::query()->where('id', $id)->delete();
    }

    /**
     * Удаление пользователя из хранилища (восстановлению не подлежит)
     *
     * @param int $id
     * @return bool|Response|int
     */
    public function delete(int $id)
    {
        return User::query()->where('id', $id)->forceDelete();
    }

    /**
     * Восстановление удаленного пользователя
     *
     * @param int $id
     * @return bool|Response|int
     */
    public function restore(int $id)
    {
        return User::query()->where('id', $id)->restore();
    }


}
