<ul class="sidebar-links" id="simple-bar">
    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('assets') }}/images/logo/logo-icon.png"
                alt=""></a>
        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
    </li>
    <li class="sidebar-main-title">
        <div>
            <p class="lan-2">Dashboard</p>
        </div>
    </li>
    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i
                data-feather="home"></i><span>Dashboard</span></a></li>
    <li class="sidebar-main-title">
        <div>
            <p class="lan-2">Master Data</p>
        </div>
    </li>
    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i
                data-feather="edit-3"></i><span>Data Pendaftar</span></a></li>
    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i
                data-feather="crop"></i><span>Data Seleksi</span></a></li>
    <li class="sidebar-main-title">
        <div>
            <p class="lan-2">Laporan</p>
        </div>
    </li>
    < <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i
                data-feather="compass"></i><span>Laporan Santri Baru</span></a></li>
        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i
                    data-feather="clipboard"></i><span>Laporan Seleksi</span></a></li>
</ul>
