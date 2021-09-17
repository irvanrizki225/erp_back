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
        $karyawan_id, $karyawans, $suplayer_id, $suplayers, $items, $item_id;
    public $uuid, $price, $date, $status, $quantity; 
    public $isModalOpen = 0;

    public function render()
    {
        $this->prs = pr::with('job', 'karyawan', 'suplayer')->get();
        $this->jobs = job::all();
        $this->item_lists = item_list::all();
        $this->karyawans = karyawan::all();
        $this->suplayers = suplayer::all();
        $this->items = item::all();
        return view('livewire.prs')
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
        $this->prs = '';
        $this->jobs = '';
        $this->item_lists = '';
        $this->suplayers = '';
        $this->date = '';
        $this->uuid = '';
        $this->price = '';
        $this->item_id = '';
        $this->quantity = '';
    }

    public function store()
    {
        $this->validate([
            'karyawan_id' => 'required',
            'job_id' => 'required',
            'suplayer_id' => 'required',
            'date' => 'required',
        ]);
        $tgl=date('d-m-Y');
        $kode = 'PR' . substr($tgl,-2) . substr($tgl,-7,2) . '_' . mt_rand(1000, 9999);

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
        $prs = pr::findOrFail($id);
        $this->pr_id = $prs->id;
        $this->karyawan_id = $prs->karyawan->id;
        $this->job_id = $prs->job->id;
        $this->suplayer_id = $prs->suplayer->id;
        $this->uuid = $prs->uuid;
        $this->date = $prs->date;
     
        $this->openModalPopover();
    }

    public function update()
    {
        $this->validate([
            'karyawan_id' => 'required',
            'job_id' => 'required',
            'suplayer_id' => 'required',
            'date' => 'required',
        ]);

        $prs = pr::find($this->pr_id);
        $prs->karyawan_id = $this->karyawan_id;
        $prs->job_id = $this->job_id;
        $prs->suplayer_id = $this->suplayer_id;
        $prs->date = $this->date;
        $prs->update();
   
        session()->flash('message', 'Purchase Request Update Successfully.');
   
            $this->closeModalPopover();
            $this->resetCreateForm();
    }
    

    public function delete($id)
    {
        job::find($id)->delete();
        session()->flash('message', 'Purchase Request Deleted Successfully.');
    }

    public function pilih()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }


    public function item()
    {
        $this->validate([
            'pr_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
        ]);

        //error kurang dalam inputan quantity
        foreach ($this->item_id as $this->item_id) {  
            $item_list = new item_list;
            $item_list->pr_id = $this->pr_id;
            $item_list->item_id = $this->item_id;
            $item_list->save();
        }

        //error kurang dalam inputan quantity
        foreach ($this->quantity as $this->quantity) {
            $item_list_q = item_list::where('pr_id',$item_list->pr_id)->get();
            foreach ($item_list_q as $item_list_q) {
                $item_list_q->quantity = $this->quantity;
    
                $items = item::find($item_list_q->item_id);
                $price = $items->price * $this->quantity;
        
                $item_list_q->price = $price;
                $item_list_q->update();
            }
        }
        
        //-----oke-----//
        $total_price = item_list::where('pr_id', $this->pr_id)->sum('price');
        $itemList = item_list::where('pr_id', $this->pr_id)->get();
        
        foreach ($itemList as $itemList) {
            $itemList->price_total = $total_price;
            $itemList->update();

            //error harusnya count di kolom harga item list
            $prs = pr::find($this->pr_id);
            $prs->price = $total_price;
            $prs->update();
        }
        // dd($item_id, $this->item_id, $this->quantity, $item_list);
        // dd($price);

        session()->flash('message', 'List Barang Created Successfully.');
       
    }
    protected $listeners = ['open' => 'list'];

    public function list($id)
    {
        $item_lists = item_list::where('pr_id', $id)->get();
        // $item_lists
        
        foreach ($item_lists as $item_lists) {
            $this->pr_id = $item_lists->pr_id;
            $this->item_id = $item_lists->item_id;
            $this->quantity = $item_lists->quantity;
            // dd($item_lists->price); //debug
        } 

        
    }

    public function setStatus($value,$id)
    {
        $this->prs = pr::find($id); 
        $this->prs->status = $value;
        $this->prs->save();
        
        if ($value == 'SUCCESS' ) {
            session()->flash('message', 'Purchase Request SUCCESS.');
        }else { 
            session()->flash('message', 'Purchase Request FAILED.');
        }

        
    }
}
