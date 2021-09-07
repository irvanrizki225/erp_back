<?php

namespace App\Http\Livewire;

use Livewire\Component;



class ItemLists extends Component
{

    public function render()
    {
        return view('livewire.item-lists')
        ->extends('layouts.backend')
        ->section('content');
    }
    
    public function delete($id)
    {
        job::find($id)->delete();
        session()->flash('message', 'Job Deleted Successfully.');
    }

    public function pilih()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function karyawan()
    {
        $this->validate([
            'job' => 'required',
            'id_karyawan' => 'required',
            'req_date' => 'required',
            'descrip' => 'required',
        ]);
        $jobs = job::find($this->job);
        // dd($this->id_karyawan);
        
        foreach ($this->id_karyawan as $this->id_karyawan) {
            $karyawans = new job_karyawan;
            $karyawans->job_id = $this->job;
            $karyawans->karyawan_id = $this->id_karyawan;
            $karyawans->req_date = $this->req_date;
            $karyawans->description = $this->descrip;
            $karyawans->save();
        }
        // dd($karyawans);
        session()->flash('message', 'Job Karyawan Created Successfully.');

            $this->closeModalPopover();
            $this->resetCreateForm();
    }
    protected $listeners = ['open' => 'list'];

    public function list($id)
    {
        // $this->job_lists = job_karyawan::findOrFail($id)->with('job');
        $this->job_lists = job_karyawan::where('job_id','=', $id)->with('job')->get();
        // $this->id_karyawan = $this->job_lists->karyawan_id;
        $this->karyawans = karyawan::all();
        dd($this->job_lists);

        // $this->emit('ShowKaryawan');
    }
}
