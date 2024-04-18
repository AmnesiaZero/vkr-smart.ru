<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\Specialties\SpecialtiesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SpecialtiesController extends Controller
{

    protected array $fillable = [
        'specialty_id',
        'code',
        'name'
    ];

    public SpecialtiesService $specialtiesService;

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
        $result = $this->specialtiesService->get($faculty_id);
        Log::debug('result = '.$result);
        return $this->specialtiesService->get($faculty_id);
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
        return $this->specialtiesService->create($data);
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
        return $this->specialtiesService->update($facultyDepartment,$data);
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
        return $this->specialtiesService->destroy($facultyId);
    }
}
