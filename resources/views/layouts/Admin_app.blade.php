<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('Homepage/24-7') }}">

    <!-- jQuery -->
    <script src="{{ asset('DashboardAdmin/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('DashboardAdmin/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- MetisMenu CSS -->
     <link rel="stylesheet" href="{{ asset('DashboardAdmin/vendor/metisMenu/metisMenu.min.css') }} ">

    <!-- Custom CSS -->
     <link rel="stylesheet" href="{{ asset('DashboardAdmin/dist/css/sb-admin-2.css') }} ">

    <!-- Custom Fonts -->
     <link rel="stylesheet" href="{{ asset('DashboardAdmin/vendor/font-awesome/css/font-awesome.min.css')}}" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>

<![endif]-->
     <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css')}}" />

    <script src="{{ asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('//cdn.ckeditor.com/4.7.2/full/ckeditor.js') }}"></script>

</head>

<body >

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" >Admin panel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        @foreach(Auth::user()->unreadNotifications as $notification)
                            <a href="{{route('Msg.Read',['id'=>$notification->id])}}">
                                <div>
                                    <strong>{{$notification->data['name']}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{$notification->created_at}}</em>
                                    </span>
                                </div>
                                <div>{{$notification->data['email']}}</div>
                            </a>
                    </li>
                    <li class="divider"></li>
                    @endforeach
                    <li>
                        <a class="text-center" href="{{route('Msg.Index',['type'=>'All'])}}">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>

                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <!-- /.dropdown -->
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{route('Web.Profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>

                    <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{route('services.index')}}"><i class="fa  fa-gear fa-fw"></i> Services Display</a>
                    </li>
                    <li>
                        <a href="{{route('projects.index')}}"><i class="fa   fa-tasks fa-fw"></i> projects Display</a>
                    </li>

                    <li>
                        <a href="{{route('Msg.Index',['type'=>'All'])}}"><i class="fa  fa fa-envelope-o fa-fw"></i> Message Display</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
                <!-- /.col-lg-12 -->
                @yield('content')
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>

<!-- /#wrapper -->



<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('DashboardAdmin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('DashboardAdmin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('DashboardAdmin/vendor/metisMenu/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('DashboardAdmin/dist/js/sb-admin-2.js') }}"></script>
<script src="{{ asset('DashboardAdmin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('DashboardAdmin/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('DashboardAdmin/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

</body>

</html>
