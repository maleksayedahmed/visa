<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repository\PetsCategoryRepository;

class PetsCategoryService
{
    protected $petsCategoryRepository;

    public function __construct(PetsCategoryRepository $petsCategoryRepository)
    {
        $this->petsCategoryRepository = $petsCategoryRepository;
    }

    public function index()
    {
        return $this->petsCategoryRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->petsCategoryRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->petsCategoryRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $data['created_by'] = Auth::id();
        $pet = $this->petsCategoryRepository->create($data);
        if (isset($data['image']) && $data['image']) {
            $pet->addMediaFromRequest('image')->toMediaCollection('pets');
        }
        return $pet;
    }
    public function updateAnyColumn($data, $id)
    {
        $pet = $this->petsCategoryRepository->find($id);
        $pet = $this->petsCategoryRepository->update($data, $pet);
    }
    public function update($data, $id)
    {
        $data['updated_by'] = Auth::id();
        $pet = $this->petsCategoryRepository->find($id);
        $pet = $this->petsCategoryRepository->update($data, $pet);
        if (isset($data['image']) && $data['image']) {
            $pet->clearMediaCollection('pets');
            $pet->addMediaFromRequest('image')->toMediaCollection('pets');
        }
    }
    public function destroy($id)
    {
        $pet = $this->petsCategoryRepository->find($id);
        $this->petsCategoryRepository->delete($pet);
    }
}
