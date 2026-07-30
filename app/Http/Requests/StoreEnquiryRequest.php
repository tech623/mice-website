<?php

namespace App\Http\Requests;

use App\Models\Enquiry;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'location' => ['required', 'string'],
            'venue' => ['required', 'string'],
            'number_of_guests' => ['required', 'numeric', 'gt:0'],
            'event_id' => 'required|numeric',
            'source' => ['required', 'string'],
            'status' => ['required', 'string'],
            'proposed_start_date' => ['required'],
            'proposed_end_date_date' => ['required'],
            'company_name' => ['required', 'string'],
            'number_of_rooms' => ['required', 'numeric', 'gt:0'],
            'number_of_room_nights' => ['required', 'numeric', 'gt:0'],
            'client_designation' => ['required', 'string'],
            // 'number_of_single_room' => ['required','numeric'],
            // 'tariff_for_single_room' => ['required','numeric'],
            // 'number_of_double_room' => ['required','numeric'],
            // 'tariff_for_double_room' => ['required','numeric'],
            //'gst' => ['required', 'numeric', Rule::in(Enquiry::GST)],

            'gst' => [
                function ($attribute, $value, $fail) {
                    if (in_array(request()->input('event_id'), Enquiry::EVENT_IDS) && !is_numeric($value)) {
                        $fail('The GST field must be numeric when Event type is Team outing, Banquets, ODC.');
                    }
                },
                'required_if:event_id,3,8,10', // Makes tariff required if event_id is 3
            ],

            'meal_plan' => ['required', 'string'],
            'meal_package' => ['required', 'string'],
            'tariff' => [
                function ($attribute, $value, $fail) {
                    if (in_array(request()->input('event_id'), Enquiry::EVENT_IDS) && !is_numeric($value)) {
                        $fail('The Tariff field must be numeric when Event type is Team outing, Banquets, ODC.');
                    }
                },
                'required_if:event_id,3,8,10', // Makes tariff required if event_id is 3
            ],
            'room_occupancy.*' => $this->getRoomOccupancyValidation(), // Adjust the validation rule as needed
            'tariff_of_room.*' => $this->getTariffOfRoomValidation(), // Adjust the validation rule as needed
            'no_of_rooms.*' => $this->getNoOfRoomsValidation(), // Adjust the validation rule as needed
            'room_type.*' => $this->getRoomTypesValidation(), // Adjust the validation rule as needed
            'room_gst.*' => $this->getRoomGSTValidation(), // Adjust the validation rule as needed
        ];
    }

    public function messages()
    {
        return [
            'proposed_start_date' => 'The Event start date field is required.',
            'proposed_end_date_date' => 'The Event end date field is required.',
        ];
    }

    // Define the dynamic validation rules based on event_id
    private function getRoomOccupancyValidation()
    {
        return !in_array($this->input('event_id'), Enquiry::EVENT_IDS) ? 'required' : 'nullable'; // Adjust rules accordingly
    }

    private function getTariffOfRoomValidation()
    {
        return !in_array($this->input('event_id'), Enquiry::EVENT_IDS) ? 'required|numeric' : 'nullable'; // Adjust rules accordingly
    }

    private function getNoOfRoomsValidation()
    {
        return !in_array($this->input('event_id'), Enquiry::EVENT_IDS) ? 'required|numeric' : 'nullable'; // Adjust rules accordingly
    }

    private function getRoomTypesValidation()
    {
        return !in_array($this->input('event_id'), Enquiry::EVENT_IDS) ? 'required|numeric|exists:room_types,id' : 'nullable'; // Adjust rules accordingly
    }

    private function getRoomGSTValidation()
    {
        return !in_array($this->input('event_id'), Enquiry::EVENT_IDS) ? 'required' : 'nullable'; // Adjust rules accordingly
    }
}
