<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\po;
use App\Models\pr;
use App\Models\item_list;
use App\Models\karyawan;
use App\Models\item;
use App\Models\penerimaan_barang;

class Pos extends Component
{
    public $pos, $prs_s, $po_id, $pr_id, $uuid, $type, $quantity, $price,
        $date, $invoice, $status, $karyawan_id;
    public $karyawans_p, $items, $req_date;
    public $isModalOpen = 0;

    public function render()
    {
        $this->pos= po::with('pr', 'job', 'karyawan', 'suplayer')->get();
        $this->prs_s= pr::where('status', 'SUCCESS')->get();
        $this->karyawans_p = karyawan::all();
        $this->items = item::all();

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
        $this->pr_id = '';
        $this->po_id = '';
        $this->uuid = '';
        $this->req_date = '';
        $this->karyawan_id = '';
        $this->status = '';
    }

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'pr_id' => 'required',
            'karyawan_id' => 'required',
        ]);
        
        $tgl=date('d-m-Y');
        $date = date("Y-m-d H:i:s");
        $kode = 'PO' . substr($tgl,-2) . substr($tgl,-7,2) . '_' . mt_rand(1000, 9999);

        $prs = pr::find($this->pr_id);

        $pos = po::Create([
                'karyawan_id' => $this->karyawan_id,
                'pr_id' => $this->pr_id,
                'job_id' => $prs->job_id,
                'suplayer_id' => $prs->suplayer_id,
                'uuid' => $kode,
                'date' => $date,
                'price' => $prs->price,
            ]);

        $po = po::where('pr_id', $this->pr_id)->get();
        if ($pos == true) {
            $item_list = item_list::where('pr_id', $this->pr_id)->get();
            foreach ($item_list as $item_list) {
                $item_list->po_id = $pos->id;
                $item_list->update();
            }
        }
    
        session()->flash('message', 'Purchase Order Created Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }

    public function edit($id)
    {
        $this->pos = po::findOrFail($id);
        $this->po_id = $id;
        $this->pr_id = $this->pos->pr_id;
        $this->uuid = $this->pos->uuid;
        $this->karyawan_id = $this->pos->karyawan_id;
     
        $this->openModalPopover();
    }
    
    public function update()
    {
        $this->validate([
            'pr_id' => 'required',
            'karyawan_id' => 'required',
        ]);
    
        $pos = po::find($this->po_id);
        $prs = pr::find($this->pr_id);

        $pos = po::update([
                'karyawan_id' => $this->karyawan_id,
                'pr_id' => $this->pr_id,
            ]);

        $po = po::where('pr_id', $this->pr_id)->get();
        if ($pos == true) {
            $item_list = item_list::where('pr_id', $this->pr_id)->get();
            foreach ($item_list as $item_list) {
                $item_list->po_id = $pos->id;
                $item_list->update();
            }
        }
   
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

    public function pilih()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function list($id)
    {
        $item_lists = item_list::where('po_id', $id)->get();
        // dd($item_lists);
        
        foreach ($item_lists as $item_lists) {
            $this->pr_id = $item_lists->pr_id;
            $this->item_id = $item_lists->item_id;
            $this->quantity = $item_lists->quantity;
            // dd($item_lists->price); //debug
        }

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function status($id)
    {
        $pos = po::find($id);
        $this->uuid = $pos->uuid;
        $this->po_id = $pos->id;
        $this->openModalPopover();
    }

    public function setStatus()
    {
        $this->validate([
            'req_date' => 'required',
            'status' => 'required',
        ]);
        // dd($this->po_id, $this->status, $this->req_date);
        $this->pos = po::find($this->po_id); 
        $this->pos->status = $this->status;
        $this->pos->save();
        
        if ($this->status == 'SUCCESS' ) {
            $pos = po::find($this->po_id);
            $penerimaan = new penerimaan_barang;
            $penerimaan->job_id = $pos->job_id;
            $penerimaan->karyawan_id = $pos->karyawan_id;
            $penerimaan->suplayer_id = $pos->suplayer_id;
            $penerimaan->po_id = $pos->id;
            $penerimaan->req_date = $this->req_date;
            $penerimaan->save();
            session()->flash('message', 'Purchase Order Status SUCCESS.');
        }else { 
            session()->flash('message', 'Purchase Order Status FAILED.');
        }

        $this->closeModalPopover();
        $this->resetCreateForm();
        
    }

}
