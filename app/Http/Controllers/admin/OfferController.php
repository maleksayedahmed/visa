<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Services\OfferService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    protected $offerService;

    public function __construct(OfferService $offerService)
    {
        $this->offerService = $offerService;
    }
    public function index()
    {
        $offers = $this->offerService->index();
        return view('template.admin.offers.index' , compact('offers'));
    }

    public function create(Offer $item)
    {
        return view('template.admin.offers.create_and_edit' ,compact('item' ) );
    }

    public function store(Request $request)
    {
        $this->offerService->store($request->all());
        return redirect()->route('admin.offers.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->offerService->find($id);
        return view('template.admin.offers.create_and_edit' , compact('item' ) );
    }

    public function update(Request $request, string $id)
    {
        $this->offerService->update($request->all(),$id);
        return redirect()->route('admin.offers.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->offerService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->offerService->find($id);
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
        $item = $this->offerService->updateAnyColumn($data, $id);
    }


}
