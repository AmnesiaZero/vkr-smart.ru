<?php

namespace App\Services\Organizations;

use App\Helpers\JsonHelper;
use App\Services\Organizations\Repositories\OrganizationRepositoryInterface;
use App\Services\Services;
use App\Services\Specialties\Repositories\SpecialtyRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

class OrganizationsService extends Services
{
    public $_repository;

    public SpecialtyRepositoryInterface $specialtyRepository;

    public function __construct(OrganizationRepositoryInterface $organizationRepository,SpecialtyRepositoryInterface $specialtyRepository)
    {
        $this->_repository = $organizationRepository;
        $this->specialtyRepository = $specialtyRepository;
    }

    public function find(int $id):  JsonResponse
    {
        $organization = $this->_repository->find($id);
        return JsonHelper::sendJsonResponse(true,[
            'title' => 'Успешно',
            'organization' => $organization
        ]);
    }

    public function configureInspectorsAccess(int $id,array $specialtiesIds): JsonResponse
    {
        $organization = $this->_repository->find($id);
        try{
//            foreach ($specialtiesIds as $specialtyId){
//                 if($this->specialtyRepository->exist($specialtyId)){
//                     $organization->specialties()->attach($specialtyId)
//                 }
//            }
            $organization->specialties()->sync($specialtiesIds);
        }
        catch (QueryException $e) {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'При привязке специальностей к проверяющим произошла ошибка'
            ]);
        }
        return JsonHelper::sendJsonResponse(true,[
            'title' => 'Успешно',
            'message' => 'Проверяющим организации успешно привязаны специальности'
        ]);

    }
}
