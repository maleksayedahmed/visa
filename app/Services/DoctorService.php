<?php

namespace App\Services;

use App\Repository\DoctorRepository;

class DoctorService
{
    protected $doctorRepository;

    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        return $this->doctorRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->doctorRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->doctorRepository->where($array)->get();
    }
    public function store(array $data, $user_id)
    {
        $data['user_id'] = $user_id;
        return $this->doctorRepository->create($data);
    }
    public function updateAnyColumn($data, $id)
    {
        $doctor = $this->doctorRepository->find($id);
        $doctor = $this->doctorRepository->update($data, $doctor);
    }
    public function update($data, $id)
    {
        $doctor = $this->doctorRepository->find($id);
        $doctor = $this->doctorRepository->update($data, $doctor);
    }
    public function destroy($id)
    {
        $doctor = $this->doctorRepository->find($id);
        $this->doctorRepository->delete($doctor);
    }
}
