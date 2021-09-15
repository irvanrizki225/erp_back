<div wire:ignore.self class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:80%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Kode PR</label>
                    <select name="Departemen" wire:model="pr_id"
                    class="form-control" id="exampleFormControlInput2" readonly> 
                        <option value="">-- Choose PR --</option>
                        @foreach ($prs as $pr)
                            <option value="{{ $pr->id }}">{{ $pr->uuid }} | {{ $pr->job->name }}</option>
                        @endforeach
                    </select>
                    @error('pr_id') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>
                <label for="exampleFormControlInput2">List Barang</label>
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">Pilih</th>
                            <th class="px-4 py-2">Nama Barang</th>
                            <th class="px-4 py-2">Unit</th>
                            <th class="px-4 py-2">Harga</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">
                                        <input class="form-checkbox h-6 w-6 text-green-500" 
                                        wire:model="item_id" 
                                        type="checkbox" value="{{ $item->id }}" id="flexCheckDefault">
                                    </td>
                                    <td class="border px-4 py-2">{{ $item->name }}</td>
                                    <td class="border px-4 py-2">{{ $item->unit }}</td>
                                    <td class="border px-4 py-2">{{ $item->price }}</td>
                                    <td class="border px-4 py-2">
                                        <input type="number" class="form-control" 
                                        id="exampleFormControlInput2"
                                        wire:model="quantity" placeholder="Enter Quantity">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                @error('item_id') <span class="text-danger error">{{ $message }}</span>@enderror
                @error('quantity') <span class="text-danger error">{{ $message }}</span>@enderror
           </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>