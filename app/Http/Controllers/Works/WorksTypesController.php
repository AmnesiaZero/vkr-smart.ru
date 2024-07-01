<?php

namespace App\Http\Controllers\Works;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\WorksTypes\WorksTypesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WorksTypesController extends Controller
{
    protected WorksTypesService $worksTypesService;

    protected array $fillable = [
        'name'
    ];

    public function __construct(WorksTypesService $worksTypesService)
    {
        $this->worksTypesService = $worksTypesService;
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:250'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $data = $request->only($this->fillable);
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $data['organization_id'] = $organizationId;
        return $this->worksTypesService->create($data);
    }

    public function get(): JsonResponse
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        return $this->worksTypesService->get($organizationId);
    }

    public function delete(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' => ['integer',Rule::exists('works_types','id')],
        ]);
        if ($validator->fails())
        {
            return ValidatorHelper::error($validator);
        }
        $id = $request->id;
        return $this->worksTypesService->delete($id);
    }


}
