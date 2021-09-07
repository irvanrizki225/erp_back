<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\item_list;
use App\Models\item;
use App\Models\pr;
use App\Models\job;
use App\Models\suplayer;
use App\Models\karyawan;

class Prs extends Component
{
    public $prs, $pr_id, $item_lists, $item_list_id, $job_id, $jobs, 
        $karyawan_id, $karyawans, $suplayer_id, $suplayers;
    public $uuid, $price, $date, $status; 
    public $isModalOpen = 0;

    public function render()
    {
        $this->prs = pr::with('job', 'karyawan', 'suplayer')->get();
        $this->jobs = job::all();
        $this->karyawan = karyawan::all();
        $this->suplayers = suplayer::all();
        return view('livewire.prs')
        ->extends('layouts.backend')
        ->section('content');
    }

    public function store()
    {
        $this->validate([
            'karyawan_id' => 'required',
            'job_id' => 'required',
            'suplayer_id' => 'required',
            'uuid' => 'required',
            'date' => 'required',
        ]);
        $tgl=date('d-m-Y');
        $kode = 'PR' . substr($tgl,-2) . substr($tgl,-7,2) . '_' . mt_rand(1000, 9999);
        $this->profit = (30/100) * $this->price;
        pr::Create([
            'karyawan_id' => $this->karyawan_id,
            'job_id' => $this->job_id,
            'suplayer_id' => $this->suplayer_id,
            'uuid' => $kode,
            'date' => $this->date,
        ]);
   
        session()->flash('message', 'Purchase Request Create Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function edit($id)
    {
        $jobs = job::findOrFail($id);
        $this->job_id = $jobs->id;
        $this->name = $jobs->name;
        $this->uuid = substr($jobs->uuid,12);
        $this->company = $jobs->company;
        $this->price = $jobs->price;
     
        $this->openModalPopover();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'uuid' => 'required',
            'company' => 'required',
            'price' => 'required',
        ]);
        $tgl=date('d-m-Y');
        $kode = 'JOB' . substr($tgl,-2) . substr($tgl,-7,2) . '_' . mt_rand(1000, 9999);
        $this->profit = (30/100) * $this->price;

        $jobs = job::find($this->job_id);
        $jobs->uuid = substr($jobs->uuid,0,12).$this->uuid;
        $jobs->name = $this->name;
        $jobs->company = $this->company;
        $jobs->price = $this->price;
        $jobs->profit = $this->profit;
        $jobs->save();
   
        session()->flash('message', 'Job Update Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
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
