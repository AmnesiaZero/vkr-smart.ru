<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\Faculties\FacultiesService;
use App\Services\FacultiesDepartments\FacultiesDepartmentsService;
use App\Services\OrganizationsYears\OrganizationsYearsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FacultiesDepartmentsController extends Controller
{

    public FacultiesDepartmentsService $facultiesDepartmentsService;

    public FacultiesService $facultiesService;

    protected array $fillable = [
        'faculty_id',
        'name',
        'year_id'
    ];

    public function __construct(FacultiesDepartmentsService $facultiesDepartmentsService,FacultiesService $facultiesService)
    {
        $this->facultiesDepartmentsService = $facultiesDepartmentsService;
        $this->facultiesService = $facultiesService;
    }

    public function get(Request $request): JsonResponse
    {
        Log::debug('Вошёл в get у faculty departments');
        $validator = Validator::make($request->all(), [
            'faculty_id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $faculty_id = $request->faculty_id;
        $result = $this->facultiesDepartmentsService->get($faculty_id);
        Log::debug('result = '.$result);
        return $this->facultiesDepartmentsService->get($faculty_id);
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $data = $request->only($this->fillable);
        $user = Auth::user();
        $yearId = $this->facultiesService->getYearId($request->faculty_id);
        $data = array_merge($data, ['user_id' => $user->id,'organization_id' => $user->organization_id,'year_id' => $yearId]);
        Log::debug('request data = ' . print_r($data, true));
        return $this->facultiesDepartmentsService->create($data);
    }

    public function update(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer'
        ]);
        if($validator->fails()){
            return ValidatorHelper::validatorError($validator);
        }
        $facultyDepartment = $request->id;
        $data = $request->only($this->fillable);
        Log::debug('data = '.print_r($data,true));
        return $this->facultiesDepartmentsService->update($facultyDepartment,$data);
    }

    public function destroy(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer'
        ]);
        if($validator->fails()){
            return ValidatorHelper::validatorError($validator);
        }
        $facultyId = $request->id;
        Log::debug('Вошёл в create у faculties');
        $data = $request->only($this->fillable);
        Log::debug('data = '.print_r($data,true));
        return $this->facultiesDepartmentsService->destroy($facultyId);
    }
}
