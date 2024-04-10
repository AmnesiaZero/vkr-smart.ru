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

class OrganizationsDepartmentsController extends Controller
{
    public OrganizationsFacultiesService $departmentsService;
    public OrganizationsFaculties $facultyDepartment;

    public function __construct(
        OrganizationsFacultiesService $departmentsService,
        OrganizationsFaculties $facultyDepartment
    ) {
        $this->departmentsService = $departmentsService;
        $this->facultyDepartment = $facultyDepartment;
    }

    public function create(Request $request): mixed
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'students_count' => 'integer',
            'graduates_count' => 'integer'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $data = $request->only($this->facultyDepartment->getFillable());
        $user = Auth::user();
        //faculty id поменять
        $data = array_merge($data, ['organization_id' => $user->organization_id, 'faculty_id' => 1]);
        Log::debug('request data = ' . print_r($data, true));
        $this->departmentsService->create($data);
        return back();
    }
}
