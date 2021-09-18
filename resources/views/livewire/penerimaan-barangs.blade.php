

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Penerimaan Barang</h3>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">
                {{ session('message') }}
                </div>
            @endif
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20 align-middle">No</th>
                            <th class="px-4 py-2 align-middle">Kode PO</th>
                            <th class="px-4 py-2 align-middle">PO</th>
                            <th class="px-4 py-2 align-middle">Req Date</th>
                            <th class="px-4 py-2 align-middle">Ariv Date</th>
                            <th class="px-4 py-2 align-middle">Status Barang</th>
                            <th class="px-4 py-2 align-middle">Set Status Barang</th>
                            <th class="px-4 py-2 align-middle">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($penerimaan_barangs as $penerimaan_barang)
                        <tr class="text-center">
                            <td class="border px-4 py-2 align-middle">{{ $penerimaan_barang->id }}</td>
                            <td class="border px-4 py-2 align-middle">
                                <button data-toggle="modal" data-target="#list" 
                                wire:click="list({{ $penerimaan_barang->po->id }})" 
                                class="btn btn-primary">
                                {{ $penerimaan_barang->po->uuid }}
                                </button>
                            </td>
                            <td class="border px-4 py-2 align-middle">
                                {{ $penerimaan_barang->karyawan->name }} / {{ $penerimaan_barang->suplayer->name }}
                            </td>
                            <td class="border px-4 py-2 align-middle">{{ $penerimaan_barang->req_date}}</td>
                            <td class="border px-4 py-2 align-middle">
                                <button data-toggle="modal" data-target="#updateModal" 
                                wire:click="edit({{ $penerimaan_barang->id }})" class="btn btn-primary">
                                    {{ $penerimaan_barang->arrival_date }}
                                </button>
                            </td>
                            <td class="border px-4 py-2" style="text-align: center;">
                                @if($penerimaan_barang->status == 'PENDING')
                                    <span class="badge badge-info">
                                @elseif($penerimaan_barang->status == 'SUCCESS')
                                    <span class="badge badge-success">
                                @elseif($penerimaan_barang->status == 'FAILED')
                                    <span class="badge badge-info">
                                @else
                                    <span>
                                @endif
                                    {{ $penerimaan_barang->status }}
                                    </span>
                            </td>
                            <td class="border px-4 py-2" style="text-align: center;">
                                @if ($penerimaan_barang->status == 'PENDING')
                                    <a href="#" wire:click="setStatus('SUCCESS', {{ $penerimaan_barang->id }})"
                                    class="btn btn-primary btm-sm">
                                        SUCCESS
                                    </a>
                                    <a href="#" wire:click="setStatus('FAILED', {{ $penerimaan_barang->id }})"
                                    class="btn btn-danger btm-sm">
                                        FAILED
                                    </a>
                                @elseif($penerimaan_barang->status == 'SUCCESS')
                                    <span class="badge badge-success">SUCCESS</span>
                                @else
                                    <span class="badge badge-info">FAILED</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2 align-middle">
                                @if ($penerimaan_barang->status == 'PENDING')
                                    <button wire:click="delete({{ $penerimaan_barang->id }})" class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                @elseif($penerimaan_barang->status == 'SUCCESS')
                                    Tidak Bisa Di Delete
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
