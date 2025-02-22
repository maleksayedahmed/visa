<?php

namespace App\Services;

use App\Repository\VisaRepository;


class VisaService
{
    protected $visaRepository;

    public function __construct(VisaRepository $visaRepository)
    {
        $this->visaRepository = $visaRepository;
    }

    public function index()
    {
        return $this->visaRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->visaRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->visaRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $visa = $this->visaRepository->create($data);
        if (isset($data['photo']) && $data['photo']) {
            $visa->addMediaFromRequest('photo')->toMediaCollection('visa');
        }
        return $visa;
    }
    public function updateAnyColumn($data, $id)
    {
        $visa = $this->visaRepository->find($id);
        $visa = $this->visaRepository->update($data, $visa);
    }
    public function update($data, $id)
    {
        $visa = $this->visaRepository->find($id);
        $visa = $this->visaRepository->update($data, $visa);

        if (isset($data['photo']) && $data['photo']) {
            $visa->clearMediaCollection('visa');
            $visa->addMediaFromRequest('photo')->toMediaCollection('visa');
        }
    }
    public function destroy($id)
    {
        $visa = $this->visaRepository->find($id);
        $this->visaRepository->delete($visa);
    }
}
