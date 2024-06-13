<?php

namespace App\Http\Controllers\Works;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\Works\WorksService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WorksController extends Controller
{

    protected array $fillable = [
       'year_id',
        'faculty_id',
        'department_id',
        'specialty_id',
        'student',
        'group',
        'name',
        'scientific_supervisor',
        'work_type',
        'protect_date',
        'assessment',
        'agreement',
        'work_file',
        'self_check',
        'certificate_file'
    ];

    protected WorksService $worksService;


    public function __construct(WorksService $worksService)
    {
        $this->worksService = $worksService;
    }

    public function studentsWorksView()
    {
        return $this->worksService->studentsWorksView();
    }

    public function employeesWorksView()
    {
        return $this->worksService->employeesWorksView();
    }

    public function get(): JsonResponse
    {
        return $this->worksService->get();
    }

    public function create(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'year_id' => ['integer','required',Rule::exists('organizations_years','id')],
            'faculty_id' => ['integer','required',Rule::exists('faculties','id')],
            'department_id' => ['integer','required',Rule::exists('departments','id')],
            'specialty_id' => ['integer','required',Rule::exists('programs_specialties','id')],
            'student' => 'required|max:250',
            'group' => 'required|max:250',
            'scientific_supervisor' => 'max:250',
            'work_type' => 'required|max:250',
            'protect_date' => 'required|date',
            'assessment' => 'required|integer|min:0|max:5',
            'agreement' => 'integer:in:1',
            'work_file' => 'required|file',
            'self_check' => 'integer:in:1',
            'certificate_file' => 'file'
        ]);
        if ($validator->fails())
        {
            return ValidatorHelper::validatorError($validator);
        }
        $data = $request->only($this->fillable);
        return $this->worksService->create($data);
    }

    public function search(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'specialty_id' => ['integer',Rule::exists('programs_specialties','id')],
            'student' => 'max:250',
            'group' => 'max:250',
            'scientific_supervisor' => 'max:250',
            'protect_date' => 'max:250'
        ]);
        if ($validator->fails())
        {
            return ValidatorHelper::validatorError($validator);
        }
        $data = $request->only($this->fillable);
        return $this->worksService->search($data);
    }
}
