<?php

namespace App\Services\Users\Repositories;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{

    /**
     * Получить по email
     * @param string $email
     * @return Model
     */
    public function getByEmail(string $email): Model;


    /**
     * Проверить, есть ли этот email
     * @param string $email
     * @return bool
     */
    public function emailExist(string $email): bool;

}
