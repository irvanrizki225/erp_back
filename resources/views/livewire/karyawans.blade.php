

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Karyawan</h3>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
            <div class="block-content block-content-full">
                {{-- <button wire:click.prevent="$toggle('create')"
                    class="my-4 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">
                    Create karyawan
                </button> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" wire:click="create()">
                    Add karyawan
                </button>
                {{-- <a href="javascript:void(0);" wire:click="create()" class="btn btn-success "></a> --}}
                @include('livewire.karyawan.update')
                @if ($isModalOpen)
                @include('livewire.karyawan.create')
                @endif
            </div>
            <div class="block-content block-content-full" style="overflow-x:auto;">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">Nama Karyawan</th>
                            <th class="px-4 py-2">No Telp / WA</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">Jabatan</th>
                            <th class="px-4 py-2">Departemen</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($karyawans as $karyawan)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $karyawan->id }}</td>
                            <td class="border px-4 py-2">{{ $karyawan->name }}</td>
                            <td class="border px-4 py-2">{{ $karyawan->no_telp }}</td>
                            <td class="border px-4 py-2">{{ $karyawan->alamat }}</td>
                            <td class="border px-4 py-2">{{ $karyawan->posisi }}</td>
                            <td class="border px-4 py-2">{{ $karyawan->departemen->name }}</td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#updateModal" 
                                wire:click="edit({{ $karyawan->id }})" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button wire:click="delete({{ $karyawan->id }})" class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
