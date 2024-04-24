<?php

namespace App\Services\Roles;

use App\Services\Roles\Repositories\RoleRepositoryInterface;

class RolesService
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }


}
