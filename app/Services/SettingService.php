<?php

namespace App\Services;

use App\Repository\SettingRepository;

class SettingService
{
    protected $blogRepository;

    public function __construct(SettingRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        return $this->blogRepository->orderBy('id', 'desc')->with(['category', 'user'])->get();
    }
    public function find($id)
    {
        return $this->blogRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->blogRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $blog = $this->blogRepository->create($data);
        if (isset($data['photo']) && $data['photo']) {
            $blog->addMediaFromRequest('photo')->toMediaCollection('category');
        }
        return $blog;
    }
    public function updateAnyColumn($data, $id)
    {
        $blog = $this->blogRepository->find($id);
        $blog = $this->blogRepository->update($data, $blog);
    }
    public function update($data, $id)
    {
        $blog = $this->blogRepository->find($id);
        $blog = $this->blogRepository->update($data, $blog);

        if (isset($data['photo']) && $data['photo']) {
            $blog->clearMediaCollection('category');
            $blog->addMediaFromRequest('photo')->toMediaCollection('category');
        }
    }
    public function destroy($id)
    {
        $blog = $this->blogRepository->find($id);
        $this->blogRepository->delete($blog);
    }
}
