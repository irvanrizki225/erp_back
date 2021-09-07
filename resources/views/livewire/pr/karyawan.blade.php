<div wire:ignore.self class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Karyawan Pertask</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
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
                        {{-- @foreach($karyawans as $karyawan)
                            <tr class="text-center">
                                <td class="border px-4 py-2">{{ $karyawan->id }}</td>
                                <td class="border px-4 py-2">{{ $karyawan->name }}</td>
                                <td class="border px-4 py-2">{{ $karyawan->posisi }}</td>
                                <td class="border px-4 py-2">
                                    <input class="form-checkbox h-6 w-6 text-green-500" wire:model="id_karyawan.{{ $karyawan->id }}" 
                                    type="checkbox" value="{{ $karyawan->id }}" id="flexCheckDefault">
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>