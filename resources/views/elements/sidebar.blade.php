<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Zasya Solutions</a>
            </div>
        </div>


        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#regstu" aria-expanded="false" aria-controls="regstu">
                        <i class="fas fa-user-graduate"></i> Student
                        <i class="fas fa-angle-down float-end"></i>
                    </a>
                    <ul class="collapse list-unstyled ms-3" id="regstu">
                        <li><a href="/students" class="nav-link">📖 Reg Student</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#bookIssueMenu">
                        <i class="fas fa-book"></i> Book Issue
                        <i class="fas fa-angle-down float-end"></i>
                    </a>
                    <ul class="collapse list-unstyled ms-3" id="bookIssueMenu">
                        <li><a href="/bookissue" class="nav-link">📖 Issue a Book</a></li>
                        <li><a href="/bookissue/index" class="nav-link">📚 Issued Books</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#allbook">
                        <i class="fas fa-book"></i> Books
                        <i class="fas fa-angle-down float-end"></i>
                    </a>
                    <ul class="collapse list-unstyled ms-3" id="allbook">
                        <li><a href="/books" class="nav-link">📖 Add Book</a></li>
                        <li><a href="/books/show" class="nav-link">📚 Show Books</a></li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#categoryMenu">
                        <i class="fas fa-layer-group"></i> Categories
                        <i class="fas fa-angle-down float-end"></i>
                    </a>
                    <ul class="collapse list-unstyled ms-3" id="categoryMenu">
                        <li><a href="/books/category" class="nav-link">📂 Add Category</a></li>
                        <li><a href="/books/category/show" class="nav-link">📋 Show Categories</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                      <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light col-12 btn-sm">Logout</button>
                    </form>
                  </li>
            </ul>
        </nav>
    </div>

</aside>
