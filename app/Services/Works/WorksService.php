<?php

namespace App\Services\Works;

use App\Services\Works\Repositories\EloquentWorkRepository;
use App\Services\Works\Repositories\WorkRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class WorksService
{

    private WorkRepositoryInterface $workRepository;

    public function __construct(WorkRepositoryInterface $workRepository)
    {
        $this->workRepository = $workRepository;
    }

    public function studentsWorksView()
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;

    }
}
