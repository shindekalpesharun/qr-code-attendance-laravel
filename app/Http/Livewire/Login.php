<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function submit()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('home');
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
