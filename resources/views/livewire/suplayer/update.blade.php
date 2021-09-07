<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kode Suplayer</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Enter Name" wire:model="kode" readonly>
                    @error('kode') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Enter Name" wire:model="name">
                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Alamat</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Enter Alamat" wire:model="alamat">
                    @error('alamat') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">No Telp / WA</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Enter No Telp / WA" wire:model="no_telp">
                    @error('no_telp') <span class="text-danger error">{{ $message }}</span>@enderror
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