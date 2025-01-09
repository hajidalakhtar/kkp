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
    <x-page-header title="Export Stock Barang">

    </x-page-header>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header px-4 pt-4 d-flex">
                            <div class="w-100 me-2">
                                <div class="form-label">Start Date</div>
                                <input class="form-control " placeholder="Select a date" id="datepicker-start"
                                       value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="w-100 me-2">
                                <div class="form-label">End Date</div>
                                <input class="form-control " placeholder="Select a date" id="datepicker-end"
                                       value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>

                        </div>
                        <div class="p-2">
                            <button onclick="handleExport()" class="btn btn-success  w-full">EXPORT EXCEL</button>
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
    <script src="{{asset("dist/libs/litepicker/dist/litepicker.js")}}" defer></script>

    <script>
        $(document).ready(function () {

            window.Litepicker && (new Litepicker({
                element: document.getElementById('datepicker-start'),
                buttonText: {
                    previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                    nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                },
            }));

            window.Litepicker && (new Litepicker({
                element: document.getElementById('datepicker-end'),
                buttonText: {
                    previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                    nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                },
            }));

        });

        function handleExport() {
            let start = $('#datepicker-start').val();
            let end = $('#datepicker-end').val();

            location.href = "{{route("laporan.stock-barang.export")}}?start_at=" + start + "&end_at=" + end;
            href = "{{route("laporan.stock-barang.export")}}"
        }
    </script>

@endpush

