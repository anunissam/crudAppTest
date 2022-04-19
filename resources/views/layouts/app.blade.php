<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD LARAVEL- @yield('title')</title>

         <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')


            <div class="content-wrapper">
                   <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->


                  @yield('content')

            </div>
            @include('layouts.footer')
        </div>
    </body>
</html>
