<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/styles.css') !!}">
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{!! asset ('assets/images/favicon_1.ico') !!}">
    <!-- Plugin Css-->
    <link rel="stylesheet" href="{!! asset ('assets/plugins/magnific-popup/dist/magnific-popup.css') !!}">
    <link rel="stylesheet" href="{!! asset ('assets/plugins/jquery-datatables-editable/datatables.css') !!}">
    
    <!-- DataTables -->
    <link href="{!! asset ('assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css') !!}" />
    <link href="{!! asset ('assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css') !!}" />
    <link href="{!! asset ('assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css') !!}" />
    <link href="{!! asset ('assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css') !!}" />
    <link href="{!! asset ('assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css') !!}" />

    <link href="{!! asset ('assets/css/bootstrap.min.css" rel="stylesheet" type="text/css') !!}">
    <link href="{!! asset ('assets/css/core.css" rel="stylesheet" type="text/css') !!}">
    <link href="{!! asset ('assets/css/icons.css" rel="stylesheet" type="text/css') !!}">
    <link href="{!! asset ('assets/css/components.css" rel="stylesheet" type="text/css') !!}">
    <link href="{!! asset ('assets/css/pages.css" rel="stylesheet" type="text/css') !!}">
    <link href="{!! asset ('assets/css/menu.css" rel="stylesheet" type="text/css') !!}">
    <link href="{!! asset ('assets/css/responsive.css" rel="stylesheet" type="text/css') !!}">

    <script src="{!! asset ('assets/js/modernizr.min.js') !!}"></script>

    
</head>
<body>
    
<!-- container -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            @yield('content')
            @yield('editable')

        </div>
    </div>
</div><!-- container -->


<script src="{!! asset('assets/js/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('assets/js/script.js') !!}"></script>
</body>
</html>