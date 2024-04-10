<?php

namespace App\Services\Organizations\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

interface OrganizationRepositoryInterface
{
    /**
     * Получить модель по списку параметров
     * @param array $params
     * @return mixed
     */
    public function first(array $params): Builder|Model|null;
}
