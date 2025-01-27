<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\City;
use App\Services\BrandService;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    protected $brandService;
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }
    public function index()
    {
        $brands = $this->brandService->index();
        return view('template.admin.brands.index' , compact('brands'));
    }

    public function create(Brand $item)
    {
        return view('template.admin.brands.create_and_edit' ,compact('item' ) );
    }

    public function store(Request $request)
    {
        $this->brandService->store($request->all());
        return redirect()->route('admin.brands.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->brandService->find($id);
        return view('template.admin.brands.create_and_edit' , compact('item' ) );
    }

    public function update(Request $request, string $id)
    {
        $this->brandService->update($request->all(),$id);
        return redirect()->route('admin.brands.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->brandService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $blog = $this->brandService->find($id);
        $status = 0;
        if (isset($blog) && !empty($blog->id)) {
            if ($blog->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        $data = array(
            'status' => $status
        );
        $blog = $this->brandService->updateAnyColumn($data, $id);
    }


}
