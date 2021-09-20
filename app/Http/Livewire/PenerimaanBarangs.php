<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\penerimaan_barang;
use App\Models\po;
use App\Models\barang;

class PenerimaanBarangs extends Component
{
    public $penerimaan_barangs, $arrival_date, $pos, $uuid, $status, $po_id, $penerimaan_barang_id, $description;

    public function render()
    {
        $this->penerimaan_barangs = penerimaan_barang::with('job','karyawan','po','suplayer')->get();
        return view('livewire.penerimaan-barangs')
        ->extends('layouts.backend')
        ->section('content');
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
        $this->uuid = '';
        $this->arrival_date = '';
        $this->status = '';
        $this->penerimaan_barang_id = '';
        $this->description = '';
    }

    public function delete($id)
    {
        $this->penerimaan_barangs=penerimaan_barang::find($id);
        $this->penerimaan_barangs->delete(); 
        
        session()->flash('message', 'Penerimaan Barang Deleted Successfully.');
    }

    public function status($id)
    {
        $penerimaan_barang = penerimaan_barang::with('po')->find($id);
        $this->uuid = $penerimaan_barang->po->uuid;
        $this->penerimaan_barang_id = $penerimaan_barang->id;
        $this->openModalPopover();
    }

    public function setStatus()
    {
        $this->validate([
            'arrival_date' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);
        // dd($this->po_id, $this->status, $this->req_date);
        $penerimaan_barang = penerimaan_barang::find($this->penerimaan_barang_id); 
        $penerimaan_barang->status = $this->status;
        $penerimaan_barang->save();
        
        if ($this->status == 'SUCCESS' ) {
            $penerimaan_barang = penerimaan_barang::find($this->penerimaan_barang_id);
            $barang = new barang;
            $barang->job_id = $penerimaan_barang->job_id;
            $barang->karyawan_id = $penerimaan_barang->karyawan_id;
            $barang->suplayer_id = $penerimaan_barang->suplayer_id;
            $barang->penerimaan_barang_id = $this->penerimaan_barang_id;
            $barang->po_id = $penerimaan_barang->po_id;
            $barang->description = $this->description;
            $barang->save();
            session()->flash('message', 'Purchase Order Status SUCCESS.');
        }else { 
            session()->flash('message', 'Purchase Order Status FAILED.');
        }

        $this->closeModalPopover();
        $this->resetCreateForm();
        
    }

}
