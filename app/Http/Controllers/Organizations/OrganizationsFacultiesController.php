<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Models\OrganizationsFaculties;
use App\Services\OrganizationsFaculties\OrganizationsFacultiesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class OrganizationsFacultiesController extends Controller
{
    public OrganizationsFacultiesService $facultiesService;

    protected array $fillable = [
        'year_id',
        'name',
        'students_count',
        'graduates_count'
    ];

    public function __construct(OrganizationsFacultiesService $facultiesService)
    {
        $this->facultiesService = $facultiesService;
    }

    public function get(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'year_id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $yearId = $request->year_id;
        $result = $this->facultiesService->get($yearId);
        Log::debug('result = '.$result);
        return $this->facultiesService->get($yearId);
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->only($this->fillable);
        $validator = Validator::make($data, [
            'name' => 'required',
            'students_count' => 'integer',
            'graduates_count' => 'integer'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $user = Auth::user();
        //faculty id поменять
        $data = array_merge($data, ['user_id' => $user->id,'organization_id' => $user->organization_id]);
        Log::debug('request data = ' . print_r($data, true));
        return $this->facultiesService->create($data);
    }
}
