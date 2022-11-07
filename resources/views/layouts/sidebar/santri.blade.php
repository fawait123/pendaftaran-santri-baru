<ul class="sidebar-links" id="simple-bar">
    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('assets') }}/images/logo/logo-icon.png"
                alt=""></a>
        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
    </li>
    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i
                data-feather="home"></i><span>Dashboard</span></a></li>
    <li class="sidebar-list active"><a class="sidebar-link sidebar-title link-nav"
            href="{{ route('formulir.index') }}"><i data-feather="users"> </i><span>Lengkapi Formulir</span></a></li>
</ul>
