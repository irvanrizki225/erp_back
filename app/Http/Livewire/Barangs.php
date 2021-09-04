<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\barang;

class Barangs extends Component
{
    public $barangs, $po_id, $name, $type, $quantity, $barang_id, $uuid;
    public $isModalOpen = 0;

    public function render()
    {
        $this->barangs = barang::all();
        return view('livewire.barangs')
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
        $this->po_id = '';
        $this->name = '';
        $this->type = '';
        $this->quantity = '';
        $this->barang_id = '';
        $this->uuid = '';
    }

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'po_id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
        ]);
        $this->uuid = 'BRG' . mt_rand(10000, 99999) . mt_rand(10, 99);
        barang::updateOrCreate([ 'id' => $this->barang_id], [
            'po_id' => $this->po_id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'type' => $this->type,
            'quantity' => $this->quantity
        ]);
   
        session()->flash('message', 
            $this->barang_id ? 'barang Updated Successfully.' : 'barang Created Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $barang = barang::findOrFail($id);
        $this->barang_id = $id;
        $this->po_id = $barang->po_id;
        $this->uuid = $barang->uuid;
        $this->name = $barang->name;
        $this->type = $barang->type;
        $this->quantity = $barang->quantity;
     
        $this->openModalPopover();
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        barang::find($id)->delete();
        session()->flash('message', 'barang Deleted Successfully.');
    }

}
