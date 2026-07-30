<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Mockery\Undefined;

class ConsumerRegister extends Component
{
    public $email;
    public $password;
    public $confirm_password;
    public $full_name;
    public $currentStep = 1;

    public function render()
    {
        return view('livewire.consumer-register');
    }
    
    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|email|unique:users'
        ]);

        $this->currentStep = 2;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function submitForm()
    {
        $this->validate([
            'full_name' => 'required|string',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        
        $string = $this->full_name;
        $lastSpacePosition = strrpos($string, ' ');
        
        if ($lastSpacePosition !== false) {
            $firstPart = substr($string, 0, $lastSpacePosition);
            $secondPart = substr($string, $lastSpacePosition + 1);
        
            $result = [$firstPart, $secondPart];
        } else {
            // No space found, handle accordingly
            $result = [$string];
        }
        
        if(array_key_exists(0,$result)){
            $firstname = $result[0];
        }else {
            $firstname = null;
        }

        if(array_key_exists(1,$result)){
            $lastname = $result[1];
        }else {
            $lastname = null;
        }

        User::create([
            'email' => $this->email,
            'name' => $this->full_name,
            'first_name' => $firstname,
            'last_name' => $lastname,
            'password'  => Hash::make($this->password)
        ]);

        $this->currentStep = 3;
    }
}
