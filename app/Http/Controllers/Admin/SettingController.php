<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Models\Category;
use App\Models\User;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {
        $setting = Setting::firstOrCreate([]);

        return view('template.admin.settings.create_and_edit', compact('setting'));
    }

    public function create()
    {
        $setting = new Setting();
        $categories = Category::all();
        $users = User::all();
        return view('template.admin.settings.create_and_edit', compact('blog', 'categories', 'users'));
    }

    public function store(SettingRequest $request)
    {
        // dd($request);
        $this->settingService->store($request->validated());
        return redirect()->route('admin.settings.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit( $id)
    {
        $setting = $this->settingService->find($id);
        $categories = Category::all();
        $users = User::all();
        return view('template.admin.settings.create_and_edit', compact('blog', 'categories', 'users'));
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());
        return redirect()->back()->with('success', 'Settings updated successfully!');
    }


    public function destroy($id)
    {
        $this->settingService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $setting = $this->settingService->find($id);
        $status = 0;
        if (isset($setting) && !empty($setting->id)) {
            if ($setting->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
        }
        $data = array(
            'status' => $status
        );
        $setting = $this->settingService->updateAnyColumn($data, $id);
    }

}
