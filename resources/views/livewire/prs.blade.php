

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
                @include('livewire.pr.item')
                @include('livewire.pr.update')
                @if ($isModalOpen)
                @include('livewire.pr.create')
                @endif
            </div>
            <div class="block-content block-content-full" style="overflow-x:auto;">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">Kode PR</th>
                            <th class="px-4 py-2">Kode Job</th>
                            <th class="px-4 py-2">PR</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Create At</th>
                            <th class="px-4 py-2">Status PR</th>
                            <th class="px-4 py-2">Set Status PR</th>
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
                                <td class="border px-4 py-2">
                                    {{ $pr->karyawan->name }} /
                                    {{ $pr->suplayer->name }} 
                                </td>
                                <td class="border px-4 py-2">IDR {{ $pr->price}}</td>
                                <td class="border px-4 py-2">{{ $pr->date}}</td>
                                <td class="border px-4 py-2" style="text-align: center;">
                                    @if($pr->status == 'PENDING')
                                    <span class="badge badge-info">
                                @elseif($pr->status == 'SUCCESS')
                                    <span class="badge badge-success">
                                @elseif($pr->status == 'FAILED')
                                    <span class="badge badge-info">
                                @else
                                    <span>
                                @endif
                                    {{ $pr->status }}
                                    </span>
                                </td>

                                <td class="border px-4 py-2" style="text-align: center;">
                                    @if ($pr->status == 'PENDING')
                                        <a href="#" wire:click="setStatus('SUCCESS', {{ $pr->id }})"
                                        class="btn btn-primary btm-sm">
                                            SUCCESS
                                        </a>
                                        <a href="#" wire:click="setStatus('FAILED', {{ $pr->id }})"
                                        class="btn btn-danger btm-sm">
                                            FAILED
                                        </a>
                                    @elseif($pr->status == 'SUCCESS')
                                        <span class="badge badge-success">SUCCESS</span>
                                    @else
                                        <span class="badge badge-info">FAILED</span>
                                    @endif
                                </td>

                                <td class="border px-4 py-2">
                                    @if ($pr->status == 'PENDING')
                                        <button data-toggle="modal" data-target="#updateModal" 
                                        wire:click="edit({{ $pr->id }})" class="btn btn-primary">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button wire:click="delete({{ $pr->id }})" class="btn btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @else
                                        Tidak Bisa Di Delete
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    {{-- @dd($prs) --}}