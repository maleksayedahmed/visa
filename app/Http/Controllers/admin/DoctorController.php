<?php

namespace App\Http\Controllers\admin;

use App\Models\Area;
use App\Models\City;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Services\DoctorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\DoctorSpecialization;
use App\Models\Reservation;
use App\Services\UserService;
use Carbon\Carbon;

class DoctorController extends Controller
{
    protected $doctorService;
    protected $userService;

    public function __construct(DoctorService $doctorService, UserService $userService)
    {
        $this->doctorService = $doctorService;
        $this->userService = $userService;
    }

    public function index()
    {
        $doctors = $this->doctorService->index();
        return view('template.admin.doctors.index', compact('doctors'));
    }

    public function create(Doctor $item)
    {
        $specializations = DoctorSpecialization::where('status', 1)->get();
        $user = new User();
        $companies = Company::where('status', '1')->get();
        $areas = Area::all();
        $cities = City::all();
        $countries = Country::all();
        return view('template.admin.doctors.create_and_edit', compact('item', 'specializations', 'user', 'companies', 'countries'));
    }

    public function store(DoctorRequest $request)
    {
        // dd($request);
        $data = $request->validated();
        $user = $this->userService->store($data);
        $doctor = $this->doctorService->store($data, $user->id);
        $workingDays = explode(',', $data['working_days']);

        // Store the working days
        foreach ($workingDays as $date) {
            $doctor->workingDays()->create([
                'working_date' => trim($date), // Trim any extra spaces
            ]);
        }
        return redirect()->route('admin.doctors.index')->with('success', __('messages.AddedMessage'));
    }
    public function edit(string $id)
    {
        $item = $this->doctorService->find($id);
        $specializations = DoctorSpecialization::where('status', 1)->get();
        $user = new User();
        $companies = Company::where('status', '1')->get();
        return view('template.admin.doctors.create_and_edit', compact('item', 'specializations', 'user', 'companies'));
    }

    public function update(Request $request, string $id)
    {
        $this->doctorService->update($request->all(), $id);
        return redirect()->route('admin.doctors.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->doctorService->destroy($id);
    }
    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->doctorService->find($id);
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
        $item = $this->doctorService->updateAnyColumn($data, $id);
    }

    public function getWorkingDays($doctorId)
    {
        $doctor = Doctor::findOrFail($doctorId);

        // Get all future working days with their IDs and dates
        $workingDays = $doctor->workingDays()
            ->where('working_date', '>=', now()->toDateString()) // Only future or today
            ->get(['id', 'working_date']); // Retrieve the ID and working date

        return response()->json($workingDays);
    }


    public function getTimeSlots($doctorId, $workingDay)
    {
        $doctor = Doctor::findOrFail($doctorId);

        // Generate time slots based on detection_time
        $startWork = Carbon::parse($doctor->start_work);
        $endWork = Carbon::parse($doctor->end_work);
        $detectionTime = $doctor->detection_time;

        $timeSlots = [];
        while ($startWork < $endWork) {
            $timeSlots[] = $startWork->format('h:i A'); // Format time in 12-hour format
            $startWork->addMinutes($detectionTime);
        }

        // Reserved time slots for the working day
        $reservedSlots = Reservation::where('doctor_id', $doctorId)
            ->where('working_day_id', $workingDay)
            ->pluck('reservation_time')
            ->map(function ($time) {
                return Carbon::parse($time)->format('h:i A'); // Convert reserved times to 12-hour format
            })
            ->toArray();


        // Filter available time slots
        $availableSlots = array_values(array_diff($timeSlots, $reservedSlots));
        // dd($timeSlots , $reservedSlots ,$availableSlots );

        return response()->json([
            'available_slots' => $availableSlots,
        ]);
    }




}
