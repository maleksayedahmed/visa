<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Services\CountryService;
use App\Http\Controllers\Controller;


class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }
    public function index()
    {
        $countries = $this->countryService->index();
        return view('template.admin.countries.index', compact('countries'));
    }

    public function create(Country $item)
    {
        return view('template.admin.countries.create_and_edit', compact('item'));
    }

    public function store(Request $request)
    {
        $this->countryService->store($request->all());
        return redirect()->route('admin.countries.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->countryService->find($id);
        return view('template.admin.countries.create_and_edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $this->countryService->update($request->all(), $id);
        return redirect()->route('admin.countries.index')->with('success', __('messages.UpdatedMessage'));
    }
    public function destroy($id)
    {
        $this->countryService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->countryService->find($id);
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
        $item = $this->countryService->updateAnyColumn($data, $id);
    }


}
