<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop mua sắm trực tuyến</title>
    <link rel="stylesheet" type="text/css"  
        href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" 
        href="{{ asset('customer/css/customer.css') }}"/>
        <link rel="stylesheet" type="text/css" 
        href="{{ asset('customer/css/responsive.css') }}"/>
    <link rel="stylesheet" type="text/css" 
        href="{{ asset('lib/css/font-awesome.min.css') }}"/>
{{--     <link rel="stylesheet" type="text/css"  
        href="{{ asset('lib/bootstrap/css/bootstrap-theme.min.css') }}"/> --}}
    <script src="{{ asset('lib/bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>

    @include("client.layout.header")

    {{--@include("client.layout.slider")--}}

    @yield("content")

    @include("client.layout.footer")

    <!-- Include js files -->
    <script type="text/javascript" src="{{ asset('customer/js/customer.js') }}">
    </script>
    <!-- End include js files -->
</body>
</html>