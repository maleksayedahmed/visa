<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $locale = app()->getLocale(); // Get the current locale

        // Retrieve cities and fetch the translated name for the current locale
        $cities = Area::where('city_id', $request->city_id)
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
    public function create(Area $item)
    {
        //
        $cities = City::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        return view('admin.areas.create_and_edit' ,compact('item' , 'cities' , 'countries') );

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
        Area::create($data);
        $request->session()->flash('success', __('messages.AddedMessage'));

        return redirect()->route('admin.areas.index');
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

        $item = Area::findOrFail($id);
        $cities = City::get();

        return view('admin.areas.create_and_edit' , compact('item' , 'cities') );

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $country = Area::findOrFail($id);
        if( isset($data['status'])  && $data['status'] == 'on'){
            $data['status'] = 1 ;
        }else{
            $data['status'] = 0;
        }

        $country->update($data);

        $request->session()->flash('success', __('messages.UpdatedMessage'));

        return redirect()->route('admin.areas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // dd($request);
        // Validate the incoming request
        $request->validate([
            'id' => 'required|exists:areas,id', // Ensure the ID exists in the database
        ]);

        // Find and delete the record
        $country = Area::findOrFail($request->id);

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


        $country = Area::findOrFail($request->id);
        $country->status = $request->status;
        $country->save();
        return 1;
    }


}
