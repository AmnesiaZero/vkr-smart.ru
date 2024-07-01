<?php

namespace App\Http\Controllers;

use App\Services\ProgramsSpecialties\Repositories\ProgramSpecialtyRepositoryInterface;
use App\Services\ScientificSupervisors\Repositories\ScientificSupervisorRepositoryInterface;
use App\Services\WorksTypes\Repositories\WorksTypeRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class HandbookController extends Controller
{

    protected ScientificSupervisorRepositoryInterface $scientificSupervisorRepository;

    protected WorksTypeRepositoryInterface $worksTypeRepository;



    public function __construct(ScientificSupervisorRepositoryInterface $scientificSupervisorRepository,
                                WorksTypeRepositoryInterface $worksTypeRepository)
    {
        $this->scientificSupervisorRepository = $scientificSupervisorRepository;
        $this->worksTypeRepository = $worksTypeRepository;
    }

    public function view()
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $scientificSupervisors = $this->scientificSupervisorRepository->get($organizationId);
        $worksTypes = $this->worksTypeRepository->get($organizationId);
        return view('templates.dashboard.settings.handbook_management', [
            'scientific_supervisors' => $scientificSupervisors,
            'works_types' => $worksTypes,
        ]);
    }
}
