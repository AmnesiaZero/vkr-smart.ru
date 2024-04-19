<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Models\OrganizationYear;
use App\Services\Faculties\FacultiesService;
use App\Services\FacultiesDepartments\FacultiesDepartmentsService;
use App\Services\OrganizationsYears\OrganizationsYearsService;
use App\Services\Programs\ProgramsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OrganizationsYearsController extends Controller
{
    public array $fillable = [
        'year',
        'comment',
        'students_count'
    ];
    private OrganizationsYearsService $organizationYearsService;

    private FacultiesService $facultiesService;

    private FacultiesDepartmentsService $facultiesDepartmentsService;

    private ProgramsService $programsService;

    public function __construct(OrganizationsYearsService $yearsService,FacultiesService $facultiesService,
        FacultiesDepartmentsService $facultiesDepartmentsService,ProgramsService $programsService)
    {
        $this->organizationYearsService = $yearsService;
        $this->facultiesService = $facultiesService;
        $this->facultiesDepartmentsService = $facultiesDepartmentsService;
        $this->programsService = $programsService;
    }

    public function get(): JsonResponse
    {
        $user = Auth::user();
        $result = $this->organizationYearsService->get($user->id);
        Log::debug('result = '.print_r($result,true));
        return $this->organizationYearsService->get($user->id);
    }

    public function create(Request $request): JsonResponse
    {
        Log::debug('Вошёл в create у organizations years');
        $data = $request->only($this->fillable);
        $validator = Validator::make($data,[
           'year' => 'required|integer',
           'students_count' => 'required|integer'
        ]);
        if($validator->fails()){
            return ValidatorHelper::validatorError($validator);
        }
        $user = Auth::user();
        $data = array_merge($data, ['organization_id' => $user->organization_id, 'user_id' => $user->id]);
        Log::debug('request data = ' . print_r($data, true));
        $result =  $this->organizationYearsService->create($data);
        Log::debug('result = '.$result);
        return $result;
    }

    public function update(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' => ['required','integer',Rule::exists('organizations_year','id')]
        ]);
        if($validator->fails()){
            return ValidatorHelper::validatorError($validator);
        }
        $yearId = $request->id;
        Log::debug('Вошёл в create у organizations years');
        $data = $request->only($this->fillable);
        Log::debug('data = '.print_r($data,true));
        return $this->organizationYearsService->update($yearId,$data);
    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' => ['required','integer',Rule::exists('organizations_year','id')]
        ]);
        if($validator->fails()){
            return ValidatorHelper::validatorError($validator);
        }
        $yearId = $request->id;
        Log::debug('Вошёл в create у organizations years');
        $data = $request->only($this->fillable);
        Log::debug('data = '.print_r($data,true));
        return $this->organizationYearsService->delete($yearId);
    }

    public function copy(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' => ['required','integer',Rule::exists('organizations_year','id')]
        ]);
        if($validator->fails()){
            return ValidatorHelper::validatorError($validator);
        }
        $yearId = $request->id;

       return $this->organizationYearsService->copy($yearId);
    }

}
