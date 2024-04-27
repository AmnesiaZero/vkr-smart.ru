<?php

namespace App\Http\Controllers\Organizations;

use App\Http\Controllers\Controller;
use App\Services\Faculties\FacultiesService;
use App\Services\Organizations\OrganizationsService;
use App\Services\OrganizationsYears\OrganizationsYearsService;

class OrganizationsController extends Controller
{

    public OrganizationsService $organizationsService;

    public OrganizationsYearsService $yearsService;

    public FacultiesService $departmentsService;

    public function __construct(
        OrganizationsYearsService $yearsService,
        FacultiesService $departmentsService
    ) {
        $this->yearsService = $yearsService;
        $this->departmentsService = $departmentsService;
    }


    public function organizationsStructure()
    {
        return view('templates.dashboard.settings.organizations_structure');
    }


}
