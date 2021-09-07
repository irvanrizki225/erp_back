<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\job_karyawan;
use App\Models\karyawan;
use App\Models\job;

class JobLists extends Component
{
    public $job_lists, $job_list_id, $jobs, $karyawans, $name, $req_date,
    $start, $finished, $descrip;

    public $isModalOpen = 0;

    public function mount()
    {
	$this->jobs = job::all();
    $this->karyawans = karyawan::all();
    }

    public function render()
    {
        $this->jobs = job::all();
        $this->job_lists = job_karyawan::with('job', 'karyawan')->get();
        return view('livewire.job-lists')
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
        $this->job_list_id = '';
        $this->jobs = '';
        $this->karyawana = '';
        $this->name = '';
        $this->req_date = '';
        $this->start = '';
        $this->finihed = '';
        $this->descrip = '';
    }

    public function store()
    {
        $this->validate([
            'name'              => 'required|min:3|max:35',
            'req_date'          => 'required|email|unique:users,email',
            'start'             => 'required|confirmed',
            'finished'          => 'required',
            'description'       => 'required',
        ]);

        foreach ($this->job_lists as $job_list) {
            $job_list = new job_karyawan;
            $job_list->job_id = $this->jobs;
            $job_list->karyawan_id = $this->karyawans;
            $job_list->name = $this->name;
            $job_list->req_date = $this->req_date;
            $job_list->start = $this->start;
            $job_list->finished = $this->finished;
            $job_list->description = $this->description;
        }

   
        session()->flash('message', 'karyawan Created Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function edit($id)
    {
        $karyawan = job_karyawan::with('user','departemen')->findOrFail($id);
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

        $karyawans = job_karyawan::find($this->karyawan_id);
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

        session()->flash('message', 'karyawan Update Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function delete($id)
    {
        $this->karyawans=job_karyawan::find($id);
        $this->karyawans->user()->delete();
        session()->flash('message', 'karyawan Deleted Successfully.');
    }

}
