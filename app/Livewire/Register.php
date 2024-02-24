<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name , $email , $password;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function saveUser()
    {
        $validatedData = $this->validate();
        User::create($validatedData);
        return redirect()->route('user.login');
    }
    public function render()
    {
        return view('livewire.register');
    }
}
