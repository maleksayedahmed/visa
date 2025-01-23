<?php

namespace App\Services;

use App\Repository\BrandRepository;

class BrandService
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        return $this->brandRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->brandRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->brandRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $brand = $this->brandRepository->create($data);
        if (isset($data['photo']) && $data['photo']) {
            $brand->addMediaFromRequest('photo')->toMediaCollection('brand');
        }
        return $brand;
    }
    public function updateAnyColumn($data, $id)
    {
        $brand = $this->brandRepository->find($id);
        $brand = $this->brandRepository->update($data, $brand);
    }
    public function update($data, $id)
    {
        $brand = $this->brandRepository->find($id);
        $brand = $this->brandRepository->update($data, $brand);

        if (isset($data['photo']) && $data['photo']) {
            $brand->clearMediaCollection('brand');
            $brand->addMediaFromRequest('photo')->toMediaCollection('brand');
        }
    }
    public function destroy($id)
    {
        $brand = $this->brandRepository->find($id);
        $this->brandRepository->delete($brand);
    }
}

