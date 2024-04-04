<?php

namespace App\Services\Users\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    /**
     * Получить полный список пользователей (за исключением удаленных) без пагинации
     *
     * @return Collection
     */
    public function get_full_list(): Collection;

    /**
     * Получить полный список пользователей (включая удаленные) без пагинации
     *
     * @return Collection
     */
    public function get_full_list_with_trashed(): Collection;

    /**
     * Получить список всех пользователей (за исключением удаленных) с пагинацией
     *
     * @return LengthAwarePaginator
     */
    public function get_all(): LengthAwarePaginator;

    /**
     * Получить список всех пользователей (включая удаленные) с пагинацией
     *
     * @return LengthAwarePaginator
     */
    public function get_all_with_trashed(): LengthAwarePaginator;



    /**
     * Поиск пользователя по его идентификатору (ID)
     *
     * @param int $id
     * @return Builder|Builder[]|\Illuminate\Support\Collection|Model|null
     */
    public function find(int $id);


    /**
     * Поиск пользователей по заданным параметрам
     *
     * @param array $filter
     * @param bool $withPagination
     * @return LengthAwarePaginator|Collection
     */
    public function search(array $filter, bool $withPagination);


    /**
     * Создание нового пользователя в хранилище
     * @param array $data
     * @param int $withDigitalDepartment
     * @return Model|bool
     */
    public function create(array $data, int $withDigitalDepartment): Model|bool;

    /**
     * Обновление пользователя в хранилище
     * @param array $data
     * @param int $withDigitalDepartment
     * @param int $id
     * @return Model|bool
     */
    public function update(array $data, int $withDigitalDepartment, int $id): Model|bool;

    /**
     * Мягкое удаление пользователя
     *
     * @param int $id
     * @return bool|integer
     */
    public function destroy(int $id);

    /**
     * Восстановление удаленного пользователя
     *
     * @param int $id
     * @return bool|integer
     */
    public function restore(int $id);

    /**
     * Удаление пользователя из хранилища (восстановлению не подлежит)
     *
     * @param int $id
     * @return bool|integer
     */
    public function delete(int $id);

}
