<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Pekerjaan Karyawan</label>
                        <select name="Departemen" wire:model="jobs"
                        class="form-control" id="exampleFormControlInput2"> 
                            <option value="">-- Choose jobs --</option>
                            @foreach($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->name }}</option>
                            @endforeach
                         </select>
                         @error('jobs') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Nama Karyawan</label>
                        <select name="Departemen" wire:model="jobs"
                        class="form-control" id="exampleFormControlInput2"> 
                            <option value="">-- Choose jobs --</option>
                            @foreach($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->name }}</option>
                            @endforeach
                         </select>
                         @error('jobs') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" 
                        placeholder="Enter Name" wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">No Telp / WA</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" 
                        wire:model="no_telp" placeholder="Enter No Telp / WA">
                        @error('no_telp') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Alamat</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" 
                        wire:model="alamat" placeholder="Enter Alamat">
                        @error('alamat') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Role User</label>
                        <select name="role" wire:model="role"
                        class="form-control" id="exampleFormControlInput2">
                                <option value="">-- Choose Role User --</option>
                                <option value="HRD">HRD</option>
                                <option value="PM">PM</option>
                                <option value="Leader">Leader</option>
                                <option value="Staff">Staff</option>
                         </select>
                         @error('role') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput2" 
                        wire:model="email" placeholder="Enter Email">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Password</label>
                        <input type="pasword" class="form-control" id="exampleFormControlInput2" 
                        wire:model="password">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Pasword Konfirmasi</label>
                        <input type="pasword" class="form-control" id="exampleFormControlInput2" 
                        wire:model="password_confirmation">
                        @error('password_confirmation') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>