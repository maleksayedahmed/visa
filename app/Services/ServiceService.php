<?php

namespace App\Services;

use App\Repository\ServiceRepository;

class ServiceService
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        return $this->serviceRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->serviceRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->serviceRepository->where($array)->get();
    }
    public function store(array $data)
    {
        return $this->serviceRepository->create($data);
    }
    public function updateAnyColumn($data, $id)
    {
        $service = $this->serviceRepository->find($id);
        $service = $this->serviceRepository->update($data, $service);
    }
    public function update($data, $id)
    {
        $service = $this->serviceRepository->find($id);
        $service = $this->serviceRepository->update($data, $service);
    }
    public function destroy($id)
    {
        $service = $this->serviceRepository->find($id);
        $this->serviceRepository->delete($service);
    }
}
