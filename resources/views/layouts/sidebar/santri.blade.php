<ul class="sidebar-links" id="simple-bar">
    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('assets') }}/images/logo/logo-icon.png"
                alt=""></a>
        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
    </li>
    <li class="sidebar-list"><a
            class="sidebar-link sidebar-title link-nav {{ Request::is('home') ? 'active-menu' : '' }}"
            href="{{ route('home') }}"><i data-feather="home"></i><span>Dashboard</span></a></li>
    <li class="sidebar-list"><a
            class="sidebar-link sidebar-title link-nav {{ Request::is('formulir') ? 'active-menu' : '' }}"
            href="{{ route('formulir.index') }}"><i data-feather="database"> </i><span>Lengkapi Formulir</span></a></li>
    <li class="sidebar-list active"><a
            class="sidebar-link sidebar-title link-nav {{ Request::is('formulir/cetak') ? 'active-menu' : '' }}"
            href="{{ route('formulir.cetak') }}"><i data-feather="download"> </i><span>Cetak Formulir</span></a></li>
    <li class="sidebar-list active"><a
            class="sidebar-link sidebar-title link-nav {{ Request::is('penerimaan') ? 'active-menu' : '' }}"
            href="{{ route('penerimaan.index') }}"><i data-feather="airplay"> </i><span>Penerimaan</span></a></li>
    <li class="sidebar-list active"><a
            class="sidebar-link sidebar-title link-nav {{ Request::is('informasi') ? 'active-menu' : '' }}"
            href="{{ route('informasi.index') }}"><i data-feather="bell"> </i><span>Informasi</span></a></li>
</ul>
