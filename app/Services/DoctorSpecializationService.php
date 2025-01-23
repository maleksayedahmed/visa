<?php

namespace App\Services;

use App\Repository\DoctorSpecializationRepository;

class DoctorSpecializationService
{
    protected $doctorSpecializationRepository;

    public function __construct(DoctorSpecializationRepository $doctorSpecializationRepository)
    {
        $this->doctorSpecializationRepository = $doctorSpecializationRepository;
    }

    public function index()
    {
        return $this->doctorSpecializationRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->doctorSpecializationRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->doctorSpecializationRepository->where($array)->get();
    }
    public function store(array $data)
    {
        return $this->doctorSpecializationRepository->create($data);
    }
    public function updateAnyColumn($data, $id)
    {
        $doctorSpecialization = $this->doctorSpecializationRepository->find($id);
        $doctorSpecialization = $this->doctorSpecializationRepository->update($data, $doctorSpecialization);
    }
    public function update($data, $id)
    {
        $doctorSpecialization = $this->doctorSpecializationRepository->find($id);
        $doctorSpecialization = $this->doctorSpecializationRepository->update($data, $doctorSpecialization);
    }
    public function destroy($id)
    {
        $doctorSpecialization = $this->doctorSpecializationRepository->find($id);
        $this->doctorSpecializationRepository->delete($doctorSpecialization);
    }
}
