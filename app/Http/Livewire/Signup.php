<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;


class Signup extends Component
{
    public $name;
    public $email;
    public $password;

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            // TODO: password length increase
            'password' => 'required|min:1',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => true,
            'password' => bcrypt($this->password),
        ]);

        Auth::login($user);

        // Redirect to the desired page after successful registration
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.signup');
    }
}
