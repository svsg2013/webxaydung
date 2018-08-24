<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>
        @section('title')
            Trung tâm điều khiển
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- DataTables -->
    <link href="{{asset('backend/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/plugins/datatables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css')}}"/>
    <link href="{{asset('backend/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Jquery filer css -->
    <link href="{{asset('backend/plugins/jquery.filer/css/jquery.filer.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" rel="stylesheet" />

    <!-- Bootstrap fileupload css -->
    <link href="{{asset('backend/plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet" />

    <script src="{{asset('backend/js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('backend/js/ckfinder/ckfinder.js')}}"></script>
    <script type="text/javascript">
        var baseURL= "{{url('/')}}";
    </script>
    <script src="{{asset('backend/js/func_ckfinder.js')}}"></script>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">

    <!-- C3 charts css -->
    <link href="{{asset('backend/plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />

    <!-- App css -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/menu.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/responsive.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{asset('backend/js/modernizr.min.js')}}"></script>
    <!--mystyle-->
    <link href="{{asset('backend/css/mystyle.css')}}" rel="stylesheet" type="text/css"/>

</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <!--<a href="index.html" class="logo"><span>Code<span>Fox</span></span><i class="mdi mdi-layers"></i></a>-->
            <!-- Image logo -->
            <a href="index.html" class="logo">
                                <span>
                                    <img src="{{asset('backend/images/logo.png')}}" alt="" height="25">
                                </span>
                <i>
                    <img src="{{asset('backend/images/logo_sm.png')}}" alt="" height="28">
                </i>
            </a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Navbar-left -->
                <ul class="nav navbar-nav navbar-left nav-menu-left">
                    <li>
                        <button type="button" class="button-menu-mobile open-left waves-effect">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                    <li class="dropdown hidden-xs mega-menu">
                        <ul class="dropdown-menu dropdown-menu-yamm">
                            <li>
                                <!-- Content container to add padding -->
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-3 list-unstyled megamenu-list">
                                            <h5 class="m-t-0">Description</h5>

                                            <p class="text-muted font-13">
                                                Adminox is a fully featured premium admin template built on top of awesome Bootstrap 3.3.7, modern web technology HTML5, CSS3 and jQuery. It has many ready to use hand crafted components. The theme is fully responsive and easy to customize. The code is super easy to understand and gives power to any developer to turn this theme into real web application.
                                            </p>
                                        </div>

                                        <ul class="col-sm-6 col-md-3 list-unstyled megamenu-list">
                                            <li>
                                                <h5 class="m-t-0">Pages</h5>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-air-play text-muted"></i> Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-target text-muted"></i> Admin UI </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-help text-muted"></i> Tickets <span class="badge badge-danger">New</span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-paper text-muted"></i>Task Board</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-bar-graph-2 text-muted"></i> Charts</a>
                                            </li>
                                        </ul>

                                        <ul class="col-sm-6 col-md-3 list-unstyled megamenu-list">
                                            <li>
                                                <h5 class="m-t-0">&nbsp;</h5>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-briefcase text-muted"></i> UI Kit </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-box text-muted"></i> Icons </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-mail text-muted"></i> Email <span class="badge badge-success">32</span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-disc text-muted"></i>Forms</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-layout text-muted"></i> Tables</a>
                                            </li>
                                        </ul>

                                        <ul class="col-sm-6 col-md-3 list-unstyled megamenu-list">
                                            <li>
                                                <h5 class="m-t-0">&nbsp;</h5>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-map text-muted"></i> Maps </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-clock text-muted"></i> Calendar </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-marquee-plus text-muted"></i> Extra Pages <span class="label label-info">22</span></a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-paper-stack text-muted"></i>Sample Pages</a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"><i class="fi-bar-graph-2 text-muted"></i> Charts</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown hidden-xs">
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <a href="javascript:;"><span> Adminox Admin </span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span> Frontend </span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span> Admin RTL </span></a>
                            </li>
                            <li>
                                <a href="javascript:;"><span> Dark Admin </span></a>
                            </li>
                        </ul>
                    </li>


                </ul>

                <!-- Right(Notification) -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-lg user-list notify-list">
                            <li class="list-group notification-list m-b-0">
                                <div class="slimscroll">
                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left p-r-10">
                                                <em class="fa fa-diamond bg-primary"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading text-primary">A new order has been placed A new order has been placed</h5>
                                                <p class="m-0">
                                                    There are new settings available
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left p-r-10">
                                                <em class="fa fa-cog bg-warning"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading text-warning">New settings</h5>
                                                <p class="m-0">
                                                    There are new settings available
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left p-r-10">
                                                <em class="fa fa-bell-o bg-custom"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading text-custom">Updates</h5>
                                                <p class="m-0">
                                                    There are <span class="text-primary font-600">2</span> new updates available
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left p-r-10">
                                                <em class="fa fa-user-plus bg-danger"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading text-danger">New user registered</h5>
                                                <p class="m-0">
                                                    You have 10 unread messages
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left p-r-10">
                                                <em class="fa fa-diamond bg-primary"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading text-primary">A new order has been placed A new order has been placed</h5>
                                                <p class="m-0">
                                                    There are new settings available
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left p-r-10">
                                                <em class="fa fa-cog bg-warning"></em>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="media-heading text-warning">New settings</h5>
                                                <p class="m-0">
                                                    There are new settings available
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <!-- end notification list -->
                        </ul>
                    </li>

                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{asset('backend/images/users/avatar-1.jpg')}}" alt="user-img" class="img-circle user-img">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li><a href="javascript:void(0)">Profile</a></li>
                            <li><a href="javascript:void(0)"><span class="badge badge-info pull-right">4</span>Settings</a></li>
                            <li><a href="javascript:void(0)">Lock screen</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Logout</a></li>
                        </ul>
                    </li>

                </ul> <!-- end navbar-right -->

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
@include('admin.partial.navleft')
<!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Tieu de...</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="#">Adminox</a>
                                </li>
                                <li>
                                    <a href="#">Pages</a>
                                </li>
                                <li class="active">
                                    Tieu de...
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                @yield('content')
            </div> <!-- container -->

        </div> <!-- content -->


        <footer class="footer text-right">
            2017 © Adminox. - Coderthemes.com
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->
<!-- jQuery  -->
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
<script src="{{asset('backend/js/waves.js')}}"></script>
<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>

<!-- Toastr js -->
<script src="{{asset('backend/plugins/jquery-toastr/jquery.toast.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/pages/jquery.toastr.js')}}" type="text/javascript"></script>

<!-- Counter js  -->
<script src="{{asset('backend/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('backend/plugins/counterup/jquery.counterup.min.js')}}"></script>

<!--C3 Chart-->
<script type="text/javascript" src="{{asset('backend/plugins/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/plugins/c3/c3.min.js')}}"></script>

<!--Echart Chart-->
<script src="{{asset('backend/plugins/echart/echarts-all.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('backend/pages/jquery.dashboard.js')}}"></script>

<!-- App js -->
<script src="{{asset('backend/js/jquery.core.js')}}"></script>
<script src="{{asset('backend/js/jquery.app.js')}}"></script>
<!--hixxx myscript-->
<script src="{{asset('backend/js/myScript.js')}}"></script>

@yield('jstable')
@yield('jsfiles')

</body>
</html>