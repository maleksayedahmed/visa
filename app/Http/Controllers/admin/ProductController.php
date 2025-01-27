<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ModelType;
use Illuminate\Http\Request;
use App\Models\ModelTypeData;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductModelTypeDetail;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->index();
        return view('template.admin.products.index', compact('products'));
    }

    public function create(Product $item)
    {
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $model_types = ModelType::where('status', 1)->get();
        $model_types_data = ModelTypeData::where('status', 1)->get();
        return view('template.admin.products.create_and_edit', compact('item', 'brands', 'categories', 'model_types', 'model_types_data'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $product = $this->productService->store($request->all());
        foreach ($request->items as $item) {
            $product->items()->create($item);
        }
        // dd($product->items);
        return redirect()->route('admin.products.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->productService->find($id);
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $model_types = ModelType::where('status', 1)->get();
        // $model_types_data = ModelTypeData::where('status', 1)->get();

        $model_types_data = [];
        $model_types_data = [];
        foreach($item->items as $newItem){
                $model_types_data[] = ModelTypeData::where('model_type_id' , $newItem->model_type_id)->get(['id' , 'title']);

        }


        // dd($model_types_data);

        return view('template.admin.products.create_and_edit', compact('item', 'brands', 'categories', 'model_types', 'model_types_data'));
    }

    public function update(Request $request, string $id)
    {
        $this->productService->update($request->all(), $id);
        return redirect()->route('admin.products.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->productService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->productService->find($id);
        $status = 0;
        if (isset($item) && !empty($item->id)) {
            if ($item->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        $data = array(
            'status' => $status
        );
        $item = $this->productService->updateAnyColumn($data, $id);
    }


}
