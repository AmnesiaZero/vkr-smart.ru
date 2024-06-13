<?php

namespace App\Services\Works\Repositories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentWorkRepository implements WorkRepositoryInterface
{

    public function get(int $organizationId,int $pageNumber): LengthAwarePaginator
    {
        return Work::with(['specialty','faculty'])->where('organization_id', '=', $organizationId)->paginate(config('pagination.per_page'),'*','page',$pageNumber);
    }

    public function create(array $data): Model
    {
        return Work::query()->create($data);
    }

    public function find(int $id): Model
    {
        return Work::with('specialty')->find($id);
    }

    public function search(array $data): LengthAwarePaginator
    {
        $query = Work::with(['specialty','faculty']);
        if (isset($data['scientific_supervisor']))
        {
            $query->where('scientific_supervisor','like','%'.$data['scientific_supervisor']);
        }
        if (isset($data['student']))
        {
            $query = $query->where('student','like','%'.$data['student']);
        }
        if (isset($data['group']))
        {
            $query = $query->where('group','like','%'.$data['group']);
        }
        if (isset($data['work_type']))
        {
            $query = $query->where('work_type','like','%'.$data['work_type']);
        }
        if(isset($data['specialty_id']))
        {
            $query = $query->where('specialty_id','=',$data['specialty_id']);
        }
        $worksPagination = $query->paginate(config('pagination.per_page'),'*','page',1);
        $works = $query->get();
        if (isset($data['selected_faculties'])) {
            Log::debug('Вошёл в условие');
            $facultiesIds = $data['selected_faculties'];
            Log::debug('faculties = '.print_r($facultiesIds,true));
            $works = $works->filter(function ($work) use ($facultiesIds) {
                return in_array($work->faculty,$facultiesIds);
            });
        }
        if (isset($data['selected_years'])) {
            $yearsIds = $data['selected_years'];
            $works = $works->filter(function ($work) use ($yearsIds) {
                return in_array($work->year,$yearsIds);
            });
        }
        $worksPagination->data = $works;
        return $worksPagination;
    }
}
