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
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
           data-bs-target="#modal-report">
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
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Projek Membangun IKN</td>
                                    <td>20 Febuary 2024</td>
                                    <td>21 Desember 2024</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary " style="margin-bottom: 4px">Download SPK Owner</a><br/>
                                        <a class="btn btn-sm btn-primary " style="margin-bottom: 4px">Download Invoice Tagihan</a><br/>
                                        <a class="btn btn-sm btn-primary " style="margin-bottom: 4px">Download Document Progress</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Projek Pembangunan Jembatan</td>
                                    <td>1 Maret 2024</td>
                                    <td>31 Oktober 2024</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download SPK Owner</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Invoice Tagihan</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Document Progress</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Projek Renovasi Gedung</td>
                                    <td>15 Maret 2024</td>
                                    <td>30 September 2024</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download SPK Owner</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Invoice Tagihan</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Document Progress</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Projek Perluasan Bandara</td>
                                    <td>10 April 2024</td>
                                    <td>15 November 2024</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download SPK Owner</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Invoice Tagihan</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Document Progress</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Projek Pengembangan Jalan Tol</td>
                                    <td>25 Mei 2024</td>
                                    <td>31 Desember 2024</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download SPK Owner</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Invoice Tagihan</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Document Progress</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Projek Restorasi Kawasan Wisata</td>
                                    <td>15 Juni 2024</td>
                                    <td>15 Desember 2024</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download SPK Owner</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Invoice Tagihan</a><br/>
                                        <a class="btn btn-sm btn-primary" style="margin-bottom: 4px">Download Document Progress</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

