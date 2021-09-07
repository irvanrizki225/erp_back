<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Daftar Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Enter Name" wire:model="name">
                    @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tipe Barang</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Enter Tipe Barang" wire:model="type">
                    @error('type') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Unit</label>
                    <select name="unit" wire:model="unit"
                    class="form-control" id="exampleFormControlInput2">
                            <option value="">-- Choose Unit --</option>
                            <option value="Buah">Buah</option>
                            <option value="Meter">Meter</option>
                    </select>
                    @error('unit') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Enter Harga" wire:model="price">
                    @error('price') <span class="text-danger error">{{ $message }}</span>@enderror
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