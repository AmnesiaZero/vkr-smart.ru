<?php

namespace App\Services\Works\Repositories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class EloquentWorkRepository implements WorkRepositoryInterface
{

    public function get(int $organizationId): Collection
    {
        return Work::with('specialty')->where('organization_id', '=', $organizationId)->get();
    }

    public function create(array $data): Model
    {
        return Work::query()->create($data);
    }

    public function find(int $id): Model
    {
        return Work::with('specialty')->find($id);
    }

    public function search(array $data): Collection
    {
        $query = Work::query();
        $scientificSupervisor = $data['scientific_supervisor'];
        if (isset($scientificSupervisor))
        {
            $query->where('scientific_supervisor','like','%'.$scientificSupervisor);
        }
        $student = $data['student'];
        if (isset($student))
        {
            $query = $query->where('student','like','%'.$student);
        }
        $group = $data['group'];
        if (isset($group))
        {
            $query = $query->where('group','like','%'.$group);
        }
        $workType = $data['work_type'];
        if (isset($workType))
        {
            $query = $query->where('work_type','like','%'.$workType);
        }
        $specialtyId = $data['specialty_id'];
        if(isset($specialtyId))
        {
            $query = $query->where('specialty_id','=',$specialtyId);
        }
        $works = $query->get();
        if (isset($data['selected_faculties'])) {
            Log::debug('Вошёл в условие');
            $facultiesIds = $data['selected_faculties'];
            $works = $works->filter(function ($work) use ($facultiesIds) {
                return $work->faculty->whereIn('id', $facultiesIds)->isNotEmpty();
            });
        }

        if (isset($data['selected_years'])) {
            $yearsIds = $data['selected_years'];
            $works = $works->filter(function ($work) use ($yearsIds) {
                return $work->faculty->whereIn('year.id', $yearsIds)->isNotEmpty();
            });
        }
        return $works;
    }
}
