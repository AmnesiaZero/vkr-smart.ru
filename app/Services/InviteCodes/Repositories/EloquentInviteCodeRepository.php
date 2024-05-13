<?php

namespace App\Services\InviteCodes\Repositories;

use App\Models\InviteCode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentInviteCodeRepository implements InviteCodeRepositoryInterface
{

    public function create(array $data):Model
    {
        return InviteCode::query()->create($data);
    }

    public function get(int $organizationId): Collection
    {
       return InviteCode::query()->where('organization_id','=',$organizationId)->get();
    }

    public function find(int $id): Model
    {
        return InviteCode::query()->find($id);
    }

    public function update(int $id,array $data): bool
    {
        return $this->find($id)->update();
    }

    public function login(int $id, int $code): bool
    {
        return InviteCode::query()->where('id','=',$id)
            ->where('code','=',$code)->exists();
    }
}