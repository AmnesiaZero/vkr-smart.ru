<?php

namespace App\Http\Controllers\Organizations;

use App\Helpers\ValidatorHelper;
use App\Http\Controllers\Controller;
use App\Services\Faculties\FacultiesService;
use App\Services\Organizations\OrganizationsService;
use App\Services\OrganizationsYears\OrganizationsYearsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrganizationsController extends Controller
{

    public OrganizationsService $organizationsService;


    public function __construct(OrganizationsService $organizationsService)
    {
       $this->organizationsService = $organizationsService;
    }


    public function organizationsStructure()
    {
        return view('templates.dashboard.settings.organizations_structure');
    }


    public function configureInspectorsAccess(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'specialties_ids' => 'required|array'
        ]);
        if ($validator->fails()) {
            return ValidatorHelper::validatorError($validator);
        }
        $user = Auth::user();
        $organizationId = $user->organization_id;
        $specialtiesIds = $request->specialties_ids;
        return $this->organizationsService->configureInspectorsAccess($organizationId,$specialtiesIds);
    }


}
