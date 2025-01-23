<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->index();
        return view('template.admin.categories.index' , compact('categories'));
    }

    public function create(Category $item)
    {
        $cities = City::where('status',1)->get();
        return view('template.admin.categories.create_and_edit' ,compact('item' , 'cities') );
    }

    public function store(Request $request)
    {
        $this->categoryService->store($request->all());
        return redirect()->route('admin.categories.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->categoryService->find($id);
        $cities = City::get();
        return view('template.admin.categories.create_and_edit' , compact('item' , 'cities') );
    }

    public function update(Request $request, string $id)
    {
        $this->categoryService->update($request->all(), $id);
        return redirect()->route('admin.categories.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->categoryService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->categoryService->find($id);
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
        $item = $this->categoryService->updateAnyColumn($data, $id);
    }




}
