

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Suplayer</h3>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
            <div class="block-content block-content-full">
                {{-- <button wire:click.prevent="$toggle('create')"
                    class="my-4 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">
                    Create Barang
                </button> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" wire:click="create()">
                    Add Suplayer
                </button>
                {{-- <a href="javascript:void(0);" wire:click="create()" class="btn btn-success "></a> --}}
                @include('livewire.suplayer.update')
                @if ($isModalOpen)
                @include('livewire.suplayer.create')
                @endif
            </div>
            <div class="block-content block-content-full" style="overflow-x:auto;">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">Kode</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">No Telp / WA</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suplayers as $suplayer)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $suplayer->id }}</td>
                            <td class="border px-4 py-2">{{ $suplayer->kode}}</td>
                            <td class="border px-4 py-2">{{ $suplayer->name}}</td>
                            <td class="border px-4 py-2">{{ $suplayer->alamat}}</td>
                            <td class="border px-4 py-2">{{ $suplayer->no_telp}}</td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#updateModal" 
                                wire:click="edit({{ $suplayer->id }})" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button wire:click="delete({{ $suplayer->id }})" class="btn btn-danger">
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
