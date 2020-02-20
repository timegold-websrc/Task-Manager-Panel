<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from www.wrappixel.com/demos/admin-templates/xtreme-admin/html/ltr/index8.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Oct 2019 04:05:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logo-icon.png">
    <title>Service Task Force</title>
    <!-- chartist CSS -->
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/select2/dist/css/select2.min.css">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.css" rel="stylesheet">
    <link href="../../dist/css/knobchart.css" rel="stylesheet">
    <link href="../../assets/libs/morris.js/morris.css" rel="stylesheet">

    <link href="../../assets/extra-libs/css-chart/css-chart.css" rel="stylesheet">
    <link href="../../assets/extra-libs/css-chart/grid-css-barchart.css" rel="stylesheet">
    <link href="../../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="../../assets/extra-libs/light-gallery/css/lightgallery.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<![endif]-->
    <style>
        html, body, html * {
            font-family: 'Roboto', sans-serif;
        }
        .flex-table-container {
            height: 240px;
            padding: 0px; 
        }
        
        .table.flex-table tr td:nth-child(1),
        .table.flex-table tr th:nth-child(1) {
            flex: 1 0 40%;
            min-width: 120px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div class="d-flex justify-content-center" style="margin-bottom: 80px">
            <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="../../assets/images/white-logo-icon.png" alt="homepage" class="dark-logo" style="height: 200px" />
                <!-- Light Logo icon -->
                <!--<img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
            </b>
        </div>
        <header class="topbar">
            <div class="row m-0">
                <!--<div class="col-sm-1">-->
                <!--</div>-->
                <div class="col-sm-12">
                    <nav class="navbar top-navbar navbar-expand-md">
                        <div class="navbar-header" style="position: relative">
                            <!-- Logo -->
                            <!-- ============================================================== -->
                            <a class="navbar-brand" href="https://www.servicetaskforce.com">
                                <!-- Logo icon -->
                                <b class="logo-icon">
                                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                    <!-- Dark Logo icon -->
                                    <img src="../../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo icon -->
                                    <!--<img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text -->
                                <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo text -->    
                                    <!--<img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />-->
                                </span>
                            </a>
                            <!-- ============================================================== -->
                            <!-- End Logo -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Toggle which is visible on mobile only -->
                            <!-- ============================================================== -->
                            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse collapse" id="navbarSupportedContent">
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-left mr-auto">
                                
                            </ul>
                            <ul class="nav navbar-nav nav-pills custom-pills float-center mr-auto" role="tablist">
                                <li class="nav-item m-0-15"> 
                                    <a class="nav-link text-bold p-0 active" data-toggle="pill" href="/" aria-selected="true"><img src="../assets/images/icons/page-home.png" alt=""> Home</a>
                                </li>
                                <li class="nav-item m-0-15">
                                    <a class="nav-link text-bold text-gray p-0" data-toggle="pill" href="/" aria-selected="false"><img src="../assets/images/icons/page-training.png" alt=""> Training</a>
                                </li>
                                <li class="nav-item m-0-15">
                                    <a class="nav-link text-bold text-gray p-0" data-toggle="pill" href="/" aria-selected="false"><img src="../assets/images/icons/page-top.png" alt=""> Top 10</a>
                                </li>
                            </ul>                  
                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav float-right">
                                <!-- Comment -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                        <i class="mdi font-24"><img src="../assets/images/icons/alert-chat.png" alt=""></i>
                                        <span class="badge "><img src="../assets/images/icons/badge-ico.png" alt=""></span>                                
                                    </a>
                                </li>
                                <!-- ============================================================== -->
                                <!-- End Comment -->
                                <!-- ============================================================== -->
                                <!-- Comment -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                        <i class="mdi font-24"><img src="../assets/images/icons/alert-bell.png" alt=""></i>
                                        <span class="badge badge-inner"><img src="../assets/images/icons/badge-ico.png" alt=""></span>                                
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" hidden>
                                        <span class="with-arrow"><span class="bg-primary"></span></span>
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="drop-title bg-primary text-white">
                                                    <h4 class="mb-0 mt-1">4 New</h4>
                                                    <span class="font-light">Notifications</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-center notifications">
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="nav-link text-center mb-1 text-dark" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- End Comment -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- Messages -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                        <i class="font-24 mdi"><img src="../assets/images/icons/alert-email.png" alt=""></i>
                                        <span class="badge "><img src="../assets/images/icons/badge-ico.png" alt=""></span>                                
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2" hidden>
                                        <span class="with-arrow"><span class="bg-danger"></span></span>
                                        <ul class="list-style-none">
                                            <li>
                                                <div class="drop-title text-white bg-danger">
                                                    <h4 class="mb-0 mt-1">5 New</h4>
                                                    <span class="font-light">Messages</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-center message-body">
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="user-img"> <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle"> <span class="profile-status online pull-right"></span> </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="user-img"> <img src="../../assets/images/users/2.jpg" alt="user" class="rounded-circle"> <span class="profile-status busy pull-right"></span> </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="user-img"> <img src="../../assets/images/users/3.jpg" alt="user" class="rounded-circle"> <span class="profile-status away pull-right"></span> </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)" class="message-item">
                                                        <span class="user-img"> <img src="../../assets/images/users/4.jpg" alt="user" class="rounded-circle"> <span class="profile-status offline pull-right"></span> </span>
                                                        <div class="mail-contnet">
                                                            <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="nav-link text-center link text-dark" href="javascript:void(0);"> <b>See all e-Mails</b> <i class="fa fa-angle-right"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- End Messages -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark profile-item" href="#"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">              
                                        @if ( Auth::user()->avatar )
                                            <img src="../storage/{{ Auth::user()->avatar }}" alt="user" class="rounded-circle"
                                            width="50" height="50">&nbsp&nbsp<span class="user-name">{{ Auth::user()->name }}</span>&nbsp&nbsp<i class="fa fa-angle-down"></i></a>
                                        @else
                                            <img src="../../assets/images/users/avatar.png" alt="user" class="rounded-circle"
                                            width="50">&nbsp&nbsp<span class="user-name">{{ Auth::user()->name }}</span>&nbsp&nbsp<i class="fa fa-angle-down"></i></a>                 
                                        @endif                        
                                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                        <span class="with-arrow"><span class="bg-primary"></span></span>
                                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white mb-2">
                                            <div class="">
                                            @if ( Auth::user()->avatar )
                                                <img src="../storage/{{ Auth::user()->avatar }}" alt="user"
                                                    class="img-circle" width="60">
                                            @else
                                                <img src="../../assets/images/users/avatar.png" alt="user"
                                                    class="img-circle" width="60">
                                            @endif
                                            </div>
                                            <div class="ml-2">
                                                <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                                                <p class=" mb-0"><a href="/"
                                                        class="__cf_email__"
                                                        data-cfemail="790f180b0c17391e14181015571a1614">[&#160;{{ Auth::user()->email }}]</a>
                                                </p>
                                            </div>
                                        </div>
                                        @if ( Auth::user()->authorization )
                                            <a class="dropdown-item" href="/admin"><i class="ti-settings mr-1 ml-1"></i>
                                            Admin Panel</a> 
                                            <div class="dropdown-divider"></div>
                                        @endif     
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i
                                                class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--<div class="col-sm-1">-->
                <!--</div>-->
            </div>            
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

            <div class="page-wrapper p-0-15">
                <div class="row">
                <!--<div class="col-sm-1"></div>-->
                <div class="col-sm-12" >
                    <!-- ============================================================== -->
            <!-- Temp - Earnings -->
            <!-- ============================================================== -->
            <div>

            </div>
            <div class="gredient-info-bg mt-4 mb-0">
                <div class="card-body d-flex align-items-center">
                    <div class="d-flex-left">
                        <span class="text-black-title">{{ $SITE_PROPERTY->site_name }}</span>
                        <h5 class="card-subtitle text-gray">Maintenance Evaluation</h5>
                    </div>
                    @if( !empty($SITE_PROPERTY->site_manager))
                        <div style="text-align: right">
                            <div style="font-size: 13px">Managed by:</div>
                            <h5>{{ $SITE_PROPERTY->site_manager }}</h5>
                        </div>
                    @endif
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Devices - Income - Sales -->
                <!-- ============================================================== -->
                <div class="row mr-0 ml-0">
                    <!-- col -->
                    <div class="col-sm-12 col-lg-9">
                        <div class="row">
                            <div class="col-sm-12 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="circle-chart" data-toggle="tooltip" data-placement="top" title="Average Tic Closing Times">
                                            <div class="knob-wrap">
                                                <div class="knob-round-nock">
                                                    @if ( $SITE_PROPERTY->avgticket_closetime_last30 >= 16 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->avgticket_closetime_last30}}" data-txt="h" data-max="40" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#ff6549" data-thickness=".20" data-readonly="true" disabled>
                                                    @elseif ( $SITE_PROPERTY->avgticket_closetime_last30 >= 8 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->avgticket_closetime_last30}}" data-txt="h" data-max="40" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#ffba49" data-thickness=".20" data-readonly="true" disabled>    
                                                    @elseif ( $SITE_PROPERTY->avgticket_closetime_last30 >= 5 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->avgticket_closetime_last30}}" data-txt="h" data-max="40" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#35b796" data-thickness=".20" data-readonly="true" disabled>
                                                    @elseif ( $SITE_PROPERTY->avgticket_closetime_last30 >= 0 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->avgticket_closetime_last30}}" data-txt="h" data-max="40" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#4074b8" data-thickness=".20" data-readonly="true" disabled>
                                                    @endif
                                                </div>
                                                <div class="knob-ctn-nock">
                                                    <h5>Average Tic Close Time</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="circle-chart" data-toggle="tooltip" data-placement="top" title="Perfect Make Ready">
                                            <div class="knob-wrap">
                                                <div class="knob-round-nock">
                                                    @if ( $SITE_PROPERTY->ready_percentage <= 49 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->ready_percentage}}" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#ff6549" data-thickness=".20" data-readonly="true" disabled>
                                                    @elseif ( $SITE_PROPERTY->ready_percentage <= 74 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->ready_percentage}}" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#ffba49" data-thickness=".20" data-readonly="true" disabled>
                                                    @elseif ( $SITE_PROPERTY->ready_percentage <= 89 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->ready_percentage}}" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#35b796" data-thickness=".20" data-readonly="true" disabled>
                                                    @elseif ( $SITE_PROPERTY->ready_percentage <= 100 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->ready_percentage}}" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#4074b8" data-thickness=".20" data-readonly="true" disabled>
                                                    @endif
                                                </div>
                                                <div class="knob-ctn-nock">
                                                    <h5>PRM Percent</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="circle-chart" data-toggle="tooltip" data-placement="top" title="Call Backs">
                                            <div class="knob-wrap">
                                                <div class="knob-round-nock">
                                                    @if ( $SITE_PROPERTY->callback_percentage >= 11 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->callback_percentage}}" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#ff6549" data-thickness=".20" data-readonly="true" disabled>
                                                    @elseif ( $SITE_PROPERTY->callback_percentage >= 6 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->callback_percentage}}" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#ffba49" data-thickness=".20" data-readonly="true" disabled>
                                                    @elseif ( $SITE_PROPERTY->callback_percentage >= 3 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->callback_percentage}}" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#35b796" data-thickness=".20" data-readonly="true" disabled>
                                                    @elseif ( $SITE_PROPERTY->callback_percentage >= 0 )
                                                        <input type="text" style="width: 0px; position: fixed;" class="knob" value="0" data-rel="{{$SITE_PROPERTY->callback_percentage}}" data-linecap="square" data-width="120" data-bgcolor="#e2e2e2" data-fgcolor="#4074b8" data-thickness=".20" data-readonly="true" disabled>
                                                    @endif
                                                </div>
                                                <div class="knob-ctn-nock">
                                                    <h5>Call Back Percent</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="circle-chart">
                                                <div class="row" style="padding: 36px 0px">
                                                    <div class="col-sm-12 col-lg-6 text-right">
                                                        <img src="../assets/images/icons/chat-ticket.png" alt="">
                                                    </div>
                                                    <div class="col-sm-12 col-lg-6 text-left" style="padding-top: 10px; padding-left: 0;">
                                                        <span>{{ $SITE_PROPERTY->ticket_last30 }}</span>
                                                    </div>
                                                </div>
                                                <h5>Tickets Monthly</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        @if( count($SITELIST) > 1 )
                        <div class="row m-0">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div id="map-for-site" style="width: 100%; height: 450px"></div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="row mt-2">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Service Evaluation Score</h4>  
                                        
                                        <div id="grid-bar-chart" class="grid-bar-chart-wrapper text-gray" style="height: 495px;">
                                			<div class="tooltip fade bs-tooltip-top" role="tooltip" style="position: absolute; transform: translate3d(200px, 10px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="top">
                                				<div style="display: flex; justify-content: center; width: 100%">
                                				    <div class="arrow"></div>
                                				</div>
                                				<div class="tooltip-inner">Market ready Apartments</div>
                                			</div>
                                		</div>
                            		    <div class="row">
                                            <button id="graph_color" class="btn btn-warning btn-action">Color</button>
                                            <button id="graph_blue" class="btn btn-info btn-action" style="display: none;">Blue</button>
                                        </div>              
                                        <!--<div id="graph" class="text-gray" style="height:450px;">-->
                                        <!--    <div id="chart-dash-1" class="row">-->
                                            
                                        <!--    </div>  -->
                                        <!--    <div id="chart-dash-2" class="row">-->
                                                
                                        <!--    </div>  -->
                                        <!--    <div id="chart-dash-3" class="row">-->
                                                
                                        <!--    </div>-->
                                        <!--    <div id="chart-label" class="row">-->
                                        <!--        <div class="col-sm-1"></div>-->
                                        <!--        <div class="col-sm-1" style="max-width: 5px;"></div>  -->
                                        <!--    </div>      -->
                                        <!--    <div class="row">-->
                                        <!--        <button id="graph_color" class="btn btn-warning btn-action">Color</button>-->
                                        <!--        <button id="graph_blue" class="btn btn-info btn-action" style="display: none;">Blue</button>-->
                                        <!--    </div>              -->
                                        <!--</div>                                          -->
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Open Projects</h4>
                                        <!-- <div class="row table-h-background"></div> -->
                                        <div class="flex-table-container">
                                            <table class="table flex-table">        
                                                <thead class="text-gray back-light-gray">
                                                    <tr class="border-0" style="font-weight: bold;">
                                                        <th class="border-0 pt-2 pb-2">Task Description </th>
                                                        <th class="border-0 pt-2 pb-2">Status</th>
                                                        <th class="border-0 pt-2 pb-2">Due Date</th>
                                                        <th class="border-0 pt-2 pb-2 text-nowrap">Assigned User</th>
                                                    </tr>                                                                                                
                                                </thead>                                          
                                                <tbody class="scroll">
                                                @foreach ( $TASKLIST as $_i => $val )
                                                    @if ( $val->status == 2 ) 
                                                    @else
                                                    <tr>
                                                        <td>
                                                            <div style="font-weight: bold;">{{ $val->head }}</div>
                                                            <div class="toggle-ellipse" style="font-weight: 300;  font-size: 14px;color: #78889e;">{{ $val->description }}</div>
                                                        </td>
                                                        <td>
                                                            @if ( $val->status == 1 )
                                                                @if ( $val->daydue <= 7 && $val->daydue >= 0 )
                                                                    <span class="status-warning">Due Now</span>
                                                                @elseif ( $val->daydue < 0 )
                                                                    <span class="status-danger">Past Due</span>
                                                                @else
                                                                    <span class="status-success">In Progress</span>
                                                                @endif
                                                            @elseif ( $val->status == 2 )
                                                                <span class="status-info">Completed</span>
                                                            @else
                                                                @if ( $val->daydue <= 7 && $val->daydue >= 0 )
                                                                    <span class="status-warning">Due Now</span>
                                                                @elseif ( $val->daydue < 0 )
                                                                    <span class="status-danger">Past Due</span>
                                                                @else
                                                                    <span class="status-success">Not Yet Started</span>
                                                                @endif                                                        
                                                            @endif
                                                        </td>
                                                        <td>{{ $val->datedue }}</td>
                                                        <td class="text-right">
                                                            @if ( count($val->users) )
                                                                @foreach ( $val->users as $_j => $user )
                                                                    @if ( $user->avatar )
                                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="{{$user['name']}}" style="padding-top: 10px">
                                                                            <img src="../storage/{{ $user['avatar'] }}" class="img-circle" alt="" width="40" height="40">
                                                                        </a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <!-- gallery -->
                        <div  class="row mt-2 mr-blog" style="padding-right: 10px; padding-bottom: 30px;">
                            <div class="col-sm-12 col-lg-9">
                                @if ( $SITE_PROPERTY->pic_property != null )
                                    <img src="../storage/{{ $SITE_PROPERTY->pic_property }}" style="height: 360px; float: right;" alt="">                                
                                @endif
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="row aniimated-thumbnials">      
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ( $GALLERY_BEFORE as $_i => $val )                                        
                                        @if ( $val )
                                            @if ( $i == 0 )
                                            <a class="gallery" href="../storage/{{ $val }}" data-sub-html="Before Gallery"  data-toggle="tooltip" data-placement="top" title="Before Gallery">
                                                <img height="100" class="img-responsive thumbnail" src="../storage/{{ $val }}">
                                                <span> <i class="fa fa-image"></i> + {{ $GALLERY_BEFORE_C }}</span>
                                            </a>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @else
                                            <a hidden href="../storage/{{ $val }}" data-sub-html="Before Gallery"  data-toggle="tooltip" data-placement="top" title="Before Gallery">
                                                <img class="img-responsive thumbnail" src="../storage/{{ $val }}">
                                            </a>
                                            @endif                                            
                                        @endif
                                    @endforeach                     
                                </div>
                                <div class="row mt-2 aniimated-thumbnials">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ( $GALLERY_AFTER as $_i => $val )
                                        @if ( $val )
                                            @if ( $i == 0 )
                                            <a class="gallery" href="../storage/{{ $val }}" data-sub-html="After Gallery"  data-toggle="tooltip" data-placement="top" title="After Gallery">
                                                <img class="img-responsive thumbnail" src="../storage/{{ $val }}">
                                                <span> <i class="fa fa-image"></i> + {{ $GALLERY_AFTER_C }}</span>
                                            </a>
                                                @php
                                                    $i = 1;
                                                @endphp
                                            @else
                                            <a hidden href="../storage/{{ $val }}" data-sub-html="After Gallery"   data-toggle="tooltip" data-placement="top" title="After Gallery">
                                                <img class="img-responsive thumbnail" src="../storage/{{ $val }}">
                                            </a>
                                            @endif
                                        @endif
                                    @endforeach                                
                                </div>      
                            </div>
                        </div>   
                        <!--- gallery end -->                                                        
                    </div>
                    <!-- col -->
                    <div class="col-sm-12 col-lg-3">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Property Score</h4>
                                        <div class="mr-3" style="text-align: center;">
                                            <a id="gauge-tooltip" href="#" data-toggle="tooltip" title="">
                                                <div class="gaugejs-box text-right">
                                                    <canvas id="foo" class="gaugejs ml-auto" height="60"
                                                        width="120">guage</canvas>
                                                </div>
                                            </a>
                                            <h3><span class="text-black">{{ $SCORE }}</span><span class="text-hidden"> / </span><span class="text-hidden">310</span></h3>
                                            @if ( $NEWESTRATE == 'score_P' )
                                                <button class="btn btn-{{ $SCORE_TYPE[ $SITE_PROPERTY->eval_scoreP ] }}" data-toggle="tooltip" data-placement="top" title="Operation style rating">{{ $SCORE_TYPE[ $SITE_PROPERTY->eval_scoreP ] }}</button>
                                            @elseif ( $NEWESTRATE == 'score_M' )
                                                <button class="btn btn-{{ $SCORE_TYPE[ $SITE_PROPERTY->eval_scoreM ] }}" data-toggle="tooltip" data-placement="top" title="Operation style rating">{{ $SCORE_TYPE[ $SITE_PROPERTY->eval_scoreM ] }}</button>
                                            @elseif ( $NEWESTRATE == 'score_F' )
                                                <button class="btn btn-{{ $SCORE_TYPE[ $SITE_PROPERTY->eval_scoreF ] }}" data-toggle="tooltip" data-placement="top" title="Operation style rating">{{ $SCORE_TYPE[ $SITE_PROPERTY->eval_scoreF ] }}</button>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <div class="row mt-2">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-5">
                                            <h4 class="card-title">Property Info</h4>
                                            </div>                                            
                                            <div class="col-sm-12 col-lg-7 item-right">
                                                <select name=""  class="form-control select-border-0 text-gray">
                                                    <option value="">{{ $SITE_PROPERTY_ADDDATE }}</option>
                                                </select>
                                            </div>
                                        </div>    
                                        <div class="row mt-3">
                                            <div class="col-sm-12 col-lg-4">
                                                <img src="../assets/images/icons/building.png" alt="">
                                            </div>
                                            <div class="col-sm-12 col-lg-8"> 
                                                <div class="vh-dropdown">
                                                    <a class="vh-dropdown-item" href="#" data-toggle="dropdown"> 
                                                        <div class="row">
                                                             <div class="col-sm-10">
                                                            {{ $SITE_PROPERTY->site_name }}
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <i class="fa fa-angle-down"></i>
                                                            </div>
                                                        </div>
                                                     </a>                                               
                                                    <div class="dropdown-menu">
                                                        @foreach ( $SITELIST as $_opt => $val )
                                                            @if ( $val->id == $SITE_PROPERTY->id )
                                                                <a class="dropdown-item active" href="#">{{ $val->site_name }}</a>    
                                                            @else
                                                                <a class="dropdown-item" href="/dashboard?id={{ $val->id }}">{{ $val->site_name }}</a>  
                                                            @endif                                                
                                                        @endforeach
                                                    </div> 
                                                </div>
                                                <span class="text-gray font-15">{{ $SITE_PROPERTY->site_location }}</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3 text-property">
                                            <div class="col-sm-12 col-lg-4">
                                                <span class="sub-title">{{ $SITE_PROPERTY->num_units }}</span>
                                                <h6 class="text-gray">Units</h6>
                                            </div>
                                            <div class="col-sm-12 col-lg-4">
                                                <span class="sub-title">{{ $SITE_PROPERTY->num_built }}</span>
                                                <h6 class="text-gray">Built</h6>
                                            </div>
                                            <div class="col-sm-12 col-lg-4">
                                                <span class="sub-title">{{ $SITE_PROPERTY->num_service_staff }}</span> <br>
                                                <h6 class="text-gray">Staff</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <div class="row mt-2">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card" style="height: 483px;">
                                    <div class="card-body">
                                        <h4 class="card-title">Staff Info</h4>
                                    </div>
                                    <div class="" style="height:560px;">
                                        <!-- Comment Row -->
                                        <div class="mt-staff">
                                            @if ( !empty($MANAGER_SERVICE))
                                            <div class="row staff-user" style="align-items: center">
                                                <div class="mr-3">
                                                @if ( $MANAGER_SERVICE->avatar != null )
                                                    <img src="../../storage/{{ $MANAGER_SERVICE->avatar }}" alt="user" width="50" height="50" class="rounded-circle">
                                                @else
                                                    <img src="../../assets/images/users/avatar.png" alt="user" width="50" height="50" class="rounded-circle">                
                                                @endif  
                                                </div>
                                                <div class="">                                                    
                                                    <span class="staff-name text-black">{{ $MANAGER_SERVICE->name }}</span>
                                                    <br>
                                                    <span class="text-gray">Service Manager</span>
                                                </div>                                                
                                            </div>
                                            <div class="row staff-tbar ">
                                                <div class="d-flex-left pad-2-top">
                                                    <span class="text-blue">#{{ $MANAGER_SERVICE->phone }}</span>
                                                </div>
                                                <div class="tbar-tool">
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Email"><img src="../assets/images/icons/tbar-1.png" alt=""></a>
                                                    <a href="/storage/{{ $MANAGER_SERVICE->resume }}" target="blank" data-toggle="tooltip" data-placement="top" title="Resume"><img src="../assets/images/icons/tbar-2.png" alt=""></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Attached file"><img src="../assets/images/icons/tbar-3.png" alt=""></a>
                                                </div>
                                            </div>
                                            @endif
                                            <hr>
                                        </div>   
                                        <!-- Comment Row -->
                                        <div class="mt-staff">
                                            @if ( !empty($MANAGER_COMMUNITY))
                                            <div class="row staff-user"  style="align-items: center">
                                                <div class="mr-3">
                                                @if ( $MANAGER_COMMUNITY->avatar != null )
                                                    <img src="../../storage/{{ $MANAGER_COMMUNITY->avatar }}" alt="user" width="50" height="50" class="rounded-circle">
                                                @else
                                                    <img src="../../assets/images/users/avatar.png" alt="user" width="50" height="50" class="rounded-circle">                
                                                @endif
                                                </div>
                                                <div class="">                                                    
                                                    <span class="staff-name text-black">{{ $MANAGER_COMMUNITY->name }}</span>
                                                    <br>
                                                    <span class="text-gray">Community Manager</span>
                                                </div>                                                
                                            </div>
                                            <div class="row staff-tbar">
                                                <div class="d-flex-left pad-2-top">
                                                    <span class="text-blue">#{{ $MANAGER_COMMUNITY->phone }}</span>
                                                </div>
                                                <div class="tbar-tool">
                                                    <a href="#"  data-toggle="tooltip" data-placement="top" title="Email"><img src="../assets/images/icons/tbar-1.png" alt=""></a>
                                                    <a href="/storage/{{ $MANAGER_COMMUNITY->resume }}" target="blank"  data-toggle="tooltip" data-placement="top" title="Resume"><img src="../assets/images/icons/tbar-2.png" alt=""></a>
                                                    <a href="#"  data-toggle="tooltip" data-placement="top" title="Attached file"><img src="../assets/images/icons/tbar-3.png" alt=""></a>
                                                </div>
                                            </div>
                                            @endif
                                            <hr>
                                        </div>  
                                        <!-- Comment Row -->
                                        <div class="mt-staff">
                                            @if ( !empty($MANAGER_REGINAL))
                                            <div class="row staff-user" style="align-items: center">
                                                <div class="mr-3">
                                                @if ( $MANAGER_REGINAL->avatar != null )
                                                    <img src="../../storage/{{ $MANAGER_REGINAL->avatar }}" alt="user" width="50" height="50" class="rounded-circle">
                                                @else
                                                    <img src="../../assets/images/users/avatar.png" alt="user" width="50" height="50" class="rounded-circle">                
                                                @endif
                                                </div>
                                                <div class="">                                                    
                                                    <span class="staff-name text-black">{{ $MANAGER_REGINAL->name }}</span>
                                                    <br>
                                                    <span class="text-gray">Regional Manager</span>
                                                </div>                                                
                                            </div>
                                            <div class="row staff-tbar">
                                                <div class="d-flex-left pad-2-top">
                                                    <span class="text-blue">#{{ $MANAGER_REGINAL->phone }}</span>
                                                </div>
                                                <div class="tbar-tool">
                                                    <a href="#"  data-toggle="tooltip" data-placement="top" title="Email"><img src="../assets/images/icons/tbar-1.png" alt=""></a>
                                                    <a href="/storage/{{ $MANAGER_REGINAL->resume }}" target="blank" data-toggle="tooltip" data-placement="top" title="Resume"><img src="../assets/images/icons/tbar-2.png" alt=""></a>
                                                    <a href="#"  data-toggle="tooltip" data-placement="top" title="Attached file"><img src="../assets/images/icons/tbar-3.png" alt=""></a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                        </div>                                       
                    </div>
                </div>
                <!-- ============================================================== -->                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
                </div>
                <!--<div class="col-sm-1"></div>-->
                </div>            
        </div>
            </div>        
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
         <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                 www.frontpage.servicetaskforce.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../../dist/js/app.min.js"></script>
    <script src="../../dist/js/app.init.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!-- <script src="../../assets/libs/gaugeJS/dist/gauge.min.js"></script> -->
    <script src="../../assets/libs/gaugeJS/dist/gauge.js"></script>
    <!-- <script src="../../dist/js/pages/gauge/gauge-data.js"></script> -->
    <script src="../../assets/libs/flot/excanvas.min.js"></script>
    <script src="../../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/libs/raphael/raphael.min.js"></script>
    <script src="../../assets/libs/morris.js/morris.js"></script>
    <!-- <script src="../../dist/js/pages/morris/morris-data.js"></script> -->
    <script src="../../assets/libs/chart.js/dist/Chart.min.js"></script>

    <script src="../../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../../dist/js/pages/forms/select2/select2.init.js"></script>
    <script src="../../assets/extra-libs/echart/echart.options.js"></script>
    <script src="../../assets/extra-libs/echart/echarts.js"></script>
    <script src="../../assets/extra-libs/light-gallery/js/lightgallery-all.js"></script>
    
    <script src="../../assets/extra-libs/css-chart/grid-css-barchart.js"></script>
    
    <script src="../../assets/extra-libs/knobchart/jquery.knob.js"></script>
    <script src="../../assets/extra-libs/knobchart/jquery.appear.js"></script>
    <script src="../../assets/extra-libs/knobchart/knob-active.js"></script>
    <script type='text/javascript' src="//maps.googleapis.com/maps/api/js?key=<?php echo config('app.map')?>&libraries=places"></script>
    @include('script')
</body>

<div class="modal fade" id="modal-preview">
    <div class="modal-dialog">
    <div class="modal-content border-0" style="background-color: #fff0;">
        <div class="modal-header border-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 id="title_delete" class="modal-title"></h4>
        </div>
        <div class="modal-body" style="padding: 0 50px">
            <input type="hidden" id="delete_id">    
            <div class="row">
                <div class="col-sm-12">
                <div id="carouselExampleControls" style="" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../assets/images/blogs/blog-1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/images/blogs/blog-2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/images/blogs/blog-1.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" style="margin-left: -100px; z-index: 100;" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" style="margin-right: -100px; z-index: 100;" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                </div>
            </div> 
        </div>
        <!-- <div class="modal-footer"> -->
        <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
        <!-- </div> -->
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<!-- Mirrored from www.wrappixel.com/demos/admin-templates/xtreme-admin/html/ltr/index8.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Oct 2019 04:07:49 GMT -->
</html>