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
    <x-page-header title="Petty Cash">
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
            Tambah
        </a>
        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
           data-bs-target="#modal-report" aria-label="Create new report">
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

                            {{--                            <div class="w-100 me-2">--}}
                            {{--                                <div class="form-label">Jabatan</div>--}}
                            {{--                                <select id="selectJabatan" class="form-select">--}}
                            {{--                                    <option value="">All</option>--}}
                            {{--                                    <option value="Staff">Staff</option>--}}
                            {{--                                    <option value="Supervisor">Supervisor</option>--}}
                            {{--                                </select>--}}
                            {{--                            </div>--}}


                        </div>
                        <div class="table-responsive p-2">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pettyCash as $pc)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pc->nama_barang }}</td>
                                        <td>{{ $pc->tanggal }}</td>
                                        <td>{{ $pc->jumlah }}</td>
                                        <td>{{ $pc->harga }}</td>
                                        <td>{{ $pc->deskripsi }}</td>
                                        <td>
                                            {{--<a href="{{ route('petty-cash.edit', $pc->id) }}" class="btn btn-primary">Edit</a>--}}
                                            <form action="{{ route('petty-cash.destroy', $pc->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $pc->id }}">Edit</a>

                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal modal-blur fade" id="modal-edit-{{ $pc->id }}" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('petty-cash.update', $pc->id) }}" method="post"
                                                      id="formData">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Petty Cash</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div id="dynamic-fields">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Nama Barang</label>
                                                                        <input name="nama_barang" class="form-control"
                                                                               value="{{ $pc->nama_barang }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Tanggal</label>
                                                                        <input type="date" class="form-control"
                                                                               name="tanggal"
                                                                               value="{{ $pc->tanggal }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Jumlah</label>
                                                                        <input type="number" class="form-control"
                                                                               name="jumlah" value="{{ $pc->jumlah }}"
                                                                               required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Harga</label>
                                                                        <input type="number" class="form-control"
                                                                               name="harga" value="{{ $pc->harga }}"
                                                                               required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Deskripsi</label>
                                                                        <textarea class="form-control"
                                                                                  name="deskripsi"
                                                                                  required>{{ $pc->deskripsi }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-secondary" id="add-row">
                                                            Tambah
                                                        </button>
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
                                                            Update
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
                <form action="{{ route('petty-cash.store') }}" method="post" id="formData">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Create Petty Cash</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="modal-body">
                            <div id="dynamic-fields">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Barang</label>
                                            <input name="nama_barang[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal[]" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number" class="form-control" name="jumlah[]" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Harga</label>
                                            <input type="number" class="form-control" name="harga[]" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi[]" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" id="add-row">Tambah</button>
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

    <script>
        $(document).ready(function () {
            $('#add-row').click(function () {
                let newRow = `
                <div>
                <hr class="mt-3 mb-3"/>
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                                                                       <input name="nama_barang[]" class="form-control">

            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal[]" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="jumlah[]" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga[]" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi[]" required></textarea>
            </div>
        </div>
    </div>
    </div>
`;
                $('#dynamic-fields').append(newRow);
            });
        });
    </script>

@endpush

