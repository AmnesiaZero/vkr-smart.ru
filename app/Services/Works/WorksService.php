<?php

namespace App\Services\Works;

use App\Helpers\JsonHelper;
use App\Services\OrganizationsYears\Repositories\OrganizationYearRepositoryInterface;
use App\Services\Specialties\Repositories\SpecialtyRepositoryInterface;
use App\Services\Works\Repositories\EloquentWorkRepository;
use App\Services\Works\Repositories\WorkRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class WorksService
{

    private OrganizationYearRepositoryInterface $yearRepository;

    private WorkRepositoryInterface $workRepository;

    private SpecialtyRepositoryInterface $specialtyRepository;

    public function __construct(WorkRepositoryInterface $workRepository,OrganizationYearRepositoryInterface $yearRepository,SpecialtyRepositoryInterface $specialtyRepository)
    {
        $this->workRepository = $workRepository;
        $this->yearRepository = $yearRepository;
        $this->specialtyRepository = $specialtyRepository;

    }

    public function studentsWorksView()
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $years = $this->yearRepository->get($organizationId);
        $works = $this->workRepository->get($organizationId);
        $specialties = $this->specialtyRepository->all();
        return view('templates.dashboard.works.students',['years' => $years,'works' => $works,'specialties' => $specialties]);
    }

    public function get(): JsonResponse
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $works = $this->workRepository->get($organizationId);
        return JsonHelper::sendJsonResponse(false,[
            'title' => 'Успешно',
            'works' => $works
        ]);

    }
}
