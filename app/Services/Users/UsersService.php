<?php

namespace App\Services\Users;


use App\Helpers\JsonHelper;
use App\Mail\ResetPassword;
use App\Models\Department;
use App\Models\User;
use App\Services\Departments\Repositories\DepartmentRepositoryInterface;
use App\Services\Roles\Repositories\RoleRepositoryInterface;
use App\Services\Services;
use App\Services\Users\Repositories\UserRepositoryInterface;
use Error;
use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

    public function get(): JsonResponse
    {
        $user = Auth::user();
        $organizationId = $user->organization_id;
        $users = $this->_repository->get($organizationId)->except(['id' => $user->id]);
        //Сюда можно добавить ещё какую-нибудь инфу
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
            $userId = $user->id;
            if (isset($data['role'])) {
                Log::debug('role = '.$data['role']);
                $role = $this->roleRepository->find($data['role']);
                Log::debug('role eloquent = '.$role);
            }
            else {
                $role = $this->roleRepository->find('user');
            }
            $user->attachRole($role);

            if (isset($data['departments_ids'])){
                $departmentsIds = $data['departments_ids'];
                foreach ($departmentsIds as $id){
                    Log::debug('department id = '.$id);
                    $user->departments()->attach($id);
                }
            }
            $updatedUser = $this->_repository->find($userId);
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Пользователь успешно создан',
                'user' => $updatedUser
            ]);
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла  ошибка'
        ]);
    }

    public function find(int $id): JsonResponse
    {
        $user =  $this->_repository->find($id);
        if($user and $user->id){
            return JsonHelper::sendJsonResponse(true,[
               'title' => 'Успешно',
                'user' => $user
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
           'title' => 'Ошибка',
           'message' => 'Ошибка при поиске пользователя'
        ]);
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

    public function update(int $id,array $data):JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $result = $this->_repository->update($id, $data);

        if ($result) {
            $user = $this->_repository->find($id);
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'user' => $user
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $result->id
            ]);
        }
    }

    public function addDepartment(int $userId, array $departmentsIds): JsonResponse
    {
        $user = $this->_repository->find($userId);
        if($user and $user->id){
            foreach ($departmentsIds as $departmentId){
                if($this->departmentRepository->exist($departmentId)){
                   $user->departments()->attach($departmentId);
                }
            }
            $updatedUser = $this->_repository->find($userId);
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'message' => 'Кафедра успешно привязана',
                'user' => $updatedUser
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
           'title' => 'Ошибка',
           'message' => 'При получении пользователя произошла ошибка'
        ]);

    }

    public function search(array $data):JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $users =  $this->_repository->search($data);

        if ($users) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Пользователи успешно найдены',
                'users' => $users
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => "Произошла ошибка при получении пользователей",
            ]);
        }
    }


    public function configureDepartments(int $userId, array $departmentsIds): JsonResponse
    {
        $user = $this->_repository->find($userId);
        if($user and $user->id){
            $user->departments()->sync($departmentsIds);
            $updatedUser = $this->_repository->find($userId);
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'message' => 'Кафедры успешно настроены успешно привязана',
                'user' => $updatedUser
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
            'title' => 'Ошибка',
            'message' => 'При получении пользователя произошла ошибка'
        ]);
    }

    public function you(): JsonResponse
    {
        $you = Auth::user();
        $you->organization; //это добавляет в модель поле organization. ->with() не работает,так удобнее всего
        return JsonHelper::sendJsonResponse(true,[
            'title' => 'Успешно',
            'you' => $you
        ]);
    }

    public function resetPassword(string $email)
    {
        $user =  $this->_repository->getByEmail($email);
        $userId = $user->id;
        $payload = [
            'exp' => time() + config('jwt.exp'),
            'user_id' => $userId
        ];
        try {
            $token = JWT::encode($payload, config('jwt.key'), config('jwt.alg'));
        }
        catch (Error $error){
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'Ошибка при кодировании токена'
            ]);
        }
        $resetLink = config('app.url') . '/password/new?token=' . $token;
        try {
            Mail::to($email)->queue(new ResetPassword($resetLink));
        }
        catch (Error $error){
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'Ошибка при отправке сообщения на почту'
            ]);
        }
        return JsonHelper::sendJsonResponse(true,[
            'title' => 'Успешно',
            'message' => 'Ссылка на сброс пароля была успешно отправлена на почту'
        ]);
    }

    public function newPassword(string $newPassword,string $token)
    {
        list($headersB64, $payloadB64, $sig) = explode('.', $token);
        $decoded = json_decode(base64_decode($payloadB64), true);
        $userId = (int)$decoded['user_id'];
        $user = $this->_repository->find($userId);
        $user->password = Hash::make($newPassword);
        $user->save();
        return redirect('home');
    }
}
