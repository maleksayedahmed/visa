<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DoctorSpecialization;
use App\Services\DoctorSpecializationService;


class DoctorSpecializationController extends Controller
{
    protected $doctorSpecializationService;
    public function __construct(DoctorSpecializationService $doctorSpecializationService)
    {
        $this->doctorSpecializationService = $doctorSpecializationService;
    }
    public function index()
    {
        $doctor_specializations = $this->doctorSpecializationService->index();
        return view('template.admin.doctor_specializations.index', compact('doctor_specializations'));
    }

    public function create(DoctorSpecialization $item)
    {
        return view('template.admin.doctor_specializations.create_and_edit', compact('item'));
    }
    public function store(Request $request)
    {
        $this->doctorSpecializationService->store($request->all());
        return redirect()->route('admin.doctor_specializations.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(string $id)
    {
        $item = $this->doctorSpecializationService->find($id);
        return view('template.admin.doctor_specializations.create_and_edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $this->doctorSpecializationService->update($request->all(), $id);
        return redirect()->route('admin.doctor_specializations.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->doctorSpecializationService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->doctorSpecializationService->find($id);
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
        $item = $this->doctorSpecializationService->updateAnyColumn($data, $id);
    }


}
