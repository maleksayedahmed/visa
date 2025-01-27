<?php

namespace App\Services;

use App\Repository\SliderRepository;

class SliderService
{
    protected $SliderRepository;

    public function __construct(SliderRepository $SliderRepository)
    {
        $this->SliderRepository = $SliderRepository;
    }

    public function index()
    {
        return $this->SliderRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->SliderRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->SliderRepository->where($array)->get();
    }
    public function store(array $data)
    {

        $slider = $this->SliderRepository->create($data);
        if (isset($data['image']) && $data['image']) {
            $slider->addMediaFromRequest('image')->toMediaCollection('slider');
        }

        return $slider;
    }
    public function updateAnyColumn($data, $id)
    {
        $slider = $this->SliderRepository->find($id);
        $slider = $this->SliderRepository->update($data, $slider);
    }
    public function update($data, $id)
    {
        $slider = $this->SliderRepository->find($id);
        $slider = $this->SliderRepository->update($data, $slider);

        if (isset($data['image']) && $data['image']) {
            $slider->clearMediaCollection('slider');
            $slider->addMediaFromRequest('image')->toMediaCollection('slider');
        }
    }
    public function destroy($id)
    {
        $slider = $this->SliderRepository->find($id);
        $this->SliderRepository->delete($slider);
    }
}
