<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\po;
use App\Models\penerimaan_barang;

class Pos extends Component
{
    public $pos, $barangs, $po_id, $name, $type, $quantity, 
    $barang_id, $date, $status, $uuid;
    public $isModalOpen = 0;
    public $nstatus = 'PENDING';

    public function render()
    {
        $this->pos= po::all();
        return view('livewire.pos')
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
        $this->po_id = '';
        $this->name = '';
        $this->type = '';
        $this->quantity = '';
        $this->barang_id = '';
        $this->date = '';
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
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
        $this->uuid = 'BRG' . mt_rand(10000, 99999) . mt_rand(10, 99);

        po::Create([
            'uuid' => $this->uuid,
            'name' => $this->name,
            'type' => $this->type,
            'quantity' => $this->quantity,
            'date' => $this->date,  
            'status' => $this->status,
        ]);
   
        session()->flash('message   ', 
            $this->po_id ? 'Purchase Order Updated Successfully.' : 'Purchase Order Created Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function edit($id)
    {
        $this->pos = po::findOrFail($id);
        $this->po_id = $id;
        $this->uuid = $this->pos->uuid;
        $this->name = $this->pos->name;
        $this->type = $this->pos->type;
        $this->quantity = $this->pos->quantity;
        $this->date = $this->pos->date;
        $this->status = $this->pos->status;
     
        $this->openModalPopover();
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'date' => 'required',
            'status' => 'required|in:PENDING, FAILED',
        ]);
    
        $pos = po::find($this->po_id);
        // if(is_null($this->$pos)) {
        //     session()->flash('message','oke');    
        //  }
        $pos->name = $this->name;
        $pos->type = $this->type;
        $pos->quantity = $this->quantity;
        $pos->date = $this->date;
        $pos->status = $this->status;
        $pos->save();
   
        session()->flash('message', 'Purchase Order Updated Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $this->pos = po::find($id);
        $this->pos->penerimaan_barang()->delete();
        $this->pos->delete();
        session()->flash('message', 'Purchase Order Deleted Successfully.');
    }

    public function setStatus($value,$id)
    {
        $this->pos = po::find($id); 
        $this->pos->status = $value;
        $this->pos->save();

        $status = "PENDING";
        
        if ($value == 'SUCCESS' ) {
            penerimaan_barang::create([
                'po_id' =>  $this->pos->id,
                'uuid' =>  $this->pos->uuid,
                'date' => $this->pos->date,
                'quantity' => $this->pos->quantity,
                'status' => $status,
            ]);
            session()->flash('message', 'Purchase Order SUCCESS.');
        }else { 
            session()->flash('message', 'Purchase Order FAILED.');
        }

        
    }

}
