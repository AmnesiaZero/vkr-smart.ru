<?php

namespace App\Http\Controllers\Works;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\AdditionalFiles\AdditionalFilesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdditionalFilesController extends Controller
{

    private AdditionalFilesService $additionalFilesService;

    private array $fillable = [
        'work_id',
        'additional_file'
    ];

    public function __construct(AdditionalFilesService $additionalFilesService)
    {
        $this->additionalFilesService = $additionalFilesService;
    }


    public function get(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'work_id' =>  ['required','integer',Rule::exists('works','id')]
        ]);
        if ($validator->fails())
        {
            return ValidatorHelper::error($validator);
        }
        $workId = $request->work_id;
        return $this->additionalFilesService->get($workId);
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'work_id' =>  ['required','integer',Rule::exists('works','id')],
            'additional_file' => 'required|file'
        ]);
        if ($validator->fails())
        {
            return ValidatorHelper::error($validator);
        }
        $data = $request->only($this->fillable);
        return $this->additionalFilesService->create($data);
    }

    public function download(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' =>  ['required','integer',Rule::exists('additional_files','id')],
        ]);
        if ($validator->fails())
        {
            return ValidatorHelper::error($validator);
        }
        $id = $request->id;
        return $this->additionalFilesService->download($id);
    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' =>  ['required','integer',Rule::exists('additional_files','id')],
        ]);
        if ($validator->fails())
        {
            return ValidatorHelper::error($validator);
        }
        $id = $request->id;
        return $this->additionalFilesService->delete($id);
    }
}
