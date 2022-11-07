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
    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                data-feather="edit"></i><span>Editors</span></a>
        <ul class="sidebar-submenu">
            <li><a href="summernote.html">Summer Note</a></li>
            <li><a href="ckeditor.html">CK editor</a></li>
            <li><a href="simple-MDE.html">MDE editor</a></li>
            <li><a href="ace-code-editor.html">ACE code editor </a></li>
        </ul>
    </li>
    <li class="sidebar-main-title">
        <div>
            <p class="lan-2">Laporan</p>
        </div>
    </li>
    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="support-ticket.html"><i
                data-feather="users"> </i><span>Support
                Ticket</span></a></li>
</ul>
