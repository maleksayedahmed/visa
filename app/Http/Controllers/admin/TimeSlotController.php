<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeSlotRequest;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlot::all();
        return view('template.admin.time_slots.index', compact('timeSlots'));
    }

    public function create()
    {
        $timeSlot = new TimeSlot();
        return view('template.admin.time_slots.create_and_edit', compact('timeSlot'));
    }

    public function store(TimeSlotRequest $request)
    {
        $data = $request->validated();
        TimeSlot::create($data);
        return redirect()->route('admin.time_slots.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit(TimeSlot $timeSlot)
    {
        return view('template.admin.time_slots.create_and_edit', compact('timeSlot'));
    }

    public function update(TimeSlotRequest $request, TimeSlot $timeSlot)
    {
        $data = $request->validated();
        $timeSlot->update($data);
        return redirect()->route('admin.time_slots.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy(TimeSlot $timeSlot)
    {
        $timeSlot->delete();
        return response()->json(['success' => true, 'message' => __('messages.time_slot_deleted')]);
    }
}
