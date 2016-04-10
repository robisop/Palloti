<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Palloti - @yield('title')</title>

    @section('styles')
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">

        <!-- Toastr style -->
        <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @show()
</head>

<body>

<div id="wrapper">

    @section('sidebar')
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            @if(Auth::check())
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">{{ Auth::user()->name }}</strong>
                                    </span>
                                    {{--<span class="text-muted text-xs block">Art Director <b class="caret"></b>--}}
                                    </span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            @endif
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li class="active">
                        <a href="{{ route('index') }}"><i class="fa fa-th-large"></i> <span
                                    class="nav-label">Prehľad</span></a>
                    </li>
                    <li>
                        <a href="{{ route('rodic.index') }}"><i class="fa fa-user"></i> <span
                                    class="nav-label">Rodičia</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('dieta.index') }}"><i class="fa fa-child"></i> <span
                                    class="nav-label">Deti</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('prekladatel.index') }}"><i class="fa fa-cube"></i> <span
                                    class="nav-label">Prekladatelia</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('sprava.index') }}"><i class="fa fa-envelope"></i> <span
                                    class="nav-label">Správy</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('projekt.index') }}"><i class="fa fa-car"></i> <span
                                    class="nav-label">Projekty</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('poziadavka.index') }}"><i class="fa fa-camera"></i> <span
                                    class="nav-label">Požiadavky</span> </a>
                    </li>
                </ul>

            </div>
        </nav>
    @show()


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control"
                                   name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="/logout">
                            <i class="fa fa-sign-out"></i>Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            @include('flash::message')
            @section('content')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center m-t-lg">
                            <h1>
                                Welcome in INSPINIA Static SeedProject
                            </h1>
                            <small>
                                It is an application skeleton for a typical web app. You can use it to quickly bootstrap
                                your webapp projects and dev environment for these projects.
                            </small>
                        </div>
                    </div>
                </div>
            @show()

        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

@section('scripts')
        <!-- Mainly scripts -->
<script src="{{ asset('js/jquery-2.1.1.js')}} "></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>


<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js') }}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#flash-overlay-modal').modal();

        $('#flash_notification').not('.important').delay(5000).fadeOut();

        $('.input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd.mm.yyyy"
        });

        $(".select2").select2();

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });

</script>
@show()

</body>

</html>
