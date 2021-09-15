<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\po;
use App\Models\pr;
use App\Models\item_list;
use App\Models\karyawan;

class Pos extends Component
{
    public $pos, $prs_s, $po_id, $pr_id, $uuid, $type, $quantity, $price,
        $date, $invoice, $status, $karyawan_id;
    public $karyawans_p;
    public $isModalOpen = 0;

    public function render()
    {
        $this->pos= po::with('pr', 'job', 'karyawan', 'suplayer')->get();
        $this->prs_s= pr::where('status', 'SUCCESS')->get();
        $this->karyawans_p = karyawan::all();

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
        $this->karyawan_id = '';
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
