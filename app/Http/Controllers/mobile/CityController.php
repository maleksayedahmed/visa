<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $locale = app()->getLocale(); // Get the current locale

        // Retrieve cities and fetch the translated name for the current locale
        $cities = City::where('country_id', $request->country_id)
            ->get(['id', 'name'])
            ->map(function ($city) use ($locale) {
                return [
                    'id' => $city->id,
                    'name' => $city->getTranslation('name', $locale),
                ];
            });

        return response()->json(['data' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(City $item)
    {
        //


        $countries = Country::get();
        return view('admin.cities.create_and_edit' ,compact('item' , 'countries') );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if( isset($data['status'])  && $data['status'] == 'on'){
            $data['status'] = 1 ;
        }else{
            $data['status'] = 0;
        }
        City::create($data);
        $request->session()->flash('success', __('messages.AddedMessage'));

        return redirect()->route('admin.cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $item = City::findOrFail($id);
        $countries = Country::get();

        return view('admin.cities.create_and_edit' , compact('item' , 'countries') );

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $country = City::findOrFail($id);
        if( isset($data['status'])  && $data['status'] == 'on'){
            $data['status'] = 1 ;
        }else{
            $data['status'] = 0;
        }

        $country->update($data);

        $request->session()->flash('success', __('messages.UpdatedMessage'));

        return redirect()->route('admin.cities.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // dd($request);
        // Validate the incoming request
        $request->validate([
            'id' => 'required|exists:cities,id', // Ensure the ID exists in the database
        ]);

        // Find and delete the record
        $country = City::findOrFail($request->id);

        if ($country->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Row deleted successfully!',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to delete the row.',
        ], 500);

    }

    public function changeStatus(Request $request){


        $country = City::findOrFail($request->id);
        $country->status = $request->status;
        $country->save();
        return 1;
    }

    public function getCountryCities($countryId){
        $locale = app()->getLocale(); // Get the current locale

        // Retrieve cities and fetch the translated name for the current locale
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
