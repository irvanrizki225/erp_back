<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\suplayer;

class Suplayers extends Component
{
    public $suplayers, $suplayer_id, $name, $kode, $alamat, $no_telp; 
    public $isModalOpen = 0;
    
    public function render()
    {
        $this->suplayers = suplayer::all();
        return view('livewire.suplayers')
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
        $this->name = '';
        $this->alamat = '';
        $this->kode = '';
        $this->no_telp = '';
        $this->suplayer_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
        $tgl=date('d-m-Y');
        $this->kode = 'SPY' . mt_rand(1000, 9999) . mt_rand(10, 99);
        suplayer::Create([
            'name' => $this->name,
            'kode' => $this->kode,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
        ]);
   
        session()->flash('message', 'Suplayer Create Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function edit($id)
    {
        $suplayers = suplayer::findOrFail($id);
        $this->suplayer_id = $suplayers->id;
        $this->name = $suplayers->name;
        $this->kode = $suplayers->kode;
        $this->alamat = $suplayers->alamat;
        $this->no_telp = $suplayers->no_telp;
    
        $this->openModalPopover();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $suplayer = suplayer::find($this->suplayer_id);
        $suplayer->kode = $this->kode;
        $suplayer->name = $this->name;
        $suplayer->alamat = $this->alamat;
        $suplayer->no_telp = $this->no_telp;
        $suplayer->save();
   
        session()->flash('message', 'Suplayer Update Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }
    

    public function delete($id)
    {
        suplayer::find($id)->delete();
        session()->flash('message', 'Suplayer Deleted Successfully.');
    }
}
