

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Job</h3>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
            <div class="block-content block-content-full">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" wire:click="create()">
                    Add Job
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#karyawan" wire:click="pilih()">
                    Pilih Karyawan
                </button>
                @include('livewire.job.pilih_karyawan')
                @include('livewire.job.karyawan')
                @include('livewire.job.update')
                @if ($isModalOpen)
                @include('livewire.job.create')
                @endif
            </div>
            <div class="block-content block-content-full" style="overflow-x:auto;">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Kode</th>
                            <th class="px-4 py-2">Kontraktor</th>
                            <th class="px-4 py-2">Profit</th>
                            <th class="px-4 py-2">Harga</th>
                            <th class="px-4 py-2">Daftar Karyawan</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $job->id }}</td>
                            <td class="border px-4 py-2">{{ $job->name}}</td>
                            <td class="border px-4 py-2">{{ $job->uuid}}</td>
                            <td class="border px-4 py-2">{{ $job->company}}</td>
                            <td class="border px-4 py-2">{{ $job->profit}}</td>
                            <td class="border px-4 py-2">{{ $job->price}}</td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#list" 
                                wire:click="list({{ $job->id }})" 
                                class="btn btn-primary">
                                    {{ $job->uuid }}
                                </button>
                            </td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#updateModal" 
                                wire:click="edit({{ $job->id }})" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button wire:click="delete({{ $job->id }})" class="btn btn-danger">
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