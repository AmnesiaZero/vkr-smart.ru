<?php

namespace App\Services\Users\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getByEmail(string $email): Model
    {
        return User::query()->where('email', '=', $email)->first();
    }

    public function emailExist(string $email): bool
    {
        return User::query()->where('email', '=', $email)->exists();
    }

    public function create(array $data): Model
    {
        return User::with(['roles', 'departments'])->create($data);
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }

    public function find(int $id): Model
    {
        return User::with(['roles', 'departments', 'organization','works','educations','careers','achievements'])->find($id);
    }

    public function update(int $id, array $data): int
    {
        return $this->find($id)->update($data);
    }

    public function search(array $data): Collection
    {
        $query = User::with(['roles', 'departments','works']);
        if (isset($data['organization_id'])) {
            $query = $query->where('organization_id', '=', $data['organization_id']);
        }
        if (isset($data['name'])) {
            $query = $query->where('name', 'like', '%' . $data['name'] . '%');
        }
        if (isset($data['where_in'])) {
            $values = $data['where_in'];
            $query = $query->whereIn('id', $values);
        }
        if (isset($data['email'])) {
            $query = $query->where('email', 'like', '%' . $data['email'] . '%');
        }
        if (isset($data['is_active'])) {
            $query = $query->where('is_active', '=', $data['is_active']);
        }
        if (isset($data['group'])) {
            $query = $query->where('group', 'like', '%' . $data['group'] . '%');
        }
        $users = $query->get();

        if (isset($data['selected_departments']) and count($data['selected_departments'])>0) {
            Log::debug('Вошёл в условие');
            $departmentsIds = $data['selected_departments'];
            $users = $users->filter(function ($user) use ($departmentsIds) {
                return $user->departments->whereIn('id', $departmentsIds)->isNotEmpty();
            });
        }

        if (isset($data['selected_years']) and count($data['selected_years'])>0) {
            $yearsIds = $data['selected_years'];
            $users = $users->filter(function ($user) use ($yearsIds) {
                return $user->departments->whereIn('year.id', $yearsIds)->isNotEmpty();
            });
        }

        if (isset($data['roles'])) {
            $roles = $data['roles'];
            $users = $users->filter(function ($user) use ($roles) {
                return $user->roles->whereIn('slug', $roles)->isNotEmpty();
            });
        }
        if (isset($data['role'])) {
            $role = $data['role'];
            $users = $users->filter(function ($user) use ($role) {
                return $user->roles->where('slug', '=', $role)->isNotEmpty();
            });
        }
        return $users;
    }

    public function get(int $organizationId, array $roles, bool $pagination): Collection|LengthAwarePaginator
    {
        $users =  User::with(['roles', 'departments','works'])->where('organization_id', '=', $organizationId);
        if($pagination)
        {
            return $users->paginate(config('pagination.per_page'),'*','page',1);
        }
        return $users->get()->filter(function ($user) use ($roles) {
                return $user->roles->whereIn('slug', $roles)->isNotEmpty();
            });
    }

    public function filterUsers(Collection $users, array $data): Collection
    {
        if (isset($data['organization_id'])) {
            $users = $users->where('organization_id', '=', $data['organization_id']);
        }
        if (isset($data['name'])) {
            $users = $users->where('name', 'like', '%' . $data['name'] . '%');
        }
        if (isset($data['where_in'])) {
            $values = $data['where_in'];
            $users = $users->whereIn('id', $values);
        }
        return $users;
    }

    public function exists(int $id): bool
    {
        return User::query()->where('id','=',$id)->exists();
    }
}
