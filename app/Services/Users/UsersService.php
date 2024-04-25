<?php

namespace App\Services\Users;


use App\Helpers\JsonHelper;
use App\Models\User;
use App\Services\Departments\Repositories\DepartmentRepositoryInterface;
use App\Services\Roles\Repositories\RoleRepositoryInterface;
use App\Services\Services;
use App\Services\Users\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UsersService extends Services
{
    private UserRepositoryInterface $_repository;

    private RoleRepositoryInterface $roleRepository;

    private DepartmentRepositoryInterface $departmentRepository;


    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository,
        DepartmentRepositoryInterface $departmentRepository)
    {
        $this->_repository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->departmentRepository = $departmentRepository;
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
        $usersData = [];
        //Сюда можно добавить ещё какую-нибудь инфу
        foreach ($users as $user){
           $usersData[] = $this->userData($user);
        }
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'users' => $usersData
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
                Log::debug('role = '.$data['role']);
                $role = $this->roleRepository->find($data['role']);
                Log::debug('role eloquent = '.$role);
            }
            else {
                $role = $this->roleRepository->find('user');
            }
            $user->attachRole($role);

            if (isset($data['department_id'])){
                $departmentId = $data['department_id'];
                Log::debug('department id = '.$departmentId);
                $user->departments()->attach($departmentId);
            }
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Пользователь успешно создан',
                'user' => $this->userData($user)
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

    public function userData(User $user): array
    {
        $roles = $user->roles;
        $role = $roles[0];
        $data = [
            'role' => $role
        ];
        unset($user['roles']);
        return array_merge($user->toArray(),$data);
    }

    public function delete(int $id): JsonResponse
    {
        $result = $this->_repository->delete($id);
        if ($result) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Пользователь удален успешно'
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Ошибка при удалении из базы данных'
            ]);
        }
    }
}
