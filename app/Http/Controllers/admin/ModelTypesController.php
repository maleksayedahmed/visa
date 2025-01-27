<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ModelType;
use Illuminate\Http\Request;
use App\Services\ModelTypesService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModelTypesController extends Controller
{
    protected $modelTypesService;

    public function __construct(ModelTypesService $modelTypesService)
    {
        $this->modelTypesService = $modelTypesService;
    }
    public function index()
    {
        $model_types = $this->modelTypesService->index();
        return view('template.admin.model-types.index' , compact('model_types'));
    }

    public function create(ModelType $item)
    {
        return view('template.admin.model-types.create_and_edit' ,compact('item' ) );
    }

    public function store(Request $request)
    {
        $this->modelTypesService->store($request->all());
        return redirect()->route('admin.model-types.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->modelTypesService->find($id);
        $brands = Brand::where('status' , 1)->get();
        $categories = Category::where('status' , 1)->get();
        return view('template.admin.model-types.create_and_edit' , compact('item' ,'brands' , 'categories') );
    }

    public function update(Request $request, string $id)
    {
        $this->modelTypesService->update($request->all(),$id);
        return redirect()->route('admin.model-types.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->modelTypesService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->modelTypesService->find($id);
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
        $item = $this->modelTypesService->updateAnyColumn($data, $id);
    }


}
