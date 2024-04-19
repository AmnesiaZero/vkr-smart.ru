<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\ProgramsSpecialties\ProgramsSpecialtiesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProgramsSpecialtiesController extends Controller
{

    public array $fillable = [

    ];
   public ProgramsSpecialtiesService $programsSpecialtiesService;

   public function __construct(ProgramsSpecialtiesService $programsSpecialtiesService)
   {
       $this->programsSpecialtiesService = $programsSpecialtiesService;
   }


    public function get(Request $request): JsonResponse
    {
        Log::debug('Вошёл в get у faculty departments');
        $validator = Validator::make($request->all(), [
            'program_id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $programId = $request->program_id;
        return $this->programsSpecialtiesService->get($programId);
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
        $data = array_merge($data, ['user_id' => $user->id,'organization_id' => $user->organization_id]);
        Log::debug('request data = ' . print_r($data, true));
        return $this->programsSpecialtiesService->create($data);
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
        return $this->programsSpecialtiesService->update($facultyDepartment,$data);
    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer'
        ]);
        if($validator->fails()){
            return ValidatorHelper::validatorError($validator);
        }
        $id = $request->id;
        Log::debug('Вошёл в create у faculties');
        $data = $request->only($this->fillable);
        Log::debug('data = '.print_r($data,true));
        return $this->programsSpecialtiesService->delete($id);
    }
}
