

    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Table Job List Karyawan</h3>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                {{ session('message') }}
                </div>
            @endif
            <div class="block-content block-content-full">
                @include('livewire.job_list.update')
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr class="bg-gray-100 text-center">
                            <th class="px-4 py-2 w-20">No</th>
                            <th class="px-4 py-2">Kode Job</th>
                            <th class="px-4 py-2">Nama Karyawan</th>    
                            <th class="px-4 py-2">Tanggal Jadi</th>
                            <th class="px-4 py-2">Tanggal Mulai</th>
                            <th class="px-4 py-2">Tanggal Selesai</th>
                            <th class="px-4 py-2">Deskripsi</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($job_lists as $job_list)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $job_list->id }}</td>
                            <td class="border px-4 py-2">{{ $job_list->job->uuid}}</td>
                            <td class="border px-4 py-2">{{ $job_list->karyawan->name}}</td>
                            <td class="border px-4 py-2">{{ $job_list->req_date}}</td>
                            <td class="border px-4 py-2">{{ $job_list->start}}</td>
                            <td class="border px-4 py-2">{{ $job_list->finished}}</td>
                            <td class="border px-4 py-2">{{ $job_list->description}}</td>
                            <td class="border px-4 py-2">
                                <button data-toggle="modal" data-target="#updateModal" 
                                wire:click="edit({{ $job_list->id }})" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
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
