<div wire:ignore.self class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set Status Purchase Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Kode PO</label>
                        <input type="text" class="form-control" 
                                        id="exampleFormControlInput2"
                                        wire:model="uuid" placeholder="Enter Kode PO" readonly>
                         @error('uuid') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Arrival Date</label>
                        <input type="date" class="form-control" 
                                        id="exampleFormControlInput2"
                                        wire:model="arrival_date">
                         @error('arrival_date') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Status</label>
                        <select name="status" wire:model="status"
                        class="form-control" id="exampleFormControlInput2"> 
                            <option value="">-- Choose Status --</option>
                            <option value="SUCCESS">SUCCESS</option>
                            <option value="FAILED">FAILED</option>
                         </select>
                         @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Deskripsi Barang</label>
                        <textarea class="form-control" id="exampleFormControlInput1" 
                        placeholder="Enter Deskripsi" wire:model="description"></textarea>
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="setStatus()" class="btn btn-primary" >Save changes</button>
            </div>
        </div>
    </div>
</div>