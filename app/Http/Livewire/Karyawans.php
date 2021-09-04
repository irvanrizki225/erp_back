<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\karyawan;
use App\Models\departemen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;

class Karyawans extends Component
{
    public $name, $no_telp, $alamat, $departemen, $departemens, $user_id, $posisi,
    $username, $email, $password, $password_confirmation, $role, $karyawan_id, $user, $karyawans;

    public $isModalOpen = 0;

    // public function mount()
    // {
    //     $this->departemens = departemen::all();
    // }

    public function render()
    {
        $this->karyawans=karyawan::with('departemen', 'user')->get();
        return view('livewire.karyawans',['karyawan','departemen'])
        ->extends('layouts.backend')
        ->section('content');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->users_id = '';
        $this->name = '';
        $this->no_telp = '';
        $this->alamat = '';
        $this->departemen = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->karyawan_id = '';
        $this->posisi = '';
    }

    public function store()
    {
        $this->validate([
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'role'                  =>'required',
            'no_telp'               =>'required',
            'alamat'                =>'required',
            'departemen'            =>'required',
        ]);

        $this->user = new User;
        $this->user->name = ucwords(strtolower($this->name));
        $this->user->email = strtolower($this->email);
        $this->user->password = Hash::make($this->password);
        $this->user->role = $this->role;
        $this->user->email_verified_at = \Carbon\Carbon::now();
        $this->user->save();
        $user_id = $this->user->id;
        
        $this->karyawans = new karyawan;
        $this->karyawans->name = $this->name;
        $this->karyawans->no_telp = $this->no_telp;
        $this->karyawans->alamat = $this->alamat;
        $this->karyawans->posisi = $this->role;
        $this->karyawans->user()->associate($this->user);
        $this->karyawans->departemen_id= $this->departemen;
        $this->karyawans->save();
   
        session()->flash('message', 
            $this->karyawans ? 'karyawans Created Successfully.' : 'karyawans Created Unsuccessfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function edit($id)
    {
        $karyawan = karyawan::with('user','departemen')->findOrFail($id);
        $this->karyawan_id = $id;
        $this->name = $karyawan->name;
        $this->no_telp = $karyawan->no_telp;
        $this->alamat = $karyawan->alamat;
        $this->email = $karyawan->user->email;
        $this->role = $karyawan->user->role;
        $this->departemen = $karyawan->departemen->id;
        $this->openModalPopover();
    }

    public function update()
    {
        $this->validate([
            'karyawan_id'           => 'required|numeric',
            'name'                  => 'required|min:3|max:35',
            // 'email'                 => 'required|email|unique:users,email',
            'email'                 => 'required|email',
            'password'              => 'required|confirmed',
            'role'                  =>'required',
            'no_telp'               =>'required',
            'alamat'                =>'required',
            'departemen'            =>'required',
        ]);

        $karyawans = karyawan::find($this->karyawan_id);
        // if(is_null($this->karyawans)) {
        //     session()->flash('message','oke');    
        //  }
        $karyawans->departemen_id= $this->departemen;
        $karyawans->name = $this->name;
        $karyawans->no_telp = $this->no_telp;
        $karyawans->alamat = $this->alamat;
        $karyawans->posisi = $this->role;
        // dd($karyawans);
        $karyawans->save();

        $this->user = User::find($karyawans->user_id);
        $this->user->name = ucwords(strtolower($this->name));
        $this->user->email = strtolower($this->email);
        $this->user->password = Hash::make($this->password);
        $this->user->role = $this->role;
        $this->user->email_verified_at = \Carbon\Carbon::now();
        $this->user->karyawan()->save($karyawans);
        $this->user->save();
   
        session()->flash('message', 
            $karyawans ? 'karyawans Update Successfully.' : 'karyawans Update Unsuccessfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function delete($id)
    {
        $this->karyawans=karyawan::find($id);
        $this->karyawans->user()->delete();
        session()->flash('message', 'karyawan Deleted Successfully.');
    }
}
