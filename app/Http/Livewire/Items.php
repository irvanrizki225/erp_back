<?php

namespace App\Http\Livewire;

use App\Models\item;

use Livewire\Component;

class Items extends Component
{
    public $items, $item_id, $uuid, $name, $type, $unit, $price;

    public $isModalOpen = 0;

    public function render()
    {
        $this->items = item::all();
        return view('livewire.items')
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
        $this->uuid = '';
        $this->type = '';
        $this->unit = '';
        $this->price = '';
        $this->item_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'type' => 'required',
            'unit' => 'required',
            'price' => 'required',
        ]);
        
        $kode = $this->type . '_' . mt_rand(1000, 9999) . mt_rand(10, 99);
        
        item::Create([
            'name' => $this->name,
            'uuid' => $kode,
            'type' => $this->type,
            'unit' => $this->unit,
            'price' => $this->price,
        ]);
   
        session()->flash('message', 'Item Create Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function edit($id)
    {
        $items = item::findOrFail($id);
        $this->item_id = $items->id;
        $this->name = $items->name;
        $this->uuid = $items->uuid;
        $this->type = $items->type;
        $this->unit = $items->unit;
        $this->price = $items->price;
     
        $this->openModalPopover();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'type' => 'required',
            'unit' => 'required',
            'price' => 'required',
        ]);

        $jobs = item::find($this->item_id);
        $jobs->name = $this->name;
        $jobs->type = $this->type;
        $jobs->price = $this->price;
        $jobs->unit = $this->unit;
        $jobs->update();
   
        session()->flash('message', 'Item Update Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }
    

    public function delete($id)
    {
        item::find($id)->delete();
        session()->flash('message', 'Item Deleted Successfully.');
    }
}
