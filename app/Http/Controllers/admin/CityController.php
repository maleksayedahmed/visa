<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Services\CityService;
use Illuminate\Http\Request;


class CityController extends Controller
{
    protected $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    public function index()
    {
        $cities = $this->cityService->index();
        return view('template.admin.cities.index', compact('cities'));
    }

    public function create(City $item)
    {
        $countries = Country::get();
        return view('template.admin.cities.create_and_edit', compact('item', 'countries'));
    }

    public function store(Request $request)
    {
        $this->cityService->store($request->all());
        return redirect()->route('admin.cities.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->cityService->find($id);
        $countries = Country::get();
        return view('template.admin.cities.create_and_edit', compact('item', 'countries'));
    }

    public function update(Request $request, string $id)
    {
        $this->cityService->update($request->all(), $id);
        return redirect()->route('admin.cities.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->cityService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->cityService->find($id);
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
        $item = $this->cityService->updateAnyColumn($data, $id);
    }

    public function getCountryCities($countryId)
    {
        $locale = app()->getLocale();

        $cities = City::where('country_id', $countryId)
            ->get(['id', 'name'])
            ->map(function ($city) use ($locale) {
                return [
                    'id' => $city->id,
                    'name' => $city->getTranslation('name', $locale),
                ];
            });

        return response()->json($cities);

    }


}
