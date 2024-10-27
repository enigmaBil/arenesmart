<div class="sl-logo">
    <a href="{{route('dashboard')}}">
        <img style="width: 90%" src="{{asset('frontend/img/logo-blanc.png')}}" alt="logo">
    </a>
</div>
<div class="sl-sideleft">
    {{--    <div class="input-group input-group-search">--}}
    {{--        <input type="search" name="search" class="form-control" placeholder="Search">--}}
    {{--        <span class="input-group-btn">--}}
    {{--          <button class="btn"><i class="fa fa-search"></i></button>--}}
    {{--        </span><!-- input-group-btn -->--}}
    {{--    </div><!-- input-group -->--}}

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
        <a href="{{route('dashboard')}}" class="sl-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link {{ (request()->routeIs('stadium.list')||request()->routeIs('equipment.list')) ? 'active' : '' }}">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-soccer-ball-o tx-20"></i>
                <span class="menu-item-label">Stades</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('equipment.list')}}" class="nav-link {{ request()->routeIs('equipment.list') ? 'active' : '' }}">Equipements</a></li>
            <li class="nav-item"><a href="{{route('stadium.list')}}" class="nav-link {{ request()->routeIs('stadium.list') ? 'active' : '' }}">Stades</a></li>
        </ul>
        <a href="" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-bookmark tx-20"></i>
                <span class="menu-item-label">Reservations</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-dollar tx-20"></i>
                <span class="menu-item-label">Paiements</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-person tx-20"></i>
                <span class="menu-item-label">Gestion Utilisateurs</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="" class="nav-link">Utilisateurs</a></li>
            <li class="nav-item"><a href="" class="nav-link">Role et Permissioins</a></li>
        </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
</div>
