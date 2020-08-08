<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::check())
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->email}}</span>
                    @endif
                    <img class="user-avatar rounded-circle" src="admin_asset/images/admin.jpg" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    @if(Auth::check())
                    <a class="nav-link" href="admin/giangvien/info"><i class="fa fa-user"></i> Thông tin cá nhân</a>
                    @endif
                    <a class="nav-link" href="admin/logout"><i class="fa fa-power-off"></i> Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

</header><!-- /header -->
