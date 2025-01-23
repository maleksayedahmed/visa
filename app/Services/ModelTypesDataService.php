<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repository\ModelTypesDataRepository;

class ModelTypesDataService
{
    protected $modelTypesDataRepository;

    public function __construct(ModelTypesDataRepository $modelTypesDataRepository)
    {
        $this->modelTypesDataRepository = $modelTypesDataRepository;
    }

    public function index()
    {
        return $this->modelTypesDataRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->modelTypesDataRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->modelTypesDataRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $data['created_by'] = Auth::id();
        return $this->modelTypesDataRepository->create($data);
    }
    public function updateAnyColumn($data, $id)
    {
        $modelType = $this->modelTypesDataRepository->find($id);
        $modelType = $this->modelTypesDataRepository->update($data, $modelType);
    }
    public function update($data, $id)
    {
        $data['updated_by'] = Auth::id();
        $modelType = $this->modelTypesDataRepository->find($id);
        $modelType = $this->modelTypesDataRepository->update($data, $modelType);
    }
    public function destroy($id)
    {
        $modelType = $this->modelTypesDataRepository->find($id);
        $this->modelTypesDataRepository->delete($modelType);
    }
}
