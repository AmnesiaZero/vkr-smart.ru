<?php

namespace App\Http\Controllers\Organizations;

use App\Http\Controllers\Controller;
use App\Models\OrganizationsDepartment;
use App\Models\OrganizationsYear;
use App\Services\OrganizationsDepartments\OrganizationsDepartmentsService;
use App\Services\OrganizationsYears\OrganizationsYearsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrganizationsDepartmentsController extends Controller
{
   public OrganizationsDepartmentsService $departmentsService;
   public OrganizationsDepartment $department;

    public function __construct()
    {
        $this->departmentsService = new OrganizationsDepartmentsService();
        $this->department = new OrganizationsDepartment();
    }

    public function create(Request $request):RedirectResponse
    {
        Log::debug('Вошёл в create у organizations years');
        $data = $request->only($this->department->getFillable());
        $user = Auth::user();
        //faculty id поменять
        $data = array_merge($data,['organization_id' => $user->organization_id,'faculty_id' => 1]);
        Log::debug('request data = '.print_r($data,true));
        $this->departmentsService->create($data);
        return back();
    }
}
