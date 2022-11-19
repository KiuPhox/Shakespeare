<div class="navbar-custom topnav-navbar topnav-navbar-light" style="background-color: #f0efea; height: 80px;  ">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="{{route('home.index')}}" class="topnav-logo" style="margin-left: 5px; margin-top: 5px">
                    <span class="topnav-logo-lg">
                        <img src="{{asset('img/logo-shakespeare-and-company.svg')}}" alt="" height="60">
                    </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">



            <li class="dropdown notification-list">
                <a style="background: none; border: none; outline: none; letter-spacing: .1rem; cursor: pointer; margin-top: 5px; padding: 0 20px; line-height: 50px;" class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">

                    <span>
                                <span class="account-user-name" style="font-size: 20px; ">{{session()->get('name')}}</span>
                                <span class="account-position">Admin</span>
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                    <!-- item-->

                    <!-- item-->
                    <a href="{{route('account.index')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('logout')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout mr-1"></i>
                        <span>Sign Out</span>
                    </a>

                </div>
            </li>

        </ul>


    </div>
</div>

