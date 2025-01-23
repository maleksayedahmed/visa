<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\PackageOffer;
use Illuminate\Http\Request;
use App\Models\PackageOfferItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\PackageOfferService;

class PackageOfferController extends Controller
{
    protected $packageOfferService;

    public function __construct(PackageOfferService $packageOfferService)
    {
        $this->packageOfferService = $packageOfferService;
    }
    public function index()
    {
        $package_offers = $this->packageOfferService->index();
        return view('template.admin.package-offers.index', compact('package_offers'));
    }

    public function create(PackageOffer $item)
    {
        $brands = Brand::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('template.admin.package-offers.create_and_edit', compact('item', 'brands', 'products'));
    }

    public function store(Request $request)
    {
        $this->packageOfferService->store($request->all());
        return redirect()->route('admin.package-offers.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->packageOfferService->find($id);
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('template.admin.package-offers.create_and_edit', compact('item', 'brands', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $this->packageOfferService->update($request->all(), $id);
        return redirect()->route('admin.package-offers.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->packageOfferService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->packageOfferService->find($id);
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
        $item = $this->packageOfferService->updateAnyColumn($data, $id);
    }


}
