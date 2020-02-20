@extends('admin.app')
@section('page-css')    
    <style>
    .btn-action {
        padding: 0 !important;
        height: 25px;
        padding-left: 5px !important;
        padding-right: 5px !important;
    }
    .gallery_pan {
        padding: 0;
        padding-top: 5px;
    }
    .gallery-pan-item {
        margin: 5px;
        width: 80px;
        height: 80px;
        border-radius: 8px;
    }
    .gallery-item {
        cursor: pointer;
    }
    .gallery-item i {
        opacity: 0;
        color: white;
        margin-left: -60px;
        width: 60px;  
        font-size: 30px;
    }
    .gallery-item i:hover {
        color: black;
    }
    .gallery-item:hover i {
        opacity: 1;            
    }
    .gallery-item:hover {
        opacity: 0.7;              
    }
    .img-preview {
        height: 50px;
        width: 50px;
        border-radius: 5px;
    }
    .question-label{
        font-weight: inherit;
    }
    .question-input{
        max-height: 114px!important;
    }
    </style>
@endsection
@section('content')
<div class="wrapper">

    <header class="main-header" >
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="../assets/images/logo-sm-white.png" alt=""></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="../assets/images/logo-lg-white.png" alt=""></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if ( !Auth::user()->avatar )
                            <img src="../assets/images/users/avatar.png" class="user-image" alt="User Image">
                            @else
                            <img src="../storage/{{ Auth::user()->avatar }}" class="user-image"
                                alt="User Image">
                            @endif

                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if ( !Auth::user()->avatar )
                                <img src="../assets/images/users/avatar.png" class="img-circle" alt="User Image">
                                @else
                                <img src="../storage/{{ Auth::user()->avatar }}" class="img-circle"
                                    alt="User Image">
                                @endif


                                <p>
                                    {{ Auth::user()->name }}
                                </p>
                            </li>
                            <li class="user-footer">
                                <!-- <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div> -->
                                <div class="pull-center">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); $('#logout-form').submit();">Sign out</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" >
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    @if ( !Auth::user()->avatar )
                    <img src="../assets/images/users/avatar.png" class="img-circle" alt="User Image">
                    @else
                    <img src="../storage/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="">
                    <a href="/admin">
                        <i class="fa fa-plus"></i><span>Service
                            Evaluation Input</span>
                    </a>
                </li>
                <li class="active">
                    <a href="/admin/sitemanage">
                        <i class="fa fa-cog"></i><span>Site Management</span>
                    </a>
                </li>
                <li class="">
                    <a href="/admin/taskmanagement">
                        <i class="fa fa-tasks"></i><span>Task Management</span>
                    </a>
                </li>
                <li class="">
                    <a href="/admin/users">
                        <i class="fa fa-user"></i><span>User Management</span>
                    </a>
                </li>
                <li class="">
                    <a href="/">
                        <i class="fa fa-arrow-left"></i><span> Back Dashboard</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Site Property
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="" class="active"><i class="fa fa-dashboard"></i> Edit Site Property</a></li>
                <li><a href="/admin/sitemanage"><i class="fa fa-dashboard"></i> Site Manage</a></li>
                <li>Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row br-4">
                <form id="form_siteproperties" action="/admin.siteproperties.save/true/{{ $SITE_PROPERTY->id }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="gallery_before_uploaded" value="{{ $SITE_PROPERTY->gallery_before }}">
                    <input type="hidden" name="gallery_after_uploaded" value="{{ $SITE_PROPERTY->gallery_after }}">
                    <div class="row" style="margin-right: 30px; padding-bottom: 10px;">
                        <div class="row" style="float:right;">
                            <button id="btnSave" class="btn btn-info btn-action" style="" type="submit"><i class="fa fa-upload"></i> Update Dashboard</button>
                        </div>                        
                    </div>
                    <div class="col-md-8">
                        <!-- general form elements disabled -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Service Evaluation</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body scrollable">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Primary Service Evaluation Date : </label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="primary_eval_date" name="primary_eval_date" type="text" class="form-control pull-right datepicker" value="{{ $PROPERTY_DATE['primary_eval_date'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Performed by : </label>
                                            <input id="primary_eval_by" name="primary_eval_by" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->primary_eval_by }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Milestone Evaluation Date : </label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="milestone_eval_date" name="milestone_eval_date" type="text" class="form-control pull-right datepicker" value="{{ $PROPERTY_DATE['milestone_eval_date'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Performed by : </label>
                                            <input id="milestone_eval_by" name="milestone_eval_by" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->milestone_eval_by }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Final Evaluation Date : </label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="final_eval_date" name="final_eval_date" type="text" class="form-control pull-right datepicker" value="{{ $PROPERTY_DATE['final_eval_date'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label> Performed by : </label>
                                            <input id="final_eval_by" name="final_eval_by" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->final_eval_by }}">
                                        </div>
                                    </div> 
                                </div>
                                <br>
                                    
                                <div class="row text-center">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label> Metric#</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label> Category</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label> Evaluation Question </label>                                        
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label> Property Score</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label> Milestone </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label> Final </label>
                                        </div>
                                    </div>                                    
                                </div>      
                                <hr class="mr-0 mr-bottom-1">
                                
                                @for ( $_i = 0; $_i < count($LIST_QUESTION); $_i ++ )
                                    <!-- question row  --> 
                                    <input type="hidden" id="question_{{ $LIST_QUESTION[$_i]['id'] }}_id" name="question_{{ $LIST_QUESTION[$_i]['id'] }}_id" value="{{ $LIST_QUESTION[$_i]['id'] }}">
                                    <input type="hidden" id="question_{{ $LIST_QUESTION[$_i]['id'] }}_catid" name="question_{{ $LIST_QUESTION[$_i]['id'] }}_catid" value="{{ $LIST_QUESTION[$_i]['cat_id'] }}">
                                    <div class="row text-left">
                                        <div class="col-sm-1 text-center">
                                            <div class="form-group">
                                                <label> {{ $_i + 1 }}</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label> {{ $LIST_CATEGORY[  $LIST_QUESTION[$_i]['cat_id'] - 1 ] }}</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label class="question-label"> {{ $LIST_QUESTION[$_i]['question'] }} </label>                                        
                                            </div>
                                        </div>
                                        <div class="col-sm-2 fix-item text-center item-center">
                                            <div class="form-group">
                                                <select id="question_{{ $LIST_QUESTION[$_i]['id'] }}_scoreP" name="question_{{ $LIST_QUESTION[$_i]['id'] }}_scoreP" class="form-control">
                                                @for ( $_opt = 0; $_opt <= 5; $_opt ++ )
                                                    @if ( $SCOREVALUES['score_P'][$_i] == $_opt )
                                                        <option selected>{{ $_opt }}</option>    
                                                    @else
                                                        <option>{{ $_opt }}</option> 
                                                    @endif                                                
                                                @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <select id="question_{{ $LIST_QUESTION[$_i]['id'] }}_scoreM" name="question_{{ $LIST_QUESTION[$_i]['id'] }}_scoreM" class="form-control">
                                                @for ( $_opt = 0; $_opt <= 5; $_opt ++ )
                                                    @if ( $SCOREVALUES['score_M'][$_i] == $_opt )
                                                        <option selected>{{ $_opt }}</option>    
                                                    @else
                                                        <option>{{ $_opt }}</option> 
                                                    @endif                                                
                                                @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <select id="question_{{ $LIST_QUESTION[$_i]['id'] }}_scoreF" name="question_{{ $LIST_QUESTION[$_i]['id'] }}_scoreF" class="form-control">
                                                @for ( $_opt = 0; $_opt <= 5; $_opt ++ )
                                                    @if ( $SCOREVALUES['score_F'][$_i] == $_opt )
                                                        <option selected>{{ $_opt }}</option>    
                                                    @else
                                                        <option>{{ $_opt }}</option> 
                                                    @endif                                                
                                                @endfor
                                                </select>
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div class="row text-left">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-1">
                                            <label> Notes : </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <textarea id="question_{{ $LIST_QUESTION[$_i]['id'] }}_note" name="question_{{ $LIST_QUESTION[$_i]['id'] }}_note" class="form-control question-input" rows="1" placeholder="Notes ...">{{ $SCORE_NOTE[$_i] }}</textarea>
                                            </div>
                                        </div>                                    
                                    </div>   
                                    <hr class="mr-0 mr-bottom-1">                                
                                    <!-- question row end -->
                                @endfor
                                <div class="row text-left">
                                    <div class="col-sm-1 text-center">
                                        <div class="form-group">
                                            <label> 63</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label> Evaluation</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label> Chose an operation style</label>                                        
                                        </div>
                                    </div>
                                    <div class="col-sm-2 ">
                                        <div class="form-group">
                                            <select id="eval_scoreP" name="eval_scoreP" class="form-control" >
                                                @foreach ( $SCORE_TYPE as $_i => $val )
                                                    @if ( $_i == $SITE_PROPERTY->eval_scoreP )
                                                        <option selected value="{{ $_i }}" >{{ $val }}</option>
                                                    @else
                                                        <option value="{{ $_i }}" >{{ $val }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select id="eval_scoreM" name="eval_scoreM" class="form-control">
                                                @foreach ( $SCORE_TYPE as $_i => $val )
                                                    @if ( $_i == $SITE_PROPERTY->eval_scoreM )
                                                        <option selected value="{{ $_i }}" >{{ $val }}</option>
                                                    @else
                                                        <option value="{{ $_i }}" >{{ $val }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select id="eval_scoreF" name="eval_scoreF" class="form-control">
                                                @foreach ( $SCORE_TYPE as $_i => $val )
                                                    @if ( $_i == $SITE_PROPERTY->eval_scoreF )
                                                        <option selected value="{{ $_i }}" >{{ $val }}</option>
                                                    @else
                                                        <option value="{{ $_i }}" >{{ $val }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                                    
                                </div> 
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-md-4">
                        <!-- left column -->
                        <div class="">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> Additional Information</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Site Name</label>
                                            <input id="site_name" name="site_name" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->site_name }}" required>
                                        </div>
                                        
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Site Location</label>
                                            <input id="google-autocomplete" name="site_location" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->site_location }}" required>
                                            <input type="hidden" name="site-lat" id="site-lat" value="{{ $SITE_PROPERTY->lat }}">
                                            <input type="hidden" name="site-lng" id="site-lng" value="{{ $SITE_PROPERTY->lng }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Managed by</label>
                                            <input id="site_manager" name="site_manager" type="text" class="form-control" placeholder="Enter ..." value="{{ empty($SITE_PROPERTY->site_manager) ? '' : $SITE_PROPERTY->site_manager }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Property Build Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="property_build_date" name="property_build_date" type="text" class="form-control pull-right datepicker" value="{{ $PROPERTY_DATE['property_build_date'] }}">
                                            </div>
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Date added to Service Task Force</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="date_added_STF" name="date_added_STF" type="text" type="text" class="form-control pull-right datepicker" value="{{ $PROPERTY_DATE['date_added_STF'] }}">
                                            </div>
                                        </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->
                        <div class="">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> Other</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Number of service staff</label>
                                            <input id="num_service_staff" name="num_service_staff" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->num_service_staff }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Number of units</label>
                                            <input id="num_units" name="num_units" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->num_units }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Year Property Acquired</label>
                                            <input id="num_built" name="num_built" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->num_built }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Upload pictures of property</label>
                                            <input type="hidden" name="pic_property_val" value="{{ $SITE_PROPERTY->pic_property }}">                                            
                                            <div class="row image-upload">
                                                <div class="col-sm-6">
                                                    <input id="pic_property" name="pic_property" class="" type="file" onchange="onShowPreviewImage(this)" accept="image/*">          
                                                </div>
                                                <img id="preview_pic_property" src="../storage/{{ $SITE_PROPERTY->pic_property }}" class="img-preview" alt="">       
                                            </div>                           
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Ticket Numbers (last 30days)</label>
                                            <input id="ticket_last30" name="ticket_last30" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->ticket_last30 }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Average ticket closing times (last 30 days Average)</label>
                                            <input id="avgticket_closetime_last30" name="avgticket_closetime_last30" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->avgticket_closetime_last30 }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Call back percentage (last 30days)</label>
                                            <input id="callback_percentage" name="callback_percentage" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->callback_percentage }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Perfect make ready percentage</label>
                                            <input id="ready_percentage" name="ready_percentage" type="text" class="form-control" placeholder="Enter ..." value="{{ $SITE_PROPERTY->ready_percentage }}">
                                        </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->
                        <!--/.col (right) -->
                        <div class="">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> Service Manager Contact Information</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Select User or Create and send Invite</label>
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Name</label>
                                            <input id="servicemng_name" name="servicemng_name" type="text" class="form-control" placeholder="Enter ..." value="<?php echo $MANAGER_SERVICE && $MANAGER_SERVICE->name ? $MANAGER_SERVICE->name : '' ?>">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Email Address</label>
                                            <input id="servicemng_email" name="servicemng_email" type="text" class="form-control" placeholder="Enter ..." value="{{ $MANAGER_SERVICE && $MANAGER_SERVICE->email ? $MANAGER_SERVICE->email : '' }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">                                                
                                            <label> Upload Avatar Picture</label>
                                            <input type="hidden" name="servicemng_avatar_val" value="{{ $MANAGER_SERVICE && $MANAGER_SERVICE->avatar ? $MANAGER_SERVICE->avatar : '' }}">
                                            <div class="row image-upload">
                                                <div class="col-sm-6">
                                                    <input id="servicemng_avatar" name="servicemng_avatar" class="" type="file" onchange="onShowPreviewImage(this)" accept="image/*" value="{{ $MANAGER_SERVICE && $MANAGER_SERVICE->avatar ? $MANAGER_SERVICE->avatar : '' }}">          
                                                </div>
                                                <img id="preview_servicemng_avatar" src="{{ $MANAGER_SERVICE && $MANAGER_SERVICE->avatar ? '../storage/'.$MANAGER_SERVICE->avatar : '' }}" class="img-preview" alt="">       
                                            </div>  
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Phone #</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input id="servicemng_phone" name="servicemng_phone" type="text" class="form-control" data-inputmask='"mask": "(999)999-9999 Ex 9999"' data-mask value="{{ $MANAGER_SERVICE && $MANAGER_SERVICE->phone ? $MANAGER_SERVICE->phone : '' }}">
                                            </div>
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Upload Resume PDF</label>
                                            <input type="hidden" name="servicemng_resume_val" value="{{ $MANAGER_SERVICE && $MANAGER_SERVICE->resume ? $MANAGER_SERVICE->resume : '' }}">
                                            <input id="servicemng_resume" name="servicemng_resume" class="" type="file" accept=".pdf" >
                                        </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->
                        <!--/.col (right) -->
                        <div class="">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> Community Manager Contact Information</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Select User or Create and send Invite</label>
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Name</label>
                                            <input id="communitymng_name" name="communitymng_name" type="text" class="form-control" placeholder="Enter ..." value="{{ $MANAGER_COMMUNITY && $MANAGER_COMMUNITY->name ? $MANAGER_COMMUNITY->name : '' }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Email Address</label>
                                            <input id="communitymng_email" name="communitymng_email" type="text" class="form-control" placeholder="Enter ..." value="{{ $MANAGER_COMMUNITY && $MANAGER_COMMUNITY->email ? $MANAGER_COMMUNITY->email : '' }}" >
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Upload Avatar Picture</label>
                                            <input type="hidden" name="communitymng_avatar_val" value="{{ $MANAGER_COMMUNITY && $MANAGER_COMMUNITY->avatar ? $MANAGER_COMMUNITY->avatar : '' }}">
                                            <div class="row image-upload">
                                                <div class="col-sm-6">
                                                    <input id="communitymng_avatar" name="communitymng_avatar" class="" type="file" onchange="onShowPreviewImage(this)" accept="image/*" value="{{ $MANAGER_COMMUNITY && $MANAGER_COMMUNITY->avatar ? $MANAGER_COMMUNITY->avatar : '' }}">          
                                                </div>
                                                <img id="preview_communitymng_avatar" src="{{ $MANAGER_COMMUNITY && $MANAGER_COMMUNITY->avatar ? '../storage/'.$MANAGER_COMMUNITY->avatar : '' }}" class="img-preview" alt="">       
                                            </div> 
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Phone #</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input id="communitymng_phone" name="communitymng_phone" type="text" class="form-control" data-inputmask='"mask": "(999)999-9999 Ex 9999"' data-mask value="{{ $MANAGER_COMMUNITY && $MANAGER_COMMUNITY->phone ? $MANAGER_COMMUNITY->phone : '' }}">
                                            </div>    
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Upload Resume PDF</label>
                                            <input type="hidden" name="communitymng_resume_val" value="{{ $MANAGER_COMMUNITY && $MANAGER_COMMUNITY->resume ? $MANAGER_COMMUNITY->resume : '' }}">
                                            <input id="communitymng_resume" name="communitymng_resume" class="" type="file" accept=".pdf">
                                        </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->
                        <!--/.col (right) -->
                        <div class="">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> Regional Manager Information FYI</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Select User or Create and send Invite</label>
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Name</label>
                                            <input id="reginalmng_name" name="reginalmng_name" type="text" class="form-control" placeholder="Enter ..." value="{{ $MANAGER_REGINAL->name }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Email Address</label>
                                            <input id="reginalmng_email" name="reginalmng_email" type="text" class="form-control" placeholder="Enter ..." value="{{ $MANAGER_REGINAL->email }}">
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Upload Avatar Picture</label>
                                            <input type="hidden" name="reginalmng_avatar_val" value="{{ $MANAGER_REGINAL->avatar }}">
                                            <div class="row image-upload">
                                                <div class="col-sm-6">
                                                    <input id="reginalmng_avatar" name="reginalmng_avatar" class="" type="file" onchange="onShowPreviewImage(this)" accept="image/*" value="{{ $MANAGER_REGINAL->avatar }}">          
                                                </div>
                                                <img id="preview_reginalmng_avatar" src="../storage/{{ $MANAGER_REGINAL->avatar }}" class="img-preview" alt="">       
                                            </div> 
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Phone #</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input id="reginalmng_phone" name="reginalmng_phone" type="text" class="form-control" data-inputmask='"mask": "(999)999-9999 Ex 9999"' data-mask value="{{ $MANAGER_REGINAL->phone }}">
                                            </div>    
                                        </div>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label> Upload Resume PDF</label>
                                            <input type="hidden" name="reginalmng_resume_val" value="{{ $MANAGER_REGINAL->resume }}">
                                            <input id="reginalmng_resume" name="reginalmng_resume" class="" type="file" accept=".pdf">
                                        </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->     
                    </div>
                    <!--/.col (right) -->                    
                </form>
                <div class="col-md-4">
                        <!--/.col (right) -->
                        <div class="">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> Image Gallery Upload</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <div class="form-group">
                                            <label> Before</label>
                                        </div>
                                        <!-- upload Images -->
                                        <div id="gallery_before">
                                            <form id="form_gallery_before_upload" action="/ajax_gallery_upload" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_files">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <input id="gallery_before_files" type="file" onchange="onUploadBefore()" accept="image/*" multiple>
                                                    </div>
                                                </div>
                                            </form>                                            
                                            <div class="row mr-2">
                                                <div class="col-sm-12">
                                                    <ul id="gallery_before_pan" class="gallery_pan">
                                                          @foreach ( $GALLERY_BEFORE as $val )
                                                            @if ( $val )
                                                                <a class="gallery-item">
                                                                    <img class="gallery-pan-item" src="../storage/{{ $val }}">         
                                                                    <i value="{{ $val }}" class="fa fa-close" onclick="onRemoveGallery_before(this)"></i>                                                                                                                                  
                                                                </a>                                            
                                                            @endif
                                                          @endforeach                                                      
                                                    </ul>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label> After</label>
                                        </div>
                                        <div id="gallery_after">
                                            <form id="form_gallery_after_upload" action="/ajax_gallery_upload" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_files">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <input id="gallery_after_files" type="file" onchange="onUploadAfter()" accept="image/*" multiple>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row mr-2">
                                                <div class="col-sm-12">
                                                    <ul id="gallery_after_pan" class="gallery_pan">
                                                        @foreach ( $GALLERY_AFTER as $val )
                                                            @if ( $val )
                                                                <a class="gallery-item">
                                                                    <img class="gallery-pan-item" src="../storage/{{ $val }}">
                                                                    <i value="{{ $val }}" class="fa fa-close" onclick="onRemoveGallery_after(this)"></i>
                                                                </a>                                                                
                                                            @endif
                                                        @endforeach                                                                                                                 
                                                    </ul>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <!-- upload Images end -->
                                        
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->  
                    </div>
            </div>
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.1
        </div>
        <strong>Copyright &copy; 2019 <a href="http://frontpage.servicetaskforce.com/" target="blank">Service Task
                Force</a>.</strong> All rights reserved.
    </footer>

</div>
@endsection

@push('scripts')
<script type='text/javascript' src="//maps.googleapis.com/maps/api/js?key=<?php echo config('app.map')?>&libraries=places"></script>
<script>
    
$(function() {   
    var input = document.getElementById('google-autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function(){
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }
        $('#site-lat').val(place.geometry.location.lat());
        $('#site-lng').val(place.geometry.location.lng());
    });
    
    $('[data-mask]').inputmask()  
    var date = new Date();

    $('.datepicker').datepicker({
      autoclose: true,
      format:'mm/dd/yyyy',
    });
    // $('.datepicker').setDate(date);
    $('.question-input').on('input', function(){
        $(this).outerHeight(20).outerHeight(this.scrollHeight + 5);
    })
    $('.question-input').trigger('input');
});
$('#form_gallery_before_upload').on('submit', function(event){
    event.preventDefault();
    var formData = new FormData(this);    
    var file = document.getElementById('gallery_before_files').files;
    for ( var _i = 0; _i < file.length; _i ++ ) {
        var val_name = 'file_' + _i;
        var file_name = 'filename_' + _i;
        formData.append(val_name, file[_i]);
        formData.append(file_name, file[_i]['name']);
    }
    formData.append('gallery_cat', 'before');
    formData.append('file_count', _i);
    formData.append('_token', '{{ csrf_token() }}');
    $.ajax({
    url:"{{ url('ajax_gallery_upload') }}",
    method:"POST",
    data:formData,
    dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success:function(data)
    {

        $('input[name="gallery_before_uploaded"]').val( $('input[name="gallery_before_uploaded"]').val() + ',' + data );        
        for ( var i = 0; i < data.length; i ++ ) {
            var image = '<a class="gallery-item"><img class="gallery-pan-item" src="../storage/'+ data[i] +'"><i value="'+ data[i] +'" class="fa fa-close" onclick="onRemoveGallery_before(this)"></i></a>';
            $('#gallery_before_pan').append(image);
        }
    }
    })  
});
$('#form_gallery_after_upload').on('submit', function(event){
    event.preventDefault();
    var formData = new FormData(this);    
    var file = document.getElementById('gallery_after_files').files;
    for ( var _i = 0; _i < file.length; _i ++ ) {
        var val_name = 'file_' + _i;
        var file_name = 'filename_' + _i;
        formData.append(val_name, file[_i]);
        formData.append(file_name, file[_i]['name']);
    }
    formData.append('gallery_cat', 'after');
    formData.append('file_count', _i);
    $.ajax({
    url:"{{ url('ajax_gallery_upload') }}",
    method:"POST",
    data:formData,
    dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success:function(data)
    {
        $('input[name="gallery_after_uploaded"]').val( $('input[name="gallery_after_uploaded"]').val() + ',' + data );        
        for ( var i = 0; i < data.length; i ++ ) {
            var image = '<a class="gallery-item"><img class="gallery-pan-item" src="../storage/'+ data[i] +'"><i value="'+ data[i] +'" class="fa fa-close" onclick="onRemoveGallery_after(this)"></i></a>';
            $('#gallery_after_pan').append(image);
        }
    }
    })  
});
function onUploadBefore() {
    $('#form_gallery_before_upload').submit();
}
function onUploadAfter() {
    $('#form_gallery_after_upload').submit();
}
function onRemoveGallery_before(element) {
    element.parentElement.setAttribute('hidden', true);    
    $('input[name="gallery_before_uploaded"]').val( $('input[name="gallery_before_uploaded"]').val().replace(element.getAttribute("value"), '') );
}
function onRemoveGallery_after(element) {
    element.parentElement.setAttribute('hidden', true);    
    $('input[name="gallery_after_uploaded"]').val( $('input[name="gallery_after_uploaded"]').val().replace(element.getAttribute("value"), '') );
}
function onShowPreviewImage(element) {
    readURL(element)
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview_' + $(input).attr('id') ).attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush