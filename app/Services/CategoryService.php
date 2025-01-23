<?php

namespace App\Services;

use App\Repository\CategoryRepository;


class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return $this->categoryRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->categoryRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->categoryRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $category = $this->categoryRepository->create($data);
        if (isset($data['photo']) && $data['photo']) {
            $category->addMediaFromRequest('photo')->toMediaCollection('category');
        }
        return $category;
    }
    public function updateAnyColumn($data, $id)
    {
        $category = $this->categoryRepository->find($id);
        $category = $this->categoryRepository->update($data, $category);
    }
    public function update($data, $id)
    {
        $category = $this->categoryRepository->find($id);
        $category = $this->categoryRepository->update($data, $category);

        if (isset($data['photo']) && $data['photo']) {
            $category->clearMediaCollection('category');
            $category->addMediaFromRequest('photo')->toMediaCollection('category');
        }
    }
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);
        $this->categoryRepository->delete($category);
    }
}
