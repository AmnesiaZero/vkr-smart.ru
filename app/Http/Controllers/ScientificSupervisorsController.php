<?php

namespace App\Http\Controllers;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\ScientificSupervisors\ScientificSupervisorsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ScientificSupervisorsController extends Controller
{

    protected ScientificSupervisorsService $scientificSupervisorsService;

    protected array $fillable = [
        'name',
        'organization_id'
    ];

    public function __construct(ScientificSupervisorsService $scientificSupervisorsService)
    {
        $this->scientificSupervisorsService = $scientificSupervisorsService;
    }


    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:250'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $data = $request->only($this->fillable);
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $data['organization_id'] = $organizationId;
        return $this->scientificSupervisorsService->create($data);
    }

    public function get(Request $request): JsonResponse
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        return $this->scientificSupervisorsService->get($organizationId);
    }

}
