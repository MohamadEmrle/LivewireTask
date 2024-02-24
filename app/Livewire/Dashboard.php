<?php

namespace App\Livewire;

use App\Http\Traits\imageTrait;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class Dashboard extends Component
{
    use imageTrait;
    use WithFileUploads;
    public $patients;
    public $name , $email , $password , $phone , $image , $patient_id;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'phone' => 'required',
        'image' => 'required',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function savePatient()
    {
        $this->validate();
        $hashPassword = Hash::make($this->password);
        $imagePath = $this->image->store('assets/images');
        // $imagePath = $this->saveImage($this->image,'/assets/images');
        Patient::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $hashPassword,
            'phone' => $this->phone,
            'image' => $imagePath,
        ]);
        session()->flash('store','Store Patient Successfully');
        // $this->emit('close-model');
        $this->resetInput();
    }
    public function deletePatient(int $patient_id)
    {
        $this->patient_id = $patient_id;
        $record = Patient::find($patient_id);
        $record->delete();
        return redirect()->back();
    }
    public function restInput()
    {
        $this->reset(['name', 'email', 'password', 'phone', 'image']);
    }
    public function render()
    {
        $this->patients = Patient::all();
        return view('livewire.dashboard',[$this->patients]);
    }
}










