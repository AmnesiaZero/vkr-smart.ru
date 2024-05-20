<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Works\WorksService;
use Illuminate\Http\Request;

class WorksController extends Controller
{

    private WorksService $worksService;


    public function __construct(WorksService $worksService)
    {
        $this->worksService = $worksService;
    }

    public function studentsWorksView()
    {
        return $this->worksService->studentsWorksView();
    }
}
