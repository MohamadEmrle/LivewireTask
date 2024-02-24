<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email , $password;
    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function loginUser()
    {
        $data = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        if(Auth::guard('web')->attempt($data)) {
            return redirect()->route('user.dashboard');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
