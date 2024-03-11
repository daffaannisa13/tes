<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">DASARATA</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#"></a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">MENU</li>
      <li class="nav-item">

        
        @php
        $dashboard = "dashboard";
        $d = "d";
        $userIndex = "user.index";
        $paketIndex = "pakets.index";
        $customerIndex = "customers.index";
        @endphp

        @if(auth()->user()->role == 'admin')
        <a href="{{route($dashboard)}}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item {{Request::is('admin/user') ? 'active' : ''}}">
        <a href="{{route($userIndex)}}"><i class="fa-solid fa-user"></i><span>Pengguna</span></a>
      </li>
      <li class="nav-item {{Request::is('admin/paket') ? 'active' : ''}}">
        <a href="{{route($paketIndex)}}"><i class="fa-solid fa-shopping-basket"></i><span>Paket</span></a>
      </li>
      <li class="nav-item {{Request::is('admin/customer') ? 'active' : ''}}">
        <a href="{{route($customerIndex)}}"><i class="fa-solid fa-user"></i><span>Customer</span></a>
      </li>
      @else
      </li>
      <li class="nav-item {{ Request::is('admin/customer') ? 'active' : '' }}">
          <a href="{{ route($customerIndex) }}"><i class="fa-solid fa-user"></i><span>Customer</span></a>
        </li>
      @endif
    </ul>
  </aside>
</div>
