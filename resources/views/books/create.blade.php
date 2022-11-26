{{--<form action="{{@route('books.store')}}" method="post">--}}
{{--    @csrf--}}
{{--    Title <input type="text" name="title"> <br>--}}
{{--    Author <input type="text" name="author"> <br>--}}
{{--    Description <textarea name="description"></textarea><br>--}}
{{--    Image URL <input type="text" name="image"> <br>--}}
{{--    Price <input type="text" name="price"> <br>--}}
{{--    Publisher--}}
{{--    <select name="publisher_id">--}}
{{--        @foreach($publishers as $publisher) {--}}
{{--        <option value="{{$publisher->id}}">--}}
{{--            {{$publisher->name}}--}}
{{--        </option>--}}
{{--        @endforeach--}}
{{--    </select><br>--}}
{{--    Publication Date <input type="date" name="publication_date"> <br>--}}
{{--    Page Quantity <input type="number" name="page_quantity"> <br>--}}
{{--    Quantity <input type="number" name="quantity"> <br>--}}
{{--    ISBN <input type="text" name="isbn"> <br>--}}
{{--    <button>Insert</button>--}}
{{--</form>--}}
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
            <form class="content" action="{{@route('books.store')}}" method="post">
                @csrf
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('books.index')}}">Books</a></li>
                                    <li class="breadcrumb-item active">Add Book Product</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add Book Products</h4>
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
                                            <label for="title">Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Enter book title">
                                        </div>

                                        <div class="form-group">
                                            <label for="author">Author</label>

                                            <input type="text" name="author" class="form-control" placeholder="Enter author">

                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                                <textarea class="form-control" name="description" rows="5" placeholder="Enter some brief about this book"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" class="form-control" placeholder="Enter price">
                                        </div>

                                        <div class="form-group">
                                            <label>Publication Date</label>
                                            <input type="text" name="publication_date" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
                                        </div>


                                        <div class="form-group mb-0">
                                            <label for="publisher">Publisher</label>

{{--                                            <select class="form-control select2" data-toggle="select2">--}}
{{--                                                <option>Select</option>--}}
{{--                                                <option value="AZ">Mary Scott</option>--}}
{{--                                                <option value="CO">Holly Campbell</option>--}}
{{--                                            </select>--}}
                                                <select class="form-control select2" data-toggle="select2" name="publisher_id">
                                                    @foreach($publishers as $publisher) {
                                                    <option value="{{$publisher->id}}">
                                                        {{$publisher->name}}
                                                    </option>
                                                    @endforeach
                                                </select><br>
                                        </div>

                                    </div> <!-- end col-->

                                    <div class="col-xl-6">

                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Page Quantity</label>
                                            <input type="number" name="page_quantity" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="isbn">ISBN</label>
                                            <input type="text" name="isbn" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="text" name="image" class="form-control" placeholder="Image's Link">
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-sm-3 mt-5">
                                                <button class="btn btn-success mt-5 px-3 py-2"><i class="mdi mdi-plus-circle mr-2"></i> Insert</button>
                                            </div>
                                            <div class="col-sm-3 mt-5">
                                                <a href="{{route('books.index')}}" class="btn btn-danger mt-5 px-3 py-2"><i class="mdi mdi-window-close mr-2"></i> Cancel</a>
                                            </div>
                                        </div>
                                </div>
                                <!-- end row -->

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- End Content -->



        </form> <!-- content-page -->

    </div> <!-- end wrapper-->
</div>
<!-- END Container -->

</div>


<script src="{{asset('admin/js/vendor.min.js')}}"></script>
<script src="{{asset('admin/js/app.min.js')}}"></script>

</body>
</html>


