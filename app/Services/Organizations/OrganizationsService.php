<?php

namespace App\Services\Organizations;

use App\Helpers\JsonHelper;
use App\Services\Organizations\Repositories\OrganizationRepositoryInterface;
use App\Services\Services;
use App\Services\Specialties\Repositories\SpecialtyRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class OrganizationsService extends Services
{
    public $_repository;

    public SpecialtyRepositoryInterface $specialtyRepository;

    public function __construct(OrganizationRepositoryInterface $organizationRepository, SpecialtyRepositoryInterface $specialtyRepository)
    {
        $this->_repository = $organizationRepository;
        $this->specialtyRepository = $specialtyRepository;
    }

    public function configureInspectorsAccess(int $id, array $specialtiesIds): JsonResponse
    {
        $organization = $this->_repository->find($id);
        try {
            $organization->specialties()->sync($specialtiesIds);
        } catch (QueryException $e) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'При привязке специальностей к проверяющим произошла ошибка'
            ]);
        }
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'message' => 'Проверяющим организации успешно привязаны специальности'
        ]);

    }

    public function find(): JsonResponse
    {
        $user = Auth::user();
        $id = $user->organization_id;
        $organization = $this->_repository->find($id);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'organization' => $organization,
            'user' => $user
        ]);
    }

    public function integrationView()
    {
        $you = Auth::user();
        $organizationId = $you->organization_id;
        $organization = $this->_repository->find($organizationId);
        return view('templates.dashboard.settings.integration', ['organization' => $organization]);
    }
}
