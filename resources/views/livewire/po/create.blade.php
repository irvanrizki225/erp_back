<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Purchase Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Pilih PR</label>
                        <select name="Departemen" wire:model="pr_id"
                        class="form-control" id="exampleFormControlInput2"> 
                            <option value="">-- Choose PR --</option>
                            @foreach ($prs_s as $pr)
                                <option value="{{ $pr->id }}">{{ $pr->uuid }} | {{ $pr->status }}</option>
                            @endforeach
                         </select>
                         @error('pr_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Dibuat Oleh</label>
                        <select name="Departemen" wire:model="karyawan_id"
                        class="form-control" id="exampleFormControlInput2"> 
                            <option value="">-- Choose Karyawan --</option>
                            @foreach ($karyawans_p as $karyawan)
                                <option value="{{ $karyawan->id }}">{{ $karyawan->name }}</option>
                            @endforeach
                         </select>
                         @error('karyawan_id') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>