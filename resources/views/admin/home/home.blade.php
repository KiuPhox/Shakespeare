@extends('admin.layouts.master-admin')
@section('content-admin')
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Home</h4>
        </div>
    </div>
</div>
<img src="{{asset('img/homepage.svg')}}"  id="bg">

</body>
</html>
@stop

@section('styles')
    <style>
        #bg {
            /* Set rules to fill background */
            max-height: 500px;
            min-width: 500px;

            /* Set up proportionate scaling */
            width: 100%;
            height: auto;

            /* Set up positioning */
            margin-top: 10px;
            top: 0;
            left: 0;
        }
    </style>
@stop
