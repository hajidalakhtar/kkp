@extends('layouts.app')

@push("styles")
    <link href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />

    <style>

        /* doesn't work */
        /*.dt-paging-button.current {*/
        /*    color: #ffffff !important;*/
        /*    background-color: white !important;*/
        /*    border-color: red !important;*/
        /*    padding: 0 !important;*/
        /*}*/

        .dt-paging-button:hover {
            /*padding: 10px !important;*/
            /*background-color: #063970 !important;*/


        }

        .dt-search {
            display: none;
        }

        .dt-length {
            display: none;

        }


        /* From the comments below - doesn't work */
        .paginate_button.active > .page_link {
            background-color: #063970;
        }
    </style>

@endpush

@section('content')
    <x-page-header title="Proyek">
        <a href="{{route("laporan.project.export")}}?start_at={{\Carbon\Carbon::now()->format("d-m-Y")}}&end_at={{\Carbon\Carbon::now()->addMonth(1)->format("d-m-Y")}}"
           class="btn btn-success d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            Export
        </a>
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
           data-bs-target="#modal-create">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 5l0 14"/>
                <path d="M5 12l14 0"/>
            </svg>
            Tambah Proyek
        </a>
        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
           data-bs-target="#modal-create" aria-label="Create new report">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 5l0 14"/>
                <path d="M5 12l14 0"/>
            </svg>
        </a>
    </x-page-header>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header px-4 pt-4 d-flex">
                            <div class="w-100 me-2">
                                <div class="form-label">Search</div>
                                <input class="form-control" id="searchInput"/>
                            </div>
                        </div>
                        <div class="table-responsive p-2">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Selesai</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->nama }}</td>
                                        <td>{{ $project->tanggal_mulai }}</td>
                                        <td>{{ $project->tanggal_selesai }}</td>
                                        <td>

                                            <div class="text-center">
                                                <a href="{{ asset('documents/' . $project->document_spk_owner) }}"
                                                   data-fancybox="gallery" class="btn btn-primary btn-sm m-1">Download
                                                    SPK Owner</a> <br/>
                                                <a href="{{ asset('documents/' . $project->document_invoice_tagihan) }}"
                                                   data-fancybox="gallery" class="btn btn-primary btn-sm m-1">Download
                                                    Invoice Tagihan</a><br/>
                                                <a href="{{ asset('documents/' . $project->document_laporan_progress) }}"
                                                   data-fancybox="gallery" class="btn btn-primary btn-sm m-1">Download
                                                    Laporan Progress</a>
                                            </div>

                                        </td>

                                        <td>
                                            <button
                                                class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-{{$project->id}}">Edit
                                            </button>
                                            <form action="{{ route('project.destroy', $project->id) }}" method="post"
                                                  style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ">Delete</button>
                                            </form>
                                        </td>

                                    </tr>


                                    <div class="modal modal-blur fade" id="modal-edit-{{$project->id}}" tabindex="-1"
                                         role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('project.update', $project->id) }}" method="post"
                                                      enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Project</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama</label>
                                                                    <input type="text" class="form-control" name="nama"
                                                                           value="{{ $project->nama }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Deskripsi</label>
                                                                    <textarea class="form-control" name="deskripsi"
                                                                              required>{{ $project->deskripsi }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tanggal Mulai</label>
                                                                    <input type="date" class="form-control"
                                                                           name="tanggal_mulai"
                                                                           value="{{ $project->tanggal_mulai }}"
                                                                           required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tanggal Selesai</label>
                                                                    <input type="date" class="form-control"
                                                                           name="tanggal_selesai"
                                                                           value="{{ $project->tanggal_selesai }}"
                                                                           required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Document SPK Owner</label>
                                                                    <input type="file" class="form-control"
                                                                           name="document_spk_owner">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Document Invoice
                                                                        Tagihan</label>
                                                                    <input type="file" class="form-control"
                                                                           name="document_invoice_tagihan">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Document Laporan
                                                                        Progress</label>
                                                                    <input type="file" class="form-control"
                                                                           name="document_laporan_progress">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" class="btn btn-link link-secondary"
                                                           data-bs-dismiss="modal">
                                                            Cancel
                                                        </a>
                                                        <button type="submit" class="btn btn-primary ms-auto">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                 width="24" height="24"
                                                                 viewBox="0 0 24 24"
                                                                 stroke-width="2" stroke="currentColor" fill="none"
                                                                 stroke-linecap="round"
                                                                 stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M12 5l0 14"/>
                                                                <path d="M5 12l14 0"/>
                                                            </svg>
                                                            Edit
                                                        </button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal modal-blur fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Document SPK Owner</label>
                                    <input type="file" class="form-control" name="document_spk_owner">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Document Invoice Tagihan</label>
                                    <input type="file" class="form-control" name="document_invoice_tagihan">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Document Laporan Progress</label>
                                    <input type="file" class="form-control" name="document_laporan_progress">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24"
                                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 5l0 14"/>
                                <path d="M5 12l14 0"/>
                            </svg>
                            Create
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection


@push("scripts")
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            let table = $('#example').DataTable({
                "responsive": true,
                "autoWidth": true,
                "tfoot": false,
                // "processing": true,
                // "serverSide": true,
                searchDelay: 350,
                {{--ajax: '{{ route('event.history', $event->id) }}',--}}
                lengthMenu: [
                    [10, 25, 50, 100, 200, 300, -1],
                    ['10 rows', '25 rows', '50 rows', '100 rows', '200 rows', '300 rows', 'Show all']
                ],
            });

            // $('#searchInput').on('change', function () {
            //     table
            //         .column(1)
            //         .search(this.value).draw();
            // });

            $('#selectJabatan').on('change', function () {
                table
                    .column(5)
                    .search(this.value).draw();
            });

            {{--    $('#selectStatusKehadiran').on('change', function () {--}}

            {{--        table--}}
            {{--            .column(4)--}}
            {{--            .search(this.value, true, false)--}}
            {{--            .draw();--}}
            {{--    });--}}

            $("#searchInput").on("keyup", function () {
                table.search(this.value).draw();
            });

        });

        {{--function handleExport() {--}}
        {{--    let selectFraksi = $('#selectFraksi').val();--}}
        {{--    let selectInstansi = $('#selectInstansi').val();--}}
        {{--    let selectStatusKehadiran = $('#selectStatusKehadiran').val();--}}

        {{--    location.href = "{{route("attendance.export", $event->id)}}?fraksi=" + selectFraksi + "&instansi=" + selectInstansi + "&status_kehadiran=" + selectStatusKehadiran;--}}
        {{--    --}}{{--href="{{route("attendance.export", $event->id)}}"--}}
        {{--}--}}
    </script>

@endpush

