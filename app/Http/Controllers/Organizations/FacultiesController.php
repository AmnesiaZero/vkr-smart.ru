<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\Departments\DepartmentsService;
use App\Services\Faculties\FacultiesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FacultiesController extends Controller
{
    public FacultiesService $facultiesService;

    public DepartmentsService $facultiesDepartmentsService;

    protected array $fillable = [
        'year_id',
        'name'
    ];

    public function __construct(
        FacultiesService   $facultiesService,
        DepartmentsService $facultiesDepartmentsService
    )
    {
        $this->facultiesService = $facultiesService;
        $this->facultiesDepartmentsService = $facultiesDepartmentsService;
    }

    public function get(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'year_id' => ['required', 'integer']
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $yearId = $request->year_id;
        return $this->facultiesService->get($yearId);
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->only($this->fillable);
        $validator = Validator::make($data, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $user = Auth::user();
        $data = array_merge($data, ['user_id' => $user->id, 'organization_id' => $user->organization_id]);
        Log::debug('request data = ' . print_r($data, true));
        return $this->facultiesService->create($data);
    }

    public function update(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'integer', Rule::exists('faculties', 'id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $facultyId = $request->id;
        $data = $request->only($this->fillable);
        Log::debug('data = ' . print_r($data, true));
        return $this->facultiesService->update($facultyId, $data);
    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'integer', Rule::exists('faculties', 'id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $facultyId = $request->id;
        return $this->facultiesService->delete($facultyId);
    }
}
