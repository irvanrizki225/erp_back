

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Item List</h3>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">Kode PR</th>
                            <th class="px-4 py-2">Kode Po</th>
                            <th class="px-4 py-2">Kode Barang</th>    
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($item_lists as $item_list)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $item_list->id }}</td>
                            <td class="border px-4 py-2">{{ $item_list->pr->uuid}}</td>
                            <td class="border px-4 py-2">{{ $item_list->po->uuid}}</td>
                            <td class="border px-4 py-2">{{ $item_list->item->uuid}}</td>
                            <td class="border px-4 py-2">{{ $item_list->quantity}}</td>
                            <td class="border px-4 py-2">IDR {{ $item_list->price}}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="delete({{ $item_list->id }})" class="btn btn-danger">
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
