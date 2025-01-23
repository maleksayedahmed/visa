<?php

namespace App\Services;

use App\Repository\OfferRepository;
use Illuminate\Support\Facades\Auth;

class OfferService
{
    protected $offerRepository;

    public function __construct(OfferRepository $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    public function index()
    {
        return $this->offerRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->offerRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->offerRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $data['created_by'] = Auth::id();
        $offer = $this->offerRepository->create($data);
        if (isset($data['photo']) && $data['photo']) {
            $offer->addMediaFromRequest('photo')->toMediaCollection('offer');
        }
        return $offer;
    }
    public function updateAnyColumn($data, $id)
    {
        $offer = $this->offerRepository->find($id);
        $offer = $this->offerRepository->update($data, $offer);
    }
    public function update($data, $id)
    {
        $data['updated_by'] = Auth::id();
        $offer = $this->offerRepository->find($id);
        $offer = $this->offerRepository->update($data, $offer);
        if (isset($data['photo']) && $data['photo']) {
            $offer->clearMediaCollection('offer');
            $offer->addMediaFromRequest('photo')->toMediaCollection('offer');
        }
    }
    public function destroy($id)
    {
        $offer = $this->offerRepository->find($id);
        $this->offerRepository->delete($offer);
    }
}
