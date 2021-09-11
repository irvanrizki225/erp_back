<div wire:ignore.self class="modal fade" id="karyawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
               <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Pilih Job</label>
                        <select name="Departemen" wire:model="job"
                        class="form-control" id="exampleFormControlInput2"> 
                            <option value="">-- Choose Job --</option>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->name }}</option>
                            @endforeach
                        </select>
                        @error('job') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">    
                        <label for="exampleFormControlInput2">Batas Waktu</label>
                        <input type="date" class="form-control" id="exampleFormControlInput2" 
                        wire:model="req_date" placeholder="Enter req_date">
                        @error('req_date') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlInput1" 
                        placeholder="Enter Deskripsi" wire:model="descrip"></textarea>
                        @error('descrip') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-gray-100 text-center">
                                <th class="px-4 py-2 w-20">No</th>
                                <th class="px-4 py-2">Nama Karyawan</th>
                                <th class="px-4 py-2">Jabatan</th>
                                <th class="px-4 py-2">Pilih</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($karyawans as $karyawan)
                                    <tr class="text-center">
                                        <td class="border px-4 py-2">{{ $karyawan->id }}</td>
                                        <td class="border px-4 py-2">{{ $karyawan->name }}</td>
                                        <td class="border px-4 py-2">{{ $karyawan->posisi }}</td>
                                        <td class="border px-4 py-2">
                                            <input class="form-checkbox h-6 w-6 text-green-500" 
                                            wire:model="id_karyawan.{{ $karyawan->id }}" 
                                            type="checkbox" value="{{ $karyawan->id }}" id="flexCheckDefault">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="karyawan()" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>