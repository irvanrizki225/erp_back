

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Purchase Request</h3>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
            <div class="block-content block-content-full">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" wire:click="create()">
                    Add Purchase Request
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#item_barang" wire:click="pilih()">
                    Pilih Item Barang
                </button>
                @include('livewire.pr.pilih_item')
                {{-- @include('livewire.pr.karyawan') --}}
                @include('livewire.pr.update')
                @if ($isModalOpen)
                @include('livewire.pr.create')
                @endif
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">Kode PR</th>
                            <th class="px-4 py-2">Kode Job</th>
                            <th class="px-4 py-2">Nama Karyawan</th>
                            <th class="px-4 py-2">Suplayer</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Create At</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prs as $pr)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $pr->id }}</td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#list" 
                                wire:click="list({{ $pr->id }})" 
                                class="btn btn-primary">
                                    {{ $pr->uuid }}
                                </button>
                            </td>
                            <td class="border px-4 py-2">{{ $pr->job->uuid}}</td>
                            <td class="border px-4 py-2">{{ $pr->karyawan->name }}</td>
                            <td class="border px-4 py-2">{{ $pr->suplayer->name }}</td>
                            <td class="border px-4 py-2">{{ $pr->price}}</td>
                            <td class="border px-4 py-2">{{ $pr->date}}</td>
                            <td class="border px-4 py-2">{{ $pr->status}}</td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#updateModal" 
                                wire:click="edit({{ $pr->id }})" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button wire:click="delete({{ $pr->id }})" class="btn btn-danger">
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