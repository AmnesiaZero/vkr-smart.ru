<?php

namespace App\Services\Works;

use App\Helpers\JsonHelper;
use App\Services\OrganizationsYears\Repositories\OrganizationYearRepositoryInterface;
use App\Services\ScientificSupervisors\Repositories\ScientificSupervisorRepositoryInterface;
use App\Services\Specialties\Repositories\SpecialtyRepositoryInterface;
use App\Services\Works\Repositories\WorkRepositoryInterface;
use App\Services\WorksTypes\Repositories\WorksTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class WorksService
{

    private OrganizationYearRepositoryInterface $yearRepository;

    private WorkRepositoryInterface $workRepository;

    private SpecialtyRepositoryInterface $specialtyRepository;

    private ScientificSupervisorRepositoryInterface $scientificSupervisorRepository;

    private WorksTypeRepositoryInterface $worksTypeRepository;

    public function __construct(WorkRepositoryInterface      $workRepository, OrganizationYearRepositoryInterface $yearRepository,
                                SpecialtyRepositoryInterface $specialtyRepository, ScientificSupervisorRepositoryInterface $scientificSupervisorRepository,
                                WorksTypeRepositoryInterface $worksTypeRepository
    )
    {
        $this->workRepository = $workRepository;
        $this->yearRepository = $yearRepository;
        $this->specialtyRepository = $specialtyRepository;
        $this->scientificSupervisorRepository = $scientificSupervisorRepository;
        $this->worksTypeRepository = $worksTypeRepository;

    }

    public function studentsWorksView()
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $years = $this->yearRepository->get($organizationId);
        $works = $this->workRepository->get($organizationId);
        $specialties = $this->specialtyRepository->all();
        return view('templates.dashboard.works.students', ['years' => $years, 'works' => $works, 'specialties' => $specialties]);
    }

    public function get(): JsonResponse
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $works = $this->workRepository->get($organizationId);
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Успешно',
            'works' => $works
        ]);

    }

    public function employeesWorksView()
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $years = $this->yearRepository->get($organizationId);
        $works = $this->workRepository->get($organizationId);
        $specialties = $this->specialtyRepository->all();
        $scientificSupervisors = $this->scientificSupervisorRepository->get($organizationId);
        $worksTypes = $this->worksTypeRepository->get($organizationId);
        return view('templates.dashboard.works.employee', [
            'years' => $years,
            'works' => $works,
            'specialties' => $specialties,
            'scientific_supervisors' => $scientificSupervisors,
            'works_types' => $worksTypes
        ]);

    }
}
