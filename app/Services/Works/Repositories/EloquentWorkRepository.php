<?php

namespace App\Services\Works\Repositories;

use App\Models\StudentWork;
use App\Models\Work;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentWorkRepository implements WorkRepositoryInterface
{

    public function get(int $organizationId, int $pageNumber, int $userType): LengthAwarePaginator
    {
        return Work::withTrashed()->with(['faculty','specialty'])->where('organization_id', '=', $organizationId)->where('user_type','=',$userType)->paginate(config('pagination.per_page'),'*','page',$pageNumber);
    }

    public function create(array $data): Model
    {
        return Work::query()->create($data);
    }

    public function find(int $id): Model
    {
        return Work::withTrashed()->with('specialty','year','faculty','department','user')->find($id);
    }

    public function search(array $data): LengthAwarePaginator
    {
        $query = Work::query();
        if(isset($data['delete_type']))
        {
            $deleteType = $data['delete_type'];
            if ($deleteType==1)
            {
                $query = Work::withTrashed()->where('deleted_at','!=',null);
            }
            elseif($deleteType==2)
            {
                $query = Work::withTrashed();
            }
        }
        $query->with(['specialty','faculty','department']);
        if(isset($data['user_type']))
        {
            $query = $query->where('user_type','=',$data['user_type']);
        }
        if (isset($data['scientific_supervisor']))
        {
            $query->where('scientific_supervisor','like','%'.$data['scientific_supervisor']);
        }
        if (isset($data['student']))
        {
            $query = $query->where('student','like','%'.$data['student'].'%');
        }
        if (isset($data['group']))
        {
            $query = $query->where('group','like','%'.$data['group'].'%');
        }
        if (isset($data['work_type']))
        {
            $query = $query->where('work_type','like','%'.$data['work_type'].'%');
        }
        if (isset($data['name']))
        {
            $query = $query->where('name','like','%'.$data['name'].'%');
        }
        if(isset($data['specialty_id']))
        {
            $query = $query->where('specialty_id','=',$data['specialty_id']);
        }
        if (isset($data['start_date']))
        {
            $query = $query->where('protect_date','>',$data['start_date']);
        }
        if (isset($data['end_date']))
        {
            $query = $query->where('protect_date','<',$data['end_date']);
        }
        if (isset($data['selected_faculties']) and count($data['selected_faculties'])>0) {
            Log::debug('selected_faculties = '.print_r($data['selected_faculties'],true));
            $facultiesIds = $data['selected_faculties'];
            $query = $query->whereIn('faculty_id', $facultiesIds);
        }
        if (isset($data['selected_years']) and count($data['selected_years'])>0) {
            Log::debug('вошёл в selected_years');
            $yearsIds = $data['selected_years'];
            $query = $query->whereIn('year_id', $yearsIds);
        }
        return $query->paginate(config('pagination.per_page'),'*','page',1);
    }


    public function update(int $id, array $data)
    {
        return $this->find($id)->update($data);
    }

    public function copy(int $id)
    {
        return Work::query()->where('id','=',$id)->first()->duplicate();
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }

    public function destroy(int $id): bool
    {
        return $this->find($id)->forceDelete();
    }

    public function restore(int $id)
    {
        return Work::withTrashed()->where('id','=',$id)->first()->restore();
    }
}
