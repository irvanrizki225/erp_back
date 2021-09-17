<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\penerimaan_barang;
use App\Models\po;
use App\Models\barang;

class PenerimaanBarangs extends Component
{
    public $penerimaan_barangs;

    public function render()
    {
        $this->penerimaan_barangs = penerimaan_barang::with('job','karyawan','po','suplayer')->get();
        return view('livewire.penerimaan-barangs')
        ->extends('layouts.backend')
        ->section('content');
    }

    public function delete($id)
    {
        $this->penerimaan_barangs=penerimaan_barang::find($id);
        po::where('id', $this->penerimaan_barangs->po_id)->delete();
        $this->penerimaan_barangs->delete(); 
        
        session()->flash('message', 'Penerimaan Barang Deleted Successfully.');
    }

    public function setStatus($value,$id)
    {
        $this->penerimaan_barangs = penerimaan_barang::find($id);
        $this->penerimaan_barangs->status = $value;
        $this->penerimaan_barangs->save();

        $pos = po::find($this->penerimaan_barangs->po_id);
        
        if ($value == 'SUCCESS' ) {
            barang::create([
                'po_id' =>  $pos->id,
                'uuid' =>  $pos->uuid,
                'name' => $pos->name,
                'type' => $pos->type,
                'quantity' => $pos->quantity,
            ]);
            session()->flash('message', 'Penerimaan Barang SUCCESS.');
        }else { 
            session()->flash('message', 'Penerimaan Barang FAILED.');
        }

        
    }

}
