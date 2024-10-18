<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i> </a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> --}}
        @include('frontend.partials.sidebar')
        <div class="sidebar-brand">
        </div>

        </aside>
        <main class="app-main">
            <div class="app-content-header">
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
    </div>
    </main>
    </div>

</body>
