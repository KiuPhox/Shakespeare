<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;700&display=swap" rel="stylesheet">

    @yield('styles')

</head>
<body>
@include("user.partial.header")
@yield('content')
@include("user.partial.footer")

@yield('scripts')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>

<style>
    body {
        font-family: 'Swiss 721', sans-serif;
        font-size: 14px;
        margin: 0;
    }

    a, a:hover, a:visited, a:active {
        color: inherit;
        text-decoration: none;
    }
</style>

