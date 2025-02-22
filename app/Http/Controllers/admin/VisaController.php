<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Visa;
use Illuminate\Http\Request;
use App\Services\VisaService;
use App\Http\Controllers\Controller;


class VisaController extends Controller
{
    protected $visaService;
    public function __construct(VisaService $visaService)
    {
        $this->visaService = $visaService;
    }

    public function index()
    {
        $visas = $this->visaService->index();
        return view('template.admin.visas.index' , compact('visas'));
    }

    public function create(Visa $item)
    {
        $cities = City::where('status',1)->get();
        return view('template.admin.visas.create_and_edit' ,compact('item' , 'cities') );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'slug' => 'required|string',  // Ensure slug is required
            'status' => 'boolean',
        ]);

        $this->visaService->store($request->all());
        return redirect()->route('admin.visas.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->visaService->find($id);
        $cities = City::get();
        return view('template.admin.visas.create_and_edit' , compact('item' , 'cities') );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'slug' => 'required|string',  // Ensure slug is required
            'status' => 'boolean',
        ]);
        $this->visaService->update($request->all(), $id);
        return redirect()->route('admin.visas.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->visaService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->visaService->find($id);
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
        $item = $this->visaService->updateAnyColumn($data, $id);
    }




}
