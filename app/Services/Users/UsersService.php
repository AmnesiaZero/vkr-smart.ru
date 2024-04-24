<?php

namespace App\Services\Users;


use App\Helpers\JsonHelper;
use App\Services\Roles\Repositories\RoleRepositoryInterface;
use App\Services\Services;
use App\Services\Users\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class UsersService extends Services
{
    private UserRepositoryInterface $_repository;

    private RoleRepositoryInterface $roleRepository;


    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->_repository = $userRepository;
        $this->roleRepository = $roleRepository;
    }


    public function getByEmail(string $email): Model|JsonResponse
    {
        if (!$this->_repository->emailExist($email)) {
            return $this->sendJsonResponse(true, 'success', [
                'title' => 'Ошибка при верификации email',
                'message' => 'Такого email не существует'
            ]);
        }
        return $this->_repository->getByEmail($email);
    }

    public function get(int $organizationId): JsonResponse
    {
        $users = $this->_repository->get($organizationId);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'users' => $users
        ]);
    }

    public function create(array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }
        $user = $this->_repository->create($data);
        if ($user and $user->id) {
            if (isset($data['role'])) {
                $role = $this->roleRepository->find($data['role']);
                $user->attachRole($role);
            } else {
                $role = $this->roleRepository->find('user');
                $user->attachRole($role);
            }
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Пользователь успешно создан',
                'employee' => $user
            ]);
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла  ошибка'
        ]);
    }

    public function find(int $id): Model
    {
        return $this->_repository->find($id);
    }
}
