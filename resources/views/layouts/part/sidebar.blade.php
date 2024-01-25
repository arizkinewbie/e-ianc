<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('data/image/about/logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">e-iANC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('data/image/user/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Layanan Utama</li>
                <li class="nav-item">
                    <a href="{{ route('patient') }}" class="nav-link">
                        <i class="nav-icon fas fa-procedures"></i>
                        <p>
                            KIA
                        </p>
                    </a>
                </li>
                <li class="nav-header">Layanan Penunjang</li>
                @if (auth()->user()->role == '0' || auth()->user()->role == '2' || auth()->user()->role == '2')
                    <li class="nav-item">
                        <a href="{{ route('datasasaran') }}" class="nav-link">
                            <i class="nav-icon fas fa-bullseye"></i>
                            <p>
                                Data Sasaran
                            </p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == '0' || auth()->user()->role == '4')
                <li class="nav-item">
                    <a href="{{ route('icebox') }}" class="nav-link">
                        <i class="nav-icon fas fa-icicles"></i>
                        <p>
                            Kulkas
                        </p>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role == '0' || auth()->user()->role == '4')
                <li class="nav-item">
                    <a href="{{ route('vaksin') }}" class="nav-link">
                        <i class="nav-icon fas fa-prescription-bottle-alt"></i>
                        <p>
                            Vaksin
                        </p>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role == '0' || auth()->user()->role == '4')
                <li class="nav-item">
                    <a href="{{ route('kb') }}" class="nav-link">
                        <i class="nav-icon fas fa-restroom"></i>
                        <p>
                            Alat Konstrasepsi
                        </p>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role == '0' || auth()->user()->role == '4')
                <li class="nav-item">
                    <a href="{{ route('drug') }}" class="nav-link">
                        <i class="nav-icon fas fa-prescription"></i>
                        <p>
                            Obat-obatan
                        </p>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role == '0' || auth()->user()->role == '2' || auth()->user()->role == '3')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-dead"></i>
                        <p>
                            Kematian
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('maternal') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Maternal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('baby') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Bayi dan Balita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pn') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Perinatal/Neonatal</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('report.kb') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Keluarga Berencana</p>
                            </a>
                        </li>
                        @if (auth()->user()->role == '0' || auth()->user()->role == '4')
                            <li class="nav-item">
                                <a href="{{ route('report.imunisasi') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-success"></i>
                                    <p>Imunisasi</p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->role == '0' || auth()->user()->role == '3' || auth()->user()->role == '4')
                        @if (auth()->user()->role == '0' || auth()->user()->role == '3')
                            <li class="nav-item">
                                <a href="{{ route('report.lb3') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-success"></i>
                                    <p>LB3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('report.pws') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-success"></i>
                                    <p>PWS</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('report.kohort') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Kohort ANC</p>
                            </a>
                        </li>
                        @endif

                        @if (auth()->user()->role == '0' || auth()->user()->role == '4')
                            <li class="nav-item">
                                <a href="{{ route('report.cekrujuk') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-success"></i>
                                    <p>Rujukkan</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-header">Master Data</li>
                @if (auth()->user()->role == '0' || auth()->user()->role == '1')
                    <li class="nav-item">
                        <a href="{{ route('instansi') }}" class="nav-link">
                            <i class="nav-icon fas fa-clinic-medical"></i>
                            <p>
                                Instansi
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == '0' || auth()->user()->role == '1')
                    <li class="nav-item">
                        <a href="{{ route('nakes') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-md"></i>
                            <p>
                                Tenaga Kesehatan
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == '0' || auth()->user()->role == '1')
                    <li class="nav-item">
                        <a href="{{ route('temoi') }}" class="nav-link">
                            <i class="nav-icon fas fa-street-view"></i>
                            <p>
                                TeMOI
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Selection
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        @if (auth()->user()->role == '0' || auth()->user()->role == '1')
                            <li class="nav-item">
                                <a href="{{ route('sel.icd') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon text-success"></i>
                                    <p>ICD</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('sel.sig') }}" class="nav-link">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Signature</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (auth()->user()->role == '0' || auth()->user()->role == '1')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                User Management
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (auth()->user()->role == '0')
                                <li class="nav-item">
                                    <a href="{{ route('userrole') }}" class="nav-link">
                                        <i class="fas fa-user-tag nav-icon"></i>
                                        <p>Role</p>
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a href="{{ route('user') }}" class="nav-link">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
