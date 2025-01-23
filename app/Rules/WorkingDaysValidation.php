<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class WorkingDaysValidation implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Split the working_days string into an array
        $dates = explode(',', $value);

        foreach ($dates as $date) {
            // Check if it's a valid date in Y-m-d format // || Carbon::parse($date)->format('Y-m-d') !== $date
            if (!strtotime($date) ) {
                return false;
            }

            // Check if the date is in the future
            if (Carbon::parse($date)->isBefore(Carbon::today())) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'One or more working days are invalid or in the past.';
    }
}
