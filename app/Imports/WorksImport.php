<?php

namespace App\Imports;


use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithFormatData;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class WorksImport implements ToCollection,WithFormatData
{

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection(Collection $collection)
    {
        Log::debug('data = '.print_r($this->data,true));
        $collection = $collection->splice(1);
        foreach ($collection as $work)
        {
            $protectDate = Carbon::createFromFormat('d.m.Y', $work[5])->toDateString();
            $workData = [
                'student' => $work[0],
                'group'                => $work[1],
                'name'                 => $work[2],
                'scientific_supervisor' => $work[3],
                'work_type'            => $work[4],
                'protect_date' =>  $protectDate,
                'assessment'           => $work[6],
            ];
            $allData = array_merge($workData,$this->data);
            Log::debug('all data = '.print_r($allData,true));
            Work::create($allData);
        }
    }
}
