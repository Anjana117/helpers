<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="container d-flex justify-content-between align-items-center w-100">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        @guest
        <div class="mx-auto pt-5">
            <a href="/register" class="btn btn-primary mx-2">Register</a>
            <a href="/login" class="btn btn-primary mx-2">Login</a>
        </div>
        @else

       
        @endguest
    </div>
</nav>
