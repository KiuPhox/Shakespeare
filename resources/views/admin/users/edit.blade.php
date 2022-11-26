<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Add Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('admin/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>


<!-- Start Content-->
<div class="container-fluid">

    <!-- Begin page -->
    <div class="wrapper">



        <div class="content-page">
            <form class="content" action="{{@route('users.update', $user)}}" method="post">
                @csrf
                @method('put')
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                                    <li class="breadcrumb-item active">Edit User</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit User</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="name">User's name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter User's Name" value="{{$user->name}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter email" value="{{$user->email}}">
                                        </div>


                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select class="form-control select2" data-toggle="select2" name="level">
                                                <option value="0">Admin</option>
                                                <option value="1">User</option>
                                            </select>
                                        </div>

                                    </div> <!-- end col-->

                                    <div class="row mt-5 ml-5">
                                        <div class="col-sm-5 mt-0 mr-5">
                                            <button class="btn btn-success  mt-1 px-2 py-2" style=""><i class="mdi mdi-plus-circle mr-2"></i>Update</button>
                                        </div>
                                        <div class="col-sm-5 mt-0 mr-5">
                                            <a href="{{route('users.index')}}" class="btn btn-danger  mt-0 px-2 py-2" style=""><i class="mdi mdi-window-close mr-2"></i> Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->
            </form>
        </div> <!-- End Content -->



        <!-- content-page -->

    </div> <!-- end wrapper-->
</div>
<!-- END Container -->




<script src="{{asset('admin/js/vendor.min.js')}}"></script>
<script src="{{asset('admin/js/app.min.js')}}"></script>

</body>
</html>
