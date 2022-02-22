<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto d-flex justify-content-center align-items-center">
        <li class="nav-item ">
            <div class="user-panel pb-2">
                <div class="image">
                    <img src="{{ asset('template') }}/dist/img/admin1.jpg" class="img-circle elevation-2"
                        alt="Admin Image">
                </div>
                <div class="info">
                    <a href="" class="d-block"></a>
                </div>
            </div>
        </li>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</nav>
<!-- /.navbar -->
