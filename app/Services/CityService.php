<?php

namespace App\Services;

use App\Repository\CityRepository;

class CityService
{
    protected $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        return $this->cityRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->cityRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->cityRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $city = $this->cityRepository->create($data);
        if (isset($data['photo']) && $data['photo']) {
            $city->addMediaFromRequest('photo')->toMediaCollection('brand');
        }
        return $city;
    }
    public function updateAnyColumn($data, $id)
    {
        $city = $this->cityRepository->find($id);
        $city = $this->cityRepository->update($data, $city);
    }
    public function update($data, $id)
    {
        $city = $this->cityRepository->find($id);
        $city = $this->cityRepository->update($data, $city);

        if (isset($data['photo']) && $data['photo']) {
            $city->clearMediaCollection('brand');
            $city->addMediaFromRequest('photo')->toMediaCollection('brand');
        }
    }
    public function destroy($id)
    {
        $city = $this->cityRepository->find($id);
        $this->cityRepository->delete($city);
    }
}
