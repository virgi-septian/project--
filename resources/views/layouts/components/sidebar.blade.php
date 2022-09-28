<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
       
    <span class="app-brand-logo demo">
       <img src="{{ asset('img/logo-besar.png') }}" width="100px" height="190px" alt="">
    </span>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
    <!-- Dashboard -->
    
    <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="{{url('/dashboard')}}" class="menu-link ">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    
    @auth
    <!-- Layouts -->
    <li class="menu-item {{ Request::is('bgh*','bg_umum*','bg_negara*','hsbgn*') ? 'active' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout "></i>
        <div data-i18n="Layouts">PKL</div>
        </a>

        <ul class="menu-sub">
        <li class="menu-item {{ Request::is('bgh*') ? 'active' : '' }}">
            <a href="{{ route('bgh.index') }}" class="menu-link ">
            <div data-i18n="Without menu">BGH</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('bg_umum*') ? 'active' : '' }}">
            <a href="{{ route('bg_umum.index') }}" class="menu-link ">
            <div data-i18n="Without menu">BG Umum</div>
            </a>
        </li>
        
        <li class="menu-item {{ Request::is('bg_negara*') ? 'active' : '' }}">
            <a href="{{ route('bg_negara.index') }}" class="menu-link">
            <div data-i18n="Container">BG Negara</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('hsbgn*') ? 'active' : '' }}">
            <a href="{{ route('hsbgn.index') }}" class="menu-link">
            <div data-i18n="Container">HSBGN</div>
            </a>
        </li>
        </ul>
    </li>
    @else
        
    @endauth

    @role('user')
    
    @endrole

    {{-- <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
    </li> --}}
    <!-- Forms & Tables -->
    {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li> --}}
    <!-- Forms -->
    <!-- Tables -->
    {{-- <li class="menu-item">
        <a href="ecommerce.produk.index" class="menu-link">
        <i class="menu-icon tf-icons bx bx-table"></i>
        <div data-i18n="Tables">Tables</div>
        </a>
    </li> --}}
    
</ul>
</aside>
<!-- / Menu -->