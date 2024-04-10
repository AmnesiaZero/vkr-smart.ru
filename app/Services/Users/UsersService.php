<?php

namespace App\Services\Users;


use App\Services\Services;
use App\Services\Users\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class UsersService extends Services
{
    private UserRepositoryInterface $_repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->_repository = $userRepository;
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
}
