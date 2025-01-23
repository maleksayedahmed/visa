<?php

namespace App\Services;

use App\Models\ModelTypeData;
use Illuminate\Support\Facades\Auth;
use App\Repository\ProductRepository;
use App\Models\ProductModelTypeDetail;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->orderBy('id', 'desc')->with(['category', 'brand'])->get();
    }
    public function find($id)
    {
        return $this->productRepository->find($id);
    }
    public function getBySpeceficColumn($array)
    {
        return $this->productRepository->where($array)->get();
    }
    public function store(array $data)
    {
        $data['created_by'] = Auth::id();
        $product = $this->productRepository->create($data);

        // foreach ($data['model_types_data'] as $key => $value) {
        //     $modelTypeData = ModelTypeData::find($value);

        //     ProductModelTypeDetail::create([
        //         'product_id' => $product->id,
        //         'model_type_data_id' => $modelTypeData->id,
        //         'model_type_id' => $modelTypeData->modelType->id,
        //         'model_type_details' => $data['model_type_details'],
        //         'created_by' => Auth::id()

        //     ]);
        // }
        if (isset($data['photo']) && $data['photo']) {
            $product->addMediaFromRequest('photo')->toMediaCollection('product');
        }
        return $product;
    }
    public function updateAnyColumn($data, $id)
    {
        $product = $this->productRepository->find($id);
        $product = $this->productRepository->update($data, $product);
    }
    public function update($data, $id)
    {
        $data['updated_by'] = Auth::id();
        $product = $this->productRepository->find($id);
        $product = $this->productRepository->update($data, $product);
        if (isset($data['photo']) && $data['photo']) {
            $product->clearMediaCollection('product');
            $product->addMediaFromRequest('photo')->toMediaCollection('product');
        }
    }
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);
        $this->productRepository->delete($product);
    }
}
