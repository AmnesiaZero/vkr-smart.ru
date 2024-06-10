<?php

namespace App\Services\ScientificSupervisors\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ScientificSupervisorRepositoryInterface
{

    /**
     * @param array $data
     * @return mixed
     */
   public function create(array $data):Model;

    /**
     * @param int $organizationId
     * @return Collection
     */
   public function get(int $organizationId):Collection;
}
