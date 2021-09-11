<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\item_list;

class ItemLists extends Component
{
    public $item_lists;

    public function render()
    {
        $this->item_lists = item_list::with('item', 'pr', 'po')->get();
        return view('livewire.item-lists')
        ->extends('layouts.backend')
        ->section('content');
    }
    
    public function delete($id)
    {
        item_list::find($id)->delete();
        session()->flash('message', 'Job Deleted Successfully.');
    }

}
