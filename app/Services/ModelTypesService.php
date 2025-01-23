<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repository\ModelTypesRepository;

class ModelTypesService
{
    protected $modelTypesRepository;

    public function __construct(ModelTypesRepository $modelTypesRepository)
    {
        $this->modelTypesRepository = $modelTypesRepository;
    }

    public function index()
    {
        return $this->modelTypesRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->modelTypesRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->modelTypesRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $data['updated_by'] = Auth::id();
        return $this->modelTypesRepository->create($data);
    }
    public function updateAnyColumn($data, $id)
    {
        $modelType = $this->modelTypesRepository->find($id);
        $modelType = $this->modelTypesRepository->update($data, $modelType);
    }
    public function update($data, $id)
    {
        $data['updated_by'] = Auth::id();
        $modelType = $this->modelTypesRepository->find($id);
        $modelType = $this->modelTypesRepository->update($data, $modelType);
    }
    public function destroy($id)
    {
        $modelType = $this->modelTypesRepository->find($id);
        $this->modelTypesRepository->delete($modelType);
    }
}
