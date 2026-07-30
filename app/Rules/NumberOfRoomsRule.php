<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class NumberOfRoomsRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $inputs;
    protected $messages;

    public function __construct(Request $request)
    {
        $this->inputs = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->inputs->event_type == 1 || $this->inputs->event_type == 6) {
            
            if ($this->inputs->number_of_rooms != "") {
                if($this->inputs->number_of_rooms > 0){
                    return true;
                }else{
                    $this->messages = "The number of rooms must be greater than 0.";
                    return false;
                }
            } else {
                $this->messages = "Number of rooms field is required.";
                return false;
            }
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->messages;
    }
}
