<?php

namespace App\Http\Controllers\Organizations;

use App\Http\Controllers\Controller;
use App\Models\OrganizationsYear;
use App\Services\OrganizationsYears\OrganizationsYearsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrganizationsYearsController extends Controller
{
    private OrganizationsYearsService $organizationYearsService;

    private OrganizationsYear $organizationsYears;

    public function __construct()
    {
        $this->organizationYearsService = new OrganizationsYearsService();
        $this->organizationsYears = new OrganizationsYear();
    }

    public function create(Request $request):RedirectResponse
    {
        Log::debug('Вошёл в create у organizations years');
       $data = $request->only($this->organizationsYears->getFillable());
       $user = Auth::user();
       $data = array_merge($data,['organization_id' => $user->organization_id,'user_id' => $user->id]);
       Log::debug('request data = '.print_r($data,true));
       $this->organizationYearsService->create($data);
       return back();
    }

}
