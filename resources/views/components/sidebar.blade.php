<aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" navbar-brand navbar-brand-autodark " style="justify-content: start; padding-left: 16px">
            <div class="d-flex gap-2 align-items-center ">
                <img src="{{asset("logo.png")}}" alt="Tabler"
                     style="width: auto; height: 2.8rem">
                <div>
                    <span class="text-uppercase " style="font-size: 14px"> DELTA KARYA </span>
                    <br/>
                    <span class="text-uppercase" style="font-size: 14px"> KONSTRUKSI</span>
                </div>

            </div>
        </div>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item d-none d-lg-flex me-3">
                <div class="btn-list">
                    <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path
                                d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"/>
                        </svg>
                        Source code
                    </a>
                    <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
                        </svg>
                        Sponsor
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">

                @if(auth()->user()->role == "ADMIN_PROJECT" || auth()->user()->role == "MANAGER_PROJECT" || auth()->user()->role == "SUPER_ADMIN")
                <li class="nav-item">
                    <a class="nav-link" href="{{route("karyawan.index")}}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                       class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none"
                                                                                             d="M0 0h24v24H0z"
                                                                                             fill="none"/><path
                          d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/><path
                          d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/><path
                          d="M21 21v-2a4 4 0 0 0 -3 -3.85"/></svg>
                  </span>
                        <span class="nav-link-title">
                    Karyawan
                  </span>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route("project.index")}}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-forklift"><path stroke="none"
                                                                                                 d="M0 0h24v24H0z"
                                                                                                 fill="none"/><path
                           d="M5 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/><path
                           d="M14 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/><path d="M7 17l5 0"/><path d="M3 17v-6h13v6"/><path
                           d="M5 11v-4h4"/><path d="M9 11v-6h4l3 6"/><path d="M22 15h-3v-10"/><path
                           d="M16 13l3 0"/></svg>
                  </span>
                        <span class="nav-link-title">
                    Proyek
                  </span>
                    </a>
                </li>
                @if(auth()->user()->role == "ADMIN_PROJECT" || auth()->user()->role == "MANAGER_PROJECT" || auth()->user()->role == "SUPER_ADMIN")

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                       data-bs-auto-close="false" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                            d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"/><path d="M12 12l8 -4.5"/><path
                            d="M12 12l0 9"/><path d="M12 12l-8 -4.5"/><path d="M16 5.25l-8 4.5"/></svg>
                  </span>
                        <span class="nav-link-title">
                    Barang
                  </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{route("permintaan-barang.index")}}">
                                    Permintaan Barang
                                </a>
                                <a class="dropdown-item" href="{{route("stock.index")}}">
                                    Stock
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                @endif

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                       data-bs-auto-close="false" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-report"><path stroke="none"
                                                                                            d="M0 0h24v24H0z"
                                                                                            fill="none"/><path
                        d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"/><path d="M18 14v4h4"/><path
                        d="M18 11v-4a2 2 0 0 0 -2 -2h-2"/><path
                        d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"/><path
                        d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/><path d="M8 11h4"/><path d="M8 15h3"/></svg>
                  </span>
                        <span class="nav-link-title">
                    Report
                  </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{route("laporan.pembelian-barang")}}">
                                    Laporan Permintaan Barang
                                </a>
                                <a class="dropdown-item" href="{{route("laporan.stock-barang")}}">
                                    Laporan Stock barang
                                </a>

                                <a class="dropdown-item" href="{{route("laporan.refund-retur")}}">
                                    Laporan Project
                                </a>
                            </div>
                        </div>
                    </div>
                </li>


                @if(Auth::check())
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none"
                                                                                                       d="M0 0h24v24H0z"
                                                                                                       fill="none"/><path
                                   d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"/><path
                                   d="M9 12h12l-3 -3"/><path d="M18 15l3 -3"/></svg>
                        </span>
                            <span class="nav-link-title">
                            Logout
                        </span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</aside>

