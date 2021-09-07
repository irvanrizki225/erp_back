<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\departemen;

class Departemens extends Component
{
    public $departemens, $name, $departemen_id, $no;
    public $isModalOpen = 0;

    public function render()
    {
        $this->no =1;
        $this->departemens = departemen::all();
        return view('livewire.departemens')
        ->extends('layouts.backend')
        ->section('content');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        $this->departemen_id = '';
    }

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        departemen::Create([
            'name' => $this->name,
        ]);
   
        session()->flash('message', 
            $this->departemen_id ? 'departemen Updated Successfully.' : 'departemen Created Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function edit($id)
    {
        $departemen = departemen::findOrFail($id);
        $this->departemen_id = $departemen->id;
        $this->name = $departemen->name;
     
        $this->openModalPopover();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $departemen = departemen::find($this->departemen_id);
        $departemen->name = $this->name;
        $departemen->save();
   
        session()->flash('message', 'departemen Update Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }
    

    public function delete($id)
    {
        departemen::find($id)->delete();
        session()->flash('message', 'departemen Deleted Successfully.');
    }
}
