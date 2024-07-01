<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\Programs\ProgramsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProgramsController extends Controller
{
    public ProgramsService $programsService;


    protected array $fillable = [
        'educational_level',
        'level',
        'department_id',
        'name',
        'year_id'
    ];

    public function __construct(ProgramsService $programsService)
    {
        $this->programsService = $programsService;
    }

    public function get(Request $request): JsonResponse
    {
        Log::debug('Вошёл в get у faculty departments');
        $validator = Validator::make($request->all(), [
            'department_id' => ['required', 'integer']
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $departmentId = $request->department_id;
        return $this->programsService->get($departmentId);
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $data = $request->only($this->fillable);
        $user = Auth::user();
        $data = array_merge($data, ['user_id' => $user->id, 'organization_id' => $user->organization_id]);
        Log::debug('request data = ' . print_r($data, true));
        return $this->programsService->create($data);
    }

    public function update(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'integer', Rule::exists('programs', 'id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $id = $request->id;
        $data = $request->only($this->fillable);
        Log::debug('data = ' . print_r($data, true));
        return $this->programsService->update($id, $data);
    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'integer', Rule::exists('programs', 'id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $id = $request->id;
        return $this->programsService->delete($id);
    }

    public function find(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $id = $request->id;
        return $this->programsService->find($id);
    }
}
