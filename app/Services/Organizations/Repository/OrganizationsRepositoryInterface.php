<?php

namespace App\Services\Organizations\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

interface OrganizationsRepositoryInterface
{
    /**
     * Получить модель по списку параметров
     * @param array $params
     * @return mixed
     */
    public function first(array $params): Builder|Model|null;
}
