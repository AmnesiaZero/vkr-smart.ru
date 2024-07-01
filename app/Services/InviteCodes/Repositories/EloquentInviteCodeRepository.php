<?php

namespace App\Services\InviteCodes\Repositories;

use App\Models\InviteCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentInviteCodeRepository implements InviteCodeRepositoryInterface
{

    public function create(array $data): Model
    {
        return InviteCode::query()->create($data);
    }

    public function get(int $organizationId, int $pageNumber, int $type): LengthAwarePaginator
    {
        return InviteCode::query()->where('organization_id', '=', $organizationId)
            ->where('type', '=', $type)
            ->paginate(10, '*', 'page', $pageNumber);
    }

    public function update(int $id, array $data): bool
    {
        return $this->find($id)->update();
    }

    public function find(int $id): Model
    {
        return InviteCode::query()->find($id);
    }

    public function login(int $id, int $code): bool
    {
        return InviteCode::query()->where('id', '=', $id)
            ->where('code', '=', $code)->exists();
    }

    public function delete(int $organizationId, int $type): bool
    {
        return InviteCode::query()->where('organization_id','=',$organizationId)->where('type','=',$type)->delete();
    }
}
