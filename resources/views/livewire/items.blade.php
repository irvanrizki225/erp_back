

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Daftar Barang</h3>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
            <div class="block-content block-content-full">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" wire:click="create()">
                    Add Daftar Barang
                </button>
                @include('livewire.item.update')
                @if ($isModalOpen)
                @include('livewire.item.create')
                @endif
            </div>
            <div class="block-content block-content-full" style="overflow-x:auto;">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">Kode</th>
                            <th class="px-4 py-2">Nama Barang</th>
                            <th class="px-4 py-2">Tipe Barang</th>
                            <th class="px-4 py-2">Unit</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $item->id }}</td>
                            <td class="border px-4 py-2">{{ $item->uuid}}</td>
                            <td class="border px-4 py-2">{{ $item->name}}</td>
                            <td class="border px-4 py-2">{{ $item->type}}</td>
                            <td class="border px-4 py-2">{{ $item->unit}}</td>
                            <td class="border px-4 py-2">{{ $item->price}}</td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#updateModal" 
                                wire:click="edit({{ $item->id }})" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button wire:click="delete({{ $item->id }})" class="btn btn-danger">
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