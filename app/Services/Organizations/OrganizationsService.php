<?php

namespace App\Services\Organizations;

use App\Services\Organizations\Repositories\EloquentOrganizationRepository;
use App\Services\Organizations\Repositories\OrganizationRepositoryInterface;
use App\Services\Services;

class OrganizationsService extends Services
{
    public $_repository;

    public function __construct(OrganizationRepositoryInterface $organizationRepository)
    {
        $this->_repository = $organizationRepository;
    }

    public function create(array $data)
    {

    }
}
