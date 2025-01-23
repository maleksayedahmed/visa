<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Allow all authenticated users
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'doctor_id' => 'required|exists:doctors_info,id',
            'pet_id' => 'required|exists:pets,id',
            'status' => 'required|string|in:0,1',
            'working_day_id' => 'required|exists:working_days,id', // Must exist in the working_days table
            'reservation_time' => [
                'required',
                'date_format:h:i A', // Validate the time format (e.g., 08:00 AM)
                function ($attribute, $value, $fail) {
                    $this->validateTimeSlot($value, $fail);
                },
            ], // Must be a valid time (HH:mm format)
            'payment_type_id' => 'nullable|exists:payment_types,id', // Must exist in the payment_types table
        ];
    }

     /**
     * Validate the time slot logic.
     *
     * @param string $value The time slot to validate
     * @param callable $fail Callback for validation failure
     */
    private function validateTimeSlot($value, $fail)
    {
        $doctorId = $this->input('doctor_id');
        $workingDay = $this->input('working_day');

        // Fetch doctor and working day details
        $doctor = Doctor::find($doctorId);

        if (!$doctor) {
            return $fail('The selected doctor is invalid.');
        }

        // Convert start_work and end_work to Carbon instances
        $startWork = Carbon::parse($doctor->start_work);
        $endWork = Carbon::parse($doctor->end_work);

        // Convert the time_slot into a Carbon instance
        $timeSlot = Carbon::createFromFormat('h:i A', $value);

        // Check if the time slot is within working hours
        if ($timeSlot->lt($startWork) || $timeSlot->gte($endWork)) {
            return $fail('The selected time slot is outside the doctor\'s working hours.');
        }

        // Check if the time slot is already reserved
        $isReserved = Reservation::where('doctor_id', $doctorId)
            ->where('working_day_id', $workingDay)
            ->where('reservation_time', $timeSlot->format('H:i')) // Stored in 24-hour format
            ->exists();

        if ($isReserved) {
            return $fail('The selected time slot is already reserved.');
        }
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'doctor_id.required' => 'The doctor ID is required.',
            'doctor_id.exists' => 'The selected doctor does not exist.',
            'pet_id.required' => 'The pet ID is required.',
            'pet_id.exists' => 'The selected pet does not exist.',
            'time_slot_id.exists' => 'The selected time slot does not exist.',
            'status.required' => 'The reservation status is required.',
            'status.in' => 'The reservation status must be one of: pending, confirmed, or canceled.',
            'working_day_id.required' => 'The working day ID is required.',
            'working_day_id.exists' => 'The selected working day does not exist.',
            'reservation_time.required' => 'The reservation time is required.',
            'reservation_time.date_format' => 'The reservation time must be in the format HH:mm.',
            'payment_type_id.required' => 'The payment type ID is required.',
            'payment_type_id.exists' => 'The selected payment type does not exist.',
        ];
    }
}
