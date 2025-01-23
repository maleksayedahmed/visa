<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\Reservation;
use App\Models\Country;
use App\Models\Doctor;
use App\Models\Pet;
use App\Models\Service;
use App\Services\reservationService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationService;

    public function __construct(reservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }
    public function index()
    {
        $reservations = $this->reservationService->index();
        return view('template.admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $reservation = new Reservation();
        $pets = Pet::where('status' , 1)->get();
        $doctors = Doctor::whereHas('user', function ($query) {
            $query->where('is_activated', 1) // Only activated users
                ->where('is_blocked', 0); // Not blocked
        })->get();

        return view('template.admin.reservations.create_and_edit', compact('reservation', 'pets' , 'doctors'));
    }
    public function store(ReservationRequest $request)
    {
        // dd($request->validated());
        $data = $request->validated();
        $pet = Pet::findOrFail($data['pet_id']);
        $data['user_id'] = $pet->user->id;
        $data['reservation_time'] = Carbon::createFromFormat('h:i A', $data['reservation_time'])->format('H:i');

        $this->reservationService->store($data);
        return redirect()->route('admin.reservations.index')->with('success', __('messages.AddedMessage'));
    }

    public function edit( string $id)
    {

        $reservation = $this->reservationService->find($id);
        // dd($reservation);
        $pets = Pet::where('status' , 1)->get();
        $doctors = Doctor::whereHas('user', function ($query) {
            $query->where('is_activated', 1) // Only activated users
                ->where('is_blocked', 0); // Not blocked
        })->get();


        $doctor = Doctor::findOrFail($reservation->doctor_id);

        // Get all future working days with their IDs and dates
        $workingDays = $doctor->workingDays()
            ->where('working_date', '>=', now()->toDateString()) // Only future or today
            ->get(['id', 'working_date']); // Retrieve the ID and working date


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
        $reservedSlots = Reservation::where('doctor_id', $reservation->doctor_id)
            ->where('working_day_id', $reservation->working_day_id)
            ->where('reservation_time' , '!=' , $reservation->reservation_time)
            ->pluck('reservation_time')
            ->map(function ($time) {
                return Carbon::parse($time)->format('h:i A'); // Convert reserved times to 12-hour format
            })
            ->toArray();


        // Filter available time slots
        $availableSlots = array_values(array_diff($timeSlots, $reservedSlots));

        // dd($reservation->services->pluck('service_id')->toArray()   );
        return view('template.admin.reservations.create_and_edit', compact('reservation', 'pets' , 'doctors' , 'workingDays' , 'availableSlots'));
    }

    public function update(ReservationRequest $request, $id)
    {
        $data = $request->validated();
        $pet = Pet::findOrFail($data['pet_id']);
        $data['user_id'] = $pet->user->id;
        $data['reservation_time'] = Carbon::createFromFormat('h:i A', $data['reservation_time'])->format('H:i');
        $this->reservationService->update($data,$id);
        return redirect()->route('admin.reservations.index')->with('success', __('messages.UpdatedMessage'));
    }

    public function destroy($id)
    {
        $this->reservationService->destroy($id);
    }

    function changeStatus(Request $request)
    {
        $id = $request->input("id");
        $item = $this->reservationService->find($id);
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
        $item = $this->reservationService->updateAnyColumn($data, $id);
    }
}
