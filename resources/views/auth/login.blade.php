
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Log In | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('admin/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="authentication-bg" data-layout-config='{"lightMode":true}'>



<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center ">
                        <a href="{{route('home.index')}}">
                            <span><img src="{{asset('img/logo-shakespeare-and-company.svg')}}" width="200" height="50"></span>
                        </a>
                    </div>



                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                            <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                        </div>

                        <form method="post" action="{{ route('process_login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                <input name="email" class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
                            </div>

                            <div class="form-group">
                                <a href="{{route('getForgetPassword')}}" class="text-muted float-right"><small>Forgot your password?</small></a>
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn" type="submit"> Sign In </button>
                            </div>

                            <div class="or-container"><div class="line-separator"></div> <div class="or-label">or</div><div class="line-separator"></div></div>

                            <div class="form-group mb-0 text-center">
                                <a href="{{route('google-auth')}}" class="btn btn-lg btn-google btn-block  text-sm-center btn-outline"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Sign in with Google</a>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Don't have an account? <a href="{{route('signup')}}" class="text-muted ml-1"><b>Sign Up</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    2022 © Shakespeare And The Company
</footer>

<!-- bundle -->
<script src="{{asset('admin/js/vendor.min.js')}}"></script>
<script src="{{asset('admin/js/app.min.js')}}"></script>

</body>
</html>

<style>
    button.btn {
        background-color: #f0efea;
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    div.card-header{
        background-color: #f0efea;
    }
    .btn-google {
        color: #545454;
        background-color: #ffffff;
        box-shadow: 0 1px 2px 1px #ddd;
        font-size: 17px;
    }


    .or-container {
        align-items: center;
        color: #ccc;
        display: flex;
        margin: 25px 0;
    }

    .line-separator {
        background-color: #ccc;
        flex-grow: 5;
        height: 1px;
    }

    .or-label {
        flex-grow: 1;
        margin: 0 15px;
        text-align: center;
    }
</style>




