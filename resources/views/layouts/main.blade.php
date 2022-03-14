<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard</title>
{{--    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>--}}
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html"> <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i> Dashboard</div></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </div>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
                <span class="mr-2 d-done d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
                {{--<i class="fas fa-user fa-fw"></i>--}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
{{--                    {{ request()->is('*countries*') ? 'collapsed' : '' }}--}}
{{--                    @if(request()->segment(1)==='countries')  @endif--}}
                    <div class="sb-sidenav-menu-heading">Employee Management</div>
                    <a class="nav-link {{ request()->routeIs('countries.*','states.*','departments.*','cities.*') ? 'collapsed' : '' }}"  href="#" data-bs-toggle="collapse" data-bs-target="#collapseSystem"
                       aria-expanded="false" aria-controls="collapseSystem">
                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                        System Management
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse {{ request()->routeIs('countries.*','states.*','departments.*','cities.*') ? 'show' : '' }}"   id="collapseSystem" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ request()->routeIs('countries.*') ? 'bg-light text-dark' : '' }}" href="{{route('countries.index')}}">Country</a>
                            <a class="nav-link {{ request()->routeIs('states.*') ? 'bg-light text-dark' : '' }}" href="{{route('states.index')}}">State</a>
                            <a class="nav-link {{ request()->routeIs('departments.*') ? 'bg-light text-dark' : '' }}" href="{{route('departments.index')}}">Department</a>
                            <a class="nav-link {{ request()->routeIs('cities.*') ? 'bg-light text-dark' : '' }}" href="{{route('cities.index')}}">City</a>
                        </nav>
                    </div>

                    <a class="nav-link {{ request()->routeIs('users.*') ? 'collapsed' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser"
                       aria-expanded="false" aria-controls="collapseUser">
                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                        User Management
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ request()->routeIs('users.*') ? 'show' : '' }}" id="collapseUser" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ request()->routeIs('users.*') ? 'bg-light text-dark' : '' }}" href="{{route('users.index')}}">User</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Role</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Permission</a>
                        </nav>
                    </div>


                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->username }}
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                    @yield('content')
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
</body>
</html>
