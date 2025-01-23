<?php

namespace App\Services;

use App\Repository\PetRepository;
use Illuminate\Support\Facades\Auth;

class PetService
{
    protected $petRepository;

    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function index()
    {
        return $this->petRepository->orderBy('id', 'desc')->with(['user', 'category'])->get();
    }
    public function find($id)
    {
        return $this->petRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->petRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $data['created_by'] = Auth::id();
        $pet = $this->petRepository->create($data);
        if (isset($data['image']) && $data['image']) {
            $pet->addMediaFromRequest('image')->toMediaCollection('pets');
        }
        return $pet;
    }
    public function updateAnyColumn($data, $id)
    {
        $pet = $this->petRepository->find($id);
        $pet = $this->petRepository->update($data, $pet);
    }
    public function update($data, $id)
    {
        $data['updated_by'] = Auth::id();
        $pet = $this->petRepository->find($id);
        $pet = $this->petRepository->update($data, $pet);
        if (isset($data['image']) && $data['image']) {
            $pet->clearMediaCollection('pets');
            $pet->addMediaFromRequest('image')->toMediaCollection('pets');
        }
    }
    public function destroy($id)
    {
        $pet = $this->petRepository->find($id);
        $this->petRepository->delete($pet);
    }
}
