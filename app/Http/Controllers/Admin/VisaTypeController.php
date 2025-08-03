<?php

namespace App\Http\Controllers\Admin;

use App\Models\VisaType;
use Illuminate\Http\Request;
use App\Services\VisaTypeService;
use App\Http\Controllers\Controller;

class VisaTypeController extends Controller
{
    protected $visaTypeService;

    public function __construct(VisaTypeService $visaTypeService)
    {
        $this->visaTypeService = $visaTypeService;
    }

    public function index()
    {
        $visaTypes = $this->visaTypeService->index(); // Use service to get the list of visa types
        return view('template.admin.visa_types.index', compact('visaTypes'));
    }

    public function create()
    {
        return view('template.admin.visa_types.create_and_edit', ['item' => new VisaType()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.en' => 'required|string|max:255',
            'name.ar' => 'required|string|max:255',
        ]);

        $this->visaTypeService->store($request->all()); // Use service to store the data
        return redirect()->route('admin.visatypes.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->visaTypeService->find($id);
        return view('template.admin.visa_types.create_and_edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name.en' => 'required|string|max:255',
            'name.ar' => 'required|string|max:255',
        ]);

        $this->visaTypeService->update($request->all(), $id);
        return redirect()->route('admin.visatypes.index')->with('success', __('messages.UpdatedMessage'));

    }

    public function destroy($id)
    {
        $this->visaTypeService->destroy($id);
    }
}
