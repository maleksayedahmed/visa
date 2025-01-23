<?php

namespace App\Services;

use App\Models\Product;
use App\Models\PackageOfferItem;
use Illuminate\Support\Facades\Auth;
use App\Repository\PackageOfferRepository;

class PackageOfferService
{
    protected $packageOfferRepository;

    public function __construct(PackageOfferRepository $packageOfferRepository)
    {
        $this->packageOfferRepository = $packageOfferRepository;
    }

    public function index()
    {
        return $this->packageOfferRepository->orderBy('id', 'desc')->get();
    }
    public function find($id)
    {
        return $this->packageOfferRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->packageOfferRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $data['created_by'] = Auth::id();
        $offer = $this->packageOfferRepository->create($data);

        $count = 0 ;
        foreach($data['products'] as $item){
            $product= Product::findOrFail($item);
            PackageOfferItem::create([
                'product_id' => $product->id,
                'package_offer_id' => $offer->id,
                'price' => $product->price,
                'quantity' => $data['quantities'][$count]
            ]);
            $count++;
        }
        return $offer;
    }
    public function updateAnyColumn($data, $id)
    {
        $offer = $this->packageOfferRepository->find($id);
        $offer = $this->packageOfferRepository->update($data, $offer);
    }
    public function update($data, $id)
    {
        $data['updated_by'] = Auth::id();
        $offer = $this->packageOfferRepository->find($id);
        $offer = $this->packageOfferRepository->update($data, $offer);

        if($data->hasFile('photo')){
            $offer->clearMediaCollection('product');
            $offer->addMediaFromRequest('photo')->toMediaCollection('product');
        }

    }
    public function destroy($id)
    {
        $offer = $this->packageOfferRepository->find($id);
        $this->packageOfferRepository->delete($offer);
    }
}
