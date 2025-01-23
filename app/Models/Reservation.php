<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',           // Foreign key for user
        'doctor_id',         // Foreign key for doctor
        'pet_id',            // Foreign key for pet
        'time_slot_id',      // Foreign key for time slot
        'status',            // Reservation status
        'working_day_id',    // Foreign key for working day
        'reservation_time',  // Time of reservation
        'payment_type_id',   // Foreign key for payment type
        'created_by',        // ID of the user who created the record
        'updated_by',        // ID of the user who last updated the record
        'deleted_by',        // ID of the user who deleted the record
    ];

    /**
     * Relationship with the User (Patient or Client).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with the Doctor.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    /**
     * Relationship with the Pet.
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    /**
     * Relationship with the TimeSlot.
     */
    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    /**
     * Relationship with the WorkingDay.
     */
    public function workingDay()
    {
        return $this->belongsTo(WorkingDay::class);
    }

    /**
     * Relationship with the PaymentType.
     */
    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
