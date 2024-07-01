<?php

namespace App\Exports;
use App\Models\InviteCode;
use App\Models\Work;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WorksExport implements FromView
{
    use HasFactory,Exportable;

    public function __construct(array $data)
    {
        $this->data = $data;
    }


    public function view(): View
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
        $query = $query->with(['year','faculty','department','specialty','user']);
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
            $facultiesIds = $data['selected_faculties'];
            $query = $query->whereIn('faculty_id', $facultiesIds);
        }
        if (isset($data['selected_years']) and count($data['selected_years'])>0) {
            $yearsIds = $data['selected_years'];
            $query = $query->whereIn('year_id', $yearsIds);
        }
        $works = $query->get();
        return view('exports.works', [
            'works' => $works
        ]);
    }
}
