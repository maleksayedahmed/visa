<?php

namespace App\Services;

use App\Repository\VisaTypeRepository;

class VisaTypeService
{
    protected $visaTypeRepository;

    public function __construct(VisaTypeRepository $visaTypeRepository)
    {
        $this->visaTypeRepository = $visaTypeRepository;
    }

    public function index()
    {
        return $this->visaTypeRepository->orderBy('id', 'desc')->get();
    }

    public function find($id)
    {
        return $this->visaTypeRepository->find($id);
    }

    public function getBySpecificColumn($array)
    {
        return $this->visaTypeRepository->where($array)->get();
    }

    public function store(array $data)
    {
        $visaType = $this->visaTypeRepository->create($data);
        return $visaType;
    }

    public function updateAnyColumn($data, $id)
    {
        $visaType = $this->visaTypeRepository->find($id);
        return $this->visaTypeRepository->update($data, $visaType);
    }

    public function update($data, $id)
    {
        $visaType = $this->visaTypeRepository->find($id);
        return $this->visaTypeRepository->update($data, $visaType);
    }

    public function destroy($id)
    {
        $visaType = $this->visaTypeRepository->find($id);
        $this->visaTypeRepository->delete($visaType);
    }
}
