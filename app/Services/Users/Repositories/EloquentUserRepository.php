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
        return User::with(['roles','departments'])->where('organization_id', '=', $organizationId)->get();
    }

    public function find(int $id): Model
    {
        return User::with(['roles','departments','organization'])->find($id);
    }

    public function create(array $data): Model
    {
        return User::with(['roles','departments'])->create($data);
    }

    public function delete(int $id):bool
    {
       return $this->find($id)->delete();
    }

    public function update(int $id, array $data): int
    {
        return $this->find($id)->update($data);
    }

    public function search(array $data): Collection
    {
        $query = User::with(['roles','departments']);
        if (isset($data['organization_id'])){
            $query = $query->where('organization_id','=',$data['organization_id']);
        }
        if (isset($data['name'])){
            $query = $query->where('name','like','%'.$data['name'].'%');
        }
        if(isset($data['where_in'])){
            $values = $data['where_in'];
            $query = $query->whereIn('id',$values);
        }
        return $query->get();
    }

    public function filterUsers(Collection $users,array $data):Collection
    {
        if (isset($data['organization_id'])){
            $users = $users->where('organization_id','=',$data['organization_id']);
        }
        if (isset($data['name'])){
            $users = $users->where('name','like','%'.$data['name'].'%');
        }
        if(isset($data['where_in'])){
            $values = $data['where_in'];
            $users = $users->whereIn('id',$values);
        }
        return $users;
    }
}
