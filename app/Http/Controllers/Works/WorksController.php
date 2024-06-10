<?php

namespace App\Http\Controllers\Works;

use App\Http\Controllers\Controller;
use App\Services\Works\WorksService;
use Illuminate\Http\JsonResponse;

class WorksController extends Controller
{

    protected WorksService $worksService;


    public function __construct(WorksService $worksService)
    {
        $this->worksService = $worksService;
    }

    public function studentsWorksView()
    {
        return $this->worksService->studentsWorksView();
    }

    public function employeesWorksView()
    {
        return $this->worksService->employeesWorksView();
    }

    public function get(): JsonResponse
    {
        return $this->worksService->get();
    }
}
