

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Purchase Order</h3>
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
                    Add Purchase Order
                </button>
                {{-- <a href="javascript:void(0);" wire:click="create()" class="btn btn-success "></a> --}}
                @include('livewire.po.update')
                @if ($isModalOpen)
                @include('livewire.po.create')
                @endif
            </div>
            <div class="block-content block-content-full table-responsive">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-sm table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th >No</th>
                            <th >Kode</th>
                            <th >Nama Barang</th>
                            <th >Tipe Barang</th>
                            <th >Quantity Barang</th>
                            <th >Create At</th>
                            <th >Status Barang</th>
                            <th >Set Status Barang</th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pos as $po)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $po->id }}</td>
                            <td class="border px-4 py-2">{{ $po->uuid}}</td>
                            <td class="border px-4 py-2">{{ $po->name}}</td>
                            <td class="border px-4 py-2">{{ $po->type}}</td>
                            <td class="border px-4 py-2">{{ $po->quantity}}</td>
                            <td class="border px-4 py-2">{{ $po->date}}</td>
                            <td class="border px-4 py-2" style="text-align: center;">
                                @if($po->status == 'PENDING')
                                <span class="badge badge-info">
                            @elseif($po->status == 'SUCCESS')
                                <span class="badge badge-success">
                            @elseif($po->status == 'FAILED')
                                <span class="badge badge-info">
                            @else
                                <span>
                            @endif
                                {{ $po->status }}
                                </span>
                            </td>
                            {{-- <td  style="text-align: center;">
                                @if ($po->status == 'PENDING')
                                    <a href="#" 
                                    class="btn btn-primary btm-sm">
                                        SUCCESS
                                    </a>
                                    <a href="#" 
                                    class="btn btn-danger btm-sm">
                                        FAILED
                                    </a>
                                @else
                                Sudah Di Verifikasi
                                @endif
                            </td> --}}
                            
                            <td class="border px-4 py-2" style="text-align: center;">
                                @if ($po->status == 'PENDING')
                                    <a href="#" wire:click="setStatus('SUCCESS', {{ $po->id }})"
                                    class="btn btn-primary btm-sm">
                                        SUCCESS
                                    </a>
                                    <a href="#" wire:click="setStatus('FAILED', {{ $po->id }})"
                                    class="btn btn-danger btm-sm">
                                        FAILED
                                    </a>
                                @elseif($po->status == 'SUCCESS')
                                    <span class="badge badge-success">SUCCESS</span>
                                @else
                                    <span class="badge badge-info">FAILED</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#updateModal" 
                                wire:click="edit({{ $po->id }})" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button wire:click="delete({{ $po->id }})" class="btn btn-danger">
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
{{-- @dd($karyawans_p, $prs) --}}