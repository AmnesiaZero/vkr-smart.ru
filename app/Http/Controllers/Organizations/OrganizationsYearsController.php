<?php

namespace App\Http\Controllers\Organizations;

use App\Http\Controllers\Controller;
use App\Models\OrganizationsYears;
use App\Services\OrganizationYears\OrganizationsYearsService;
use Illuminate\Http\Request;

class OrganizationsYearsController extends Controller
{
    private OrganizationsYearsService $organizationYearsService;

    private OrganizationsYears $organizationsYears;

    public function __construct()
    {
        $this->organizationYearsService = new OrganizationsYearsService();
      $this->organizationsYears = new OrganizationsYears();
    }

    public function create(Request $request): void
    {
       $data = $request->only($this->organizationsYears->getFillable());
       $this->organizationYearsService->create($data);
    }

}
