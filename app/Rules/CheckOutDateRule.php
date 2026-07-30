<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class CheckOutDateRule implements Rule
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
            
            if(!empty($this->inputs->check_out_date)){
                if(strtotime($this->inputs->check_out_date) > strtotime($this->inputs->check_in_date)){
                    return true;
                }else{
                    $this->messages = "The check out date must be a date after check in date.";
                    return false;
                }
            }else{
                $this->messages = "Check out date field is required.";
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
