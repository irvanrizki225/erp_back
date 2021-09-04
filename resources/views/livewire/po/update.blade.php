<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Purchase Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Barang</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" 
                        wire:model="uuid" readonly>
                        @error('uuid') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Type</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" 
                        wire:model="type" placeholder="Enter Type">
                        @error('type') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Quantity</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" 
                        wire:model="quantity" placeholder="Enter Quantity">
                        @error('quantity') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">    
                        <label for="exampleFormControlInput2">Date</label>
                        <input type="date" class="form-control" id="exampleFormControlInput2" 
                        wire:model="date" placeholder="Enter Date">
                        @error('date') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Status</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" 
                        wire:model="status"  readonly>
                         @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>  
        </div>
    </div>
</div>