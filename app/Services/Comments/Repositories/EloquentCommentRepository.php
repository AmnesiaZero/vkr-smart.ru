<?php

namespace App\Services\Comments\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentCommentRepository implements CommentRepositoryInterface
{

    public function create(array $data): Model
    {
        return Comment::query()->create($data);
    }

    public function find(int $id): Model
    {
        return Comment::with(['work','sender','receiver'])->find($id);
    }

    public function get(int $workId): Collection
    {
        return Comment::with(['work','sender','receiver'])->where('work_id','=',$workId)->get();
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }
}
