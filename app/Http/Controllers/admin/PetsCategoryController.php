<?php
namespace App\Http\Controllers\Admin;

use App\Models\PetsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\PetsCategoryService;
use App\Http\Requests\PetsCategoryRequest;

class PetsCategoryController extends Controller
{
    protected $petsCategoryService;

    public function __construct(PetsCategoryService $petsCategoryService)
    {
        $this->petsCategoryService = $petsCategoryService;
    }
    public function index()
    {
        $categories = $this->petsCategoryService->index();
        return view('template.admin.pets_categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new PetsCategory();
        return view('template.admin.pets_categories.create_and_edit', compact('category'));
    }

    public function store(PetsCategoryRequest $request)
    {
        $this->petsCategoryService->store($request->validated());
        return redirect()->route('admin.pets_categories.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit( $id)
    {
        $category = $this->petsCategoryService->find($id);
        return view('template.admin.pets_categories.create_and_edit', compact('category'));
    }

    public function update(PetsCategoryRequest $request,  $id)
    {
        $this->petsCategoryService->update($request->validated(), $id);
        return redirect()->route('admin.pets_categories.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->petsCategoryService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->petsCategoryService->find($id);
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
        $item = $this->petsCategoryService->updateAnyColumn($data, $id);
    }
}
