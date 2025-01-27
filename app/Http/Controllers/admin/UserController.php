<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('template.admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        $cities = City::all();
        $countries = Country::all();
        $roles = Role::all();

        return view('template.admin.users.create_and_edit', compact('user', 'cities', 'countries', 'companies', 'roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        if (isset($data['is_activated']) && $data['is_activated'] == 'on') {
            $data['is_activated'] = 1;
        } else {
            $data['is_activated'] = 0;
        }

        if (isset($data['is_blocked']) && $data['is_blocked'] == 'on') {
            $data['is_blocked'] = 1;
        } else {
            $data['is_blocked'] = 0;
        }
        $user = User::create($data);
        $user->assignRole($data['role']);


        return redirect()->route('admin.users.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(User $user)
    {

        $cities = City::all();
        $countries = Country::all();
        $roles = Role::all();

        return view('template.admin.users.create_and_edit', compact('user', 'cities', 'countries',  'roles'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();

        if ($data['password'] == null) {
            unset($data['password']);

        }

        if (isset($data['is_activated']) && $data['is_activated'] == 'on') {
            $data['is_activated'] = 1;
        } else {
            $data['is_activated'] = 0;
        }

        if (isset($data['is_blocked']) && $data['is_blocked'] == 'on') {
            $data['is_blocked'] = 1;
        } else {
            $data['is_blocked'] = 0;
        }
        $user->update($data);

        if ($request->has('addresses')) {
            $existingAddressIds = collect($request->addresses)->pluck('id')->filter();
            $user->addresses()->whereNotIn('id', $existingAddressIds)->delete();

            foreach ($request->addresses as $addressData) {
                $addressId = $addressData['id'] ?? null;
                $addressData['status'] = 1;

                if ($addressId) {
                    $user->addresses()->find($addressId)->update($addressData);
                } else {
                    $addressData['user_id'] = $user->id;
                    $user->addresses()->create($addressData);
                }
            }
        }

        return redirect()->route('admin.users.index')->with('success', __('messages.UpdatedMessage'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => true, 'message' => __('messages.user_deleted')]);
    }
}
