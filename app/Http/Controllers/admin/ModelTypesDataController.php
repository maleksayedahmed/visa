<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ModelType;
use Illuminate\Http\Request;
use App\Models\ModelTypeData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\ModelTypesDataService;

class ModelTypesDataController extends Controller
{
    protected $modelTypesDataService;

    public function __construct(ModelTypesDataService $modelTypesDataService)
    {
        $this->modelTypesDataService = $modelTypesDataService;
    }

    public function index()
    {
        $model_type_data = $this->modelTypesDataService->index();
        return view('template.admin.model-type-data.index' , compact('model_type_data'  ));
    }

    public function create(ModelTypeData $item)
    {
        $model_types = ModelType::where('status' , 1 )->get();
        return view('template.admin.model-type-data.create_and_edit' ,compact('item' , 'model_types') );
    }

    public function store(Request $request)
    {
        $this->modelTypesDataService->store($request->all());
        return redirect()->route('admin.model-type-data.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->modelTypesDataService->find($id);
        $model_types = ModelType::where('status' , 1 )->get();
        return view('template.admin.model-type-data.create_and_edit' , compact('item' , 'model_types' ) );
    }

    public function update(Request $request, string $id)
    {
        $this->modelTypesDataService->update($request->all() , $id);
        return redirect()->route('admin.model-type-data.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->modelTypesDataService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->modelTypesDataService->find($id);
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
        $item = $this->modelTypesDataService->updateAnyColumn($data, $id);
    }

    public function apiIndex(Request $request)
    {
        $locale = app()->getLocale(); // Get the current locale

        $data = ModelTypeData::where('model_type_id', $request->input('model_type_id'))
            ->get(['id', 'title'])
            ->map(function ($city) use ($locale) {
                return [
                    'id' => $city->id,
                    'title' => $city->getTranslation('title', $locale),
                ];
            });
        // $data = ModelTypeData::where('model_type_id', $request->input('model_type_id'))->get(['id', 'title']);
        return response()->json(['data' => $data]);
    }


}
