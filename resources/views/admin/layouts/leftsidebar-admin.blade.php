<!-- ========== Left Sidebar Start ========== -->
<div style="width: 200px" class="left-side-menu">
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="assets/images/logo_sm.png" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{route('dashboard.index')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Home </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Manage</li>

            <li class="side-nav-item">
                <a href="{{route('users.index')}}" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> Users </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('books.index')}}" class="side-nav-link">
                    <i class="uil-book"></i>
                    <span> Books </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{route('publishers.index')}}" class="side-nav-link">
                    <i class="uil-store-alt"></i>
                    <span> Publishers </span>
                </a>
            </li>




        </ul>


        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
