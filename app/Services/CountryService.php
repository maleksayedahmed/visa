<?php

namespace App\Services;

use App\Repository\CountryRepository;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function index()
    {
        return $this->countryRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->countryRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->countryRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $country = $this->countryRepository->create($data);
        if (isset($data['photo']) && $data['photo']) {
            $country->addMediaFromRequest('photo')->toMediaCollection('country');
        }
        if (isset($data['country_cover']) && $data['country_cover']) {
            $country->addMediaFromRequest('country_cover')->toMediaCollection('country_cover');
        }
        return $country;
    }
    public function updateAnyColumn($data, $id)
    {
        $country = $this->countryRepository->find($id);
        $country = $this->countryRepository->update($data, $country);
    }
    public function update($data, $id)
    {
        $country = $this->countryRepository->find($id);
        $country = $this->countryRepository->update($data, $country);

        if (isset($data['photo']) && $data['photo']) {
            $country->clearMediaCollection('country');
            $country->addMediaFromRequest('photo')->toMediaCollection('country');
        }

        if (isset($data['country_cover']) && $data['country_cover']) {
            $country->clearMediaCollection('country_cover');
            $country->addMediaFromRequest('country_cover')->toMediaCollection('country_cover');
        }
    }
    public function destroy($id)
    {
        $country = $this->countryRepository->find($id);
        $this->countryRepository->delete($country);
    }
}
