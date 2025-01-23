<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddressRequest;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function index()
    {
        $addresses = UserAddress::with(['user', 'area', 'city', 'country'])->get();
        return view('template.admin.user_addresses.index', compact('addresses'));
    }

    public function create()
    {
        $address = new UserAddress();
        return view('template.admin.user_addresses.form', compact('address'));
    }

    public function store(UserAddressRequest $request)
    {
        $data = $request->validated();
        UserAddress::create($data);

        return redirect()->route('admin.user_addresses.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(UserAddress $address)
    {
        return view('template.admin.user_addresses.form', compact('address'));
    }

    public function update(UserAddressRequest $request, UserAddress $address)
    {
        $data = $request->validated();
        $address->update($data);
        return redirect()->route('admin.user_addresses.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy(UserAddress $address)
    {
        $address->delete();
        return response()->json(['success' => true, 'message' => __('messages.address_deleted')]);
    }
}
