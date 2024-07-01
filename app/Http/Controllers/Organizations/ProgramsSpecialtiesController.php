<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\ProgramsSpecialties\ProgramsSpecialtiesService;
use App\Services\Specialties\SpecialtiesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProgramsSpecialtiesController extends Controller
{
    public ProgramsSpecialtiesService $programsSpecialtiesService;

    public SpecialtiesService $specialtiesService;

    public array $fillable = [
        'program_id',
        'specialty_id',
        'code',
        'name',
        'q_percent',
        'borrowed_percent'

    ];

    public function __construct(
        ProgramsSpecialtiesService $programsSpecialtiesService,
        SpecialtiesService         $specialtiesService
    )
    {
        $this->programsSpecialtiesService = $programsSpecialtiesService;
        $this->specialtiesService = $specialtiesService;
    }


    public function get(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'program_id' => ['required','integer',Rule::exists('programs','id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $programId = $request->program_id;
        return $this->programsSpecialtiesService->get($programId);
    }

    public function getByOrganization(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'organization_id' => ['required','integer',Rule::exists('organizations','id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $organizationId = $request->organization_id;
        return $this->programsSpecialtiesService->getByOrganizationId($organizationId);
    }


    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'program_id' => ['required', Rule::exists('programs', 'id')],
            'specialty_id' => [Rule::exists('specialties', 'id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $data = $request->only($this->fillable);
        $user = Auth::user();
        $data = array_merge($data, ['user_id' => $user->id, 'organization_id' => $user->organization_id]);
        if ($request->has('specialty_id')) {
            $specialtyId = $request->specialty_id;
            $specialty = $this->specialtiesService->find($specialtyId);
            $data = array_merge($data, $specialty->only('name', 'code'));
        }
        Log::debug('request data = ' . print_r($data, true));
        return $this->programsSpecialtiesService->create($data);
    }


    public function update(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $facultyDepartment = $request->id;
        $data = $request->only($this->fillable);
        Log::debug('data = ' . print_r($data, true));
        return $this->programsSpecialtiesService->update($facultyDepartment, $data);
    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', Rule::exists('programs_specialties', 'id')]
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::error($validator);
        }
        $id = $request->id;
        $data = $request->only($this->fillable);
        return $this->programsSpecialtiesService->delete($id);
    }
}
