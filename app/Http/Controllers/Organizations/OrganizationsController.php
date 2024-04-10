<?php

namespace App\Http\Controllers\Organizations;

use App\Http\Controllers\Controller;
use App\Services\Organizations\OrganizationsService;
use App\Services\OrganizationsFaculties\OrganizationsFacultiesService;
use App\Services\OrganizationsYears\OrganizationsYearsService;
use Illuminate\Support\Facades\Auth;

class OrganizationsController extends Controller
{

    public OrganizationsService $organizationsService;

    public OrganizationsYearsService $yearsService;

    public OrganizationsFacultiesService $departmentsService;

    public function __construct(
        OrganizationsYearsService $yearsService,
        OrganizationsFacultiesService $departmentsService
    ) {
        $this->yearsService = $yearsService;
        $this->departmentsService = $departmentsService;
    }


    public function getOrganizationStructure()
    {
        $user = Auth::user();
        $organizationId = $user->organization_id;
        $years = $this->yearsService->get($organizationId);
        $errors = [];
        $departments = $this->departmentsService->get($organizationId);


    }

}
