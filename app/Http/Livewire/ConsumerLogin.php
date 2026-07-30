<?php

namespace App\Http\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ConsumerLogin extends Component
{
    public $email;
    public $password;
    public $currentStep = 1;
    public $shouldRedirect = false;
    public function render()
    {
        return view('livewire.consumer-login');
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|email|exists:users',
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
            'password' => 'required',
        ]);
        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            $this->currentStep = 3;
        }else {
            Session::flash('error', 'Incorrect Password.');
        }
        
    }
}
