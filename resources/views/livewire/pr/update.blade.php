<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Purchase Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Job</label>
                    <select name="Departemen" wire:model="job_id"
                    class="form-control" id="exampleFormControlInput2"> 
                        <option value="">-- Choose Job --</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job->id }}">{{ $job->name }}</option>
                        @endforeach
                     </select>
                     @error('job_id') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Suplayer</label>
                    <select name="Departemen" wire:model="suplayer_id"
                    class="form-control" id="exampleFormControlInput2"> 
                        <option value="">-- Choose Suplayer --</option>
                        @foreach ($suplayers as $suplayer)
                            <option value="{{ $suplayer->id }}">{{ $suplayer->name }}</option>
                        @endforeach
                     </select>
                     @error('karyawan_id') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tangal Di Buat</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" 
                    placeholder="Enter date" wire:model="date">
                    @error('date') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Create By</label>
                    <select name="Departemen" wire:model="karyawan_id"
                    class="form-control" id="exampleFormControlInput2"> 
                        <option value="">-- Choose Karyawan --</option>
                        @foreach ($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->name }}</option>
                        @endforeach
                     </select>
                     @error('karyawan_id') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>