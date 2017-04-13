<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop mua sắm trực tuyến</title>
    <link rel="stylesheet" type="text/css"  
        href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" 
        href="{{ asset('lib/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" 
        href="{{ asset('admin/css/admin.css') }}"/>
    <link rel="stylesheet" type="text/css" 
        href="{{ asset('admin/js/datepicker/css/datepicker.css') }}"/>
    <script src="{{ asset('lib/bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
</head>
<body>

    @include("admin.layout.header")

    @yield("content-superadmin")

    @yield("content-admin")
    
    <script src="{{ asset('admin/js/admin.js') }}"></script>
    <script src="{{ asset('admin/js/ajaxedit.js') }}"></script>
    <script src="{{ asset('admin/js/datepicker/js/bootstrap-datepicker.js') }}" 
        type="text/javascript" language="javescript"></script>
</body>
</html>