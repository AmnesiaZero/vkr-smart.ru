<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\OrganizationsFaculties\OrganizationsFacultiesService;
use App\Services\OrganizationsFacultiesDepartments\OrganizationsFacultiesDepartmentsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrganizationsFacultiesDepartmentsController extends Controller
{

    public OrganizationsFacultiesDepartmentsService $facultiesDepartmentsService;

    protected array $fillable = [
        'faculty_id',
        'name',
        'students_count',
        'graduates_count',
        'year_id'
    ];

    public function __construct(OrganizationsFacultiesDepartmentsService $facultiesDepartmentsService)
    {
        $this->facultiesDepartmentsService = $facultiesDepartmentsService;
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
        $data = $request->only($this->fillable);
        $validator = Validator::make($data, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $user = Auth::user();
        $data = array_merge($data, ['user_id' => $user->id,'organization_id' => $user->organization_id]);
        Log::debug('request data = ' . print_r($data, true));
        return $this->facultiesDepartmentsService->create($data);
    }
}
