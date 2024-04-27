<?php

namespace App\Services\Users\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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


    public function get(int $organizationId): Collection
    {
        return User::with('roles')->where('organization_id', '=', $organizationId)->get();
    }

    public function find(int $id): Model
    {
        return User::with('roles')->find($id);
    }

    public function create(array $data): Model
    {
        return User::with('roles')->create($data);
    }

    public function delete(int $id):bool
    {
       return $this->find($id)->delete();
    }

    public function update(int $id, array $data): int
    {
        return $this->find($id)->update($data);
    }

    public function search(string $name, int $organizationId): Collection
    {
        $query = User::with('roles')
            ->where('organization_id','=',$organizationId)->where('name','like','%'.$name.'%');
        return $query->get();
    }
}
