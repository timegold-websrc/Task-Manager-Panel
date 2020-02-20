@extends('admin.app')

@section('page-css')    
<link rel="stylesheet" href="../assets/admin/bower_components/select2/dist/css/select2.css">
    <style>
    .btn-action {
        padding: 0 !important;
        height: 25px;
        padding-left: 16px !important;
        padding-right: 16px !important;
    }
    tbody th {
        font-weight: normal !important;
    }
    .select2-selection__choice__remove {
        float: right;
        margin: 1px;
        margin-left: 5px;
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
                <li class="">
                    <a href="/admin/sitemanage">
                        <i class="fa fa-cog"></i><span>Site Management</span>
                    </a>
                </li>
                <li class="active">
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
                Task Management
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Task Management</a></li>
                <li class="">Dashboard</li>
            </ol>
        </section>
        <div class="divider"></div>
        <!-- Main content -->
        <section class="content">
            <div id="task-manager">
                    @csrf
                <div class="row">
                    <div class="col-sm-10">
                        <div class="filter-wrapper">
                            <div><span>Filter:</span></div>
                            <ul class="filter-group">
                                <li class="dropdown">
                                    @if ( $FILTERTYPE == 'date' )
                                        <a href="#" class="filter-type active" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-calendar"></i><span>By date</span></a>
                                    @else
                                        <a href="#" class="filter-type" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-calendar"></i><span>By date</span></a>
                                    @endif
                                    
                                    <div class="dropdown-menu">
                                        <a href="#" class="filter-item dropdown-item" filter-val="all">Show all</a>
                                        <div class="divider"></div>
                                        @if ($FILTERVAL == 'today')
                                            <a href="#" class="filter-item dropdown-item active" filter-type="date" filter-val="today">Today</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="date" filter-val="today">Today</a>
                                        @endif
                                        
                                        @if ($FILTERVAL == 'yesterday')
                                            <a href="#" class="filter-item dropdown-item active" filter-type="date" filter-val="yesterday">Yesterday</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="date" filter-val="yesterday">Yesterday</a>
                                        @endif
                                        
                                        @if ($FILTERVAL == 'week')
                                            <a href="#" class="filter-item dropdown-item active" filter-type="date" filter-val="week">This week</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="date" filter-val="week">This week</a>
                                        @endif
                                        
                                        @if ($FILTERVAL == 'month')
                                            <a href="#" class="filter-item dropdown-item active" filter-type="date" filter-val="month">This month</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="date" filter-val="month">This month</a>
                                        @endif
                                        
                                        @if ($FILTERVAL == 'year')
                                            <a href="#" class="filter-item dropdown-item active" filter-type="date" filter-val="year">This year</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="date" filter-val="year">This year</a>
                                        @endif
                                    </div>
                                </li>
                                <li class="dropdown">
                                    @if ( $FILTERTYPE == 'status' )
                                        <a href="#" class="filter-type active" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bar-chart"></i><span>By status</span></a>
                                    @else
                                        <a href="#" class="filter-type" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bar-chart"></i><span>By status</span></a>
                                    @endif
                                    
                                    <div class="dropdown-menu">
                                        <a href="#" class="filter-item dropdown-item" filter-val="all">Show all</a>
                                        <div class="divider"></div>
                                        @if ($FILTERTYPE == 'status' && $FILTERVAL == 0)
                                            <a href="#" class="filter-item dropdown-item active" filter-type="status" filter-val="0">Not Yet Started</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="status" filter-val="0">Not Yet Started</a>
                                        @endif
                                        
                                        @if ($FILTERTYPE == 'status' && $FILTERVAL == 1)
                                            <a href="#" class="filter-item dropdown-item active" filter-type="status" filter-val="1">In Porgress</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="status" filter-val="1">In Porgress</a>
                                        @endif
                                        
                                        @if ($FILTERTYPE == 'status' && $FILTERVAL == 2)
                                            <a href="#" class="filter-item dropdown-item active" filter-type="status" filter-val="2">Completed</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="status" filter-val="2">Completed</a>
                                        @endif
                                        
                                        <div class="divider"></div>
                                        @if ($FILTERTYPE == 'status' && $FILTERVAL == 3)
                                            <a href="#" class="filter-item dropdown-item active" filter-type="status" filter-val="3">Past</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="status" filter-val="3">Past</a>
                                        @endif
                                    </div>
                                </li>
                                <li class="dropdown">
                                    @if ( $FILTERTYPE == 'priority' )
                                        <a href="#" class="filter-type active" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-level-up"></i><span>By priority</span></a>
                                    @else
                                        <a href="#" class="filter-type" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-level-up"></i><span>By priority</span></a>
                                    @endif
                                    
                                    <div class="dropdown-menu">
                                        <a href="#" class="filter-item dropdown-item" filter-val="all">Show all</a>
                                        <div class="divider"></div>
                                        @if ($FILTERVAL == 'high')
                                            <a href="#" class="filter-item dropdown-item active" filter-type="priority" filter-val="high">High</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="priority" filter-val="high">High</a>
                                        @endif
                                        
                                        @if ($FILTERVAL == 'medium')
                                            <a href="#" class="filter-item dropdown-item active" filter-type="priority" filter-val="medium">Medium</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="priority" filter-val="medium">Medium</a>
                                        @endif
                                        
                                        @if ($FILTERVAL == 'low')
                                            <a href="#" class="filter-item dropdown-item active" filter-type="priority" filter-val="low">Low</a>
                                        @else
                                            <a href="#" class="filter-item dropdown-item" filter-type="priority" filter-val="low">Low</a>
                                        @endif
                                        
                                    </div>
                                </li>
                                <li class="dropdown">
                                    @if ( $FILTERTYPE == 'location' )
                                        <a href="#" class="filter-type active" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-globe"></i><span>By location</span></a>
                                    @else
                                        <a href="#" class="filter-type" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-globe"></i><span>By location</span></a>
                                    @endif
                                    
                                    <div class="dropdown-menu">
                                        <a href="#" class="filter-item dropdown-item" filter-val="all">Show all</a>
                                        <div class="divider"></div>
                                        @foreach ( $LOCATIONS as $_i => $loc )
                                            @if ($FILTERVAL == $loc)
                                                <a href="#" class="filter-item dropdown-item active" style="white-space: nowrap" filter-type="location" filter-val="{{ $loc }}">{{$loc}}</a>
                                            @else
                                                <a href="#" class="filter-item dropdown-item" style="white-space: nowrap" filter-type="location" filter-val="{{ $loc }}">{{ $loc }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            @foreach ( $TASKLIST as $_i => $val )
                                <div class="task-card-item col-sm-6">
    
                                    <div class="card mt-4 mb-4">
                                        <div class="card-body">
                                            <div class="d-flex items-center">
                                                <div class="task-content">
                                                    <h4><a href="/admin/tasks?id={{$val->site_id}}">{{$val->head}}</a></h4>
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="{{$val->description}}">
                                                        <p class="task-desc">{{$val->description}}</p>
                                                    </a>
                                                </div>
    
                                                <ul class="list list-unstyled mb-0 ml-auto">
                                                    <li><span class="ul-task-manager__font-date text-muted">{{$val->datedue}}</span></li>
                                                    <li class="mt-2">
                                                        @if ( $val->status == 1 )
                                                            @if ( $val->daydue <= 7 && $val->daydue >= 0 )
                                                                <span class="task-status status-warning">Due Now</span>
                                                            @elseif ( $val->daydue < 0 )
                                                                <span class="task-status status-danger">Past Due</span>
                                                            @else
                                                                <span class="task-status status-progress">In Progress</span>
                                                            @endif
                                                        @elseif ( $val->status == 2 )
                                                            <span class="task-status status-success">Completed</span>
                                                        @else
                                                            @if ( $val->daydue <= 7 && $val->daydue >= 0 )
                                                                <span class="task-status status-warning">Due Now</span>
                                                            @elseif ( $val->daydue < 0 )
                                                                <span class="task-status status-danger">Past Due</span>
                                                            @else
                                                                <span class="task-status status-primary">Not Started</span>
                                                            @endif                                                        
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <div style="min-height: 36px">
                                                @if ( count($val->users) )
                                                    @foreach ( $val->users as $_j => $user )
                                                        @if ( $user->avatar )
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="{{$user['name']}}">
                                                                <img src="../storage/{{ $user['avatar'] }}" class="img-circle" width="36" height="36" alt="corrupted">
                                                            </a>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                @endif
                                                
                                                <!--<a href="" class="btn btn-icon bg-transparent border-slate-300 text-slate rounded-round border-dashed"><i class="icon-plus22"></i></a>-->
                                            </div>
                                            <div class="mt-3">
                                                <span class="mr-2">SITE:</span>
                                                <span>{{$val->site}}</span>
                                            </div>
                                        </div>
    
                                        <div class="card-footer d-flex justify-between items-center">
                                            <span>Due: <span class="font-weight-semibold">
                                                @if ( $val->status == 1 )
                                                    @if ( $val->daydue <= 7 && $val->daydue >= 0 )
                                                        {{$val->daydue}} days
                                                    @elseif ( $val->daydue < 0 )
                                                        {{-$val->daydue}} days ago
                                                    @else
                                                        {{$val->daydue}} days
                                                    @endif
                                                @elseif ( $val->status == 2 )
                                                    @if ( $val->daydue < 0 )
                                                        {{-$val->daydue}} days ago
                                                    @else
                                                        {{$val->daydue}} days
                                                    @endif 
                                                    <!--{{$val->daydue}} days ago-->
                                                @else
                                                    @if ( $val->daydue <= 7 && $val->daydue >= 0 )
                                                        {{$val->daydue}} days
                                                    @elseif ( $val->daydue < 0 )
                                                        {{-$val->daydue}} days ago
                                                    @else
                                                        {{$val->daydue}} days
                                                    @endif                                                        
                                                @endif
                                            </span></span>
                                            <span onclick="onTaskEdit({{$val->id}})" class="btn btn-success btn-action"> Edit</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row justify-center mt-4">

                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    @if($PAGENATION['from'] > 1)
                                        <li class="page-item" val="{{$PAGENATION['from'] - 1}}"><a class="page-link" href="#">Previous</a></li>
                                    @else
                                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                    @endif
                                    
                                    @for($_i = $PAGENATION['from']; $_i <= $PAGENATION['to']; $_i++)
                                        @if($PAGENATION['page'] == $_i)
                                            <li class="page-item active" val="{{$_i}}"><a class="page-link" href="#">{{$_i}}</a></li>
                                        @else
                                            <li class="page-item" val="{{$_i}}"><a class="page-link" href="#">{{$_i}}</a></li>
                                        @endif
                                    @endfor
                                    
                                    @if($TOTAL > $PAGENATION['to']*10)
                                        <li class=""><a class="page-link" href="#">...</a></li>
                                        <li class="page-item" val="{{$PAGENATION['to'] + 1}}"><a class="page-link" href="#">Next</a></li>
                                    @else
                                        <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                                    @endif
                                    
                                </ul>
                            </nav>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card mt-4 mb-4">
                            <div class="card-header">Search Task</div>
                            <div class="card-body" id="custom-toggle">
                                <input id="search-task" type="text" placeholder="type  &amp;  hit enter" class="form-control" value="{{$SEARCH}}">
                            </div>
                        </div>
                        <div class="card mt-4 mb-4">
                            <div class="card-header">Task Navigation</div>
                            <div class="card-body" id="custom-toggle">
                                <div class="list-group">
                                    @if($STATUS == -1)
                                        <a href="#" class="list-group-item list-group-item-action active" onClick="task_navigate(-1)"><i class="fa fa-files-o" aria-hidden="true"></i>All Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(0)"><i class="fa fa-file-o"> </i> InActive Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(1)"><i class="fa fa-file-o"> </i> Active Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(2)"><i class="fa fa-file-archive-o"> </i> Closed Tasks</a>
                                    @elseif($STATUS == 0) 
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(-1)"><i class="fa fa-files-o" aria-hidden="true"></i>All Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action active" onClick="task_navigate(0)"><i class="fa fa-file-o"> </i> InActive Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(1)"><i class="fa fa-file-o"> </i> Active Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(2)"><i class="fa fa-file-archive-o"> </i> Closed Tasks</a>
                                    @elseif($STATUS == 1)
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(-1)"><i class="fa fa-files-o" aria-hidden="true"></i>All Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(0)"><i class="fa fa-file-o"> </i> InActive Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action active" onClick="task_navigate(1)"><i class="fa fa-file-o"> </i> Active Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(2)"><i class="fa fa-file-archive-o"> </i> Closed Tasks</a>
                                    @elseif($STATUS == 2)
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(-1)"><i class="fa fa-files-o" aria-hidden="true"></i>All Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(0)"><i class="fa fa-file-o"> </i> InActive Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action" onClick="task_navigate(1)"><i class="fa fa-file-o"> </i> Active Tasks</a>
                                        <a href="#" class="list-group-item list-group-item-action active" onClick="task_navigate(2)"><i class="fa fa-file-archive-o"> </i> Closed Tasks</a>
                                    @endif
                                    
                                    <input id="task-status" type="text" value="{{$STATUS}}" hidden>
                                    <input id="task-filter-type" type="text" value="{{$FILTERTYPE}}" hidden>
                                    <input id="task-filter-val" type="text" value="{{$FILTERVAL}}" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
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
//// Edit Modal ///
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 id="title_edit" class="modal-title">Edit Task</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action="/save_task" id="form_task" method="POST" enctype='multipart/form-data'>                
                    <input id="task_id" name="task_id"  type="hidden" />
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>   
                    <input name="is_edit" type="hidden" value="edit"/>   
                    <input id="site_id" name="site_id" type="hidden"/>   
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> Task Description / Head</label>            
                            <input id="task_head" name="task_head" type="text" class="form-control" placeholder="Enter ...">        
                        </div>
                    </div>        
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> Task Description / Description</label>            
                            <input id="task_description" name="task_description" type="text" class="form-control" placeholder="Enter ...">        
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> Status</label>            
                            <select name="task_status" id="task_status" class="form-control" >
                                <option value="0">Not Yet Started</option>
                                <option value="1">In Progress</option>
                                <option value="2">Completed</option>
                            </select>       
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> Due Date</label>            
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="task_datedue" name="task_datedue" type="text" class="form-control pull-right datepicker">
                            </div>    
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group d-flex">
                            <label for="">Priority&nbsp;&nbsp;&nbsp;</label>
                            <div class="d-flex mr-2">
                                <input type="radio" name="priority" value="high">
                                <span for="">&nbsp;high</span>    
                            </div>
                            <div class="d-flex mr-2">
                                <input type="radio" name="priority" checked value="medium">
                                <span for="">&nbsp;medium</span>    
                            </div>
                            <div class="d-flex mr-2">
                                <input type="radio" name="priority" value="low">
                                <span for="">&nbsp;low</span>    
                            </div>
                        </div>        
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Assign User</label>       
                            <!-- <input name="task_assignuser_ids" type="hidden" value="">      -->
                            <select name="task_assignuser[]" id="task_assignuser" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                @foreach ( $USERLIST as $_i => $val )
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
                            </select>                               
                        </div>
                    </div>
                </form>
            </div>            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="onSaveTask()">Save changes</button>
        </div>
    </div>
    </div>
</div>

//// Delete Modal ////
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 id="title_delete" class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="delete_id">                       
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="ajax_delete()">Delete</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@push('scripts')
<script src="../assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    $(document).ready(function(){
        $("#search-task").keypress(function (e) {
            if (e.which == 13){
              reloadTaskManager();
            }
        });
        
        $(".filter-item").click(function(){
            var filterVal = $(this).attr('filter-val');
            var filterType = $(this).attr('filter-type');
            
            if(filterVal == 'all'){
                $("#task-filter-type").val('');
                $("#task-filter-val").val('');
            }else{
                $("#task-filter-type").val(filterType);
                $("#task-filter-val").val(filterVal);
            }
            
            reloadTaskManager();
        });
        
        $('.page-item').click(function(){
            var targetpage = $(this).attr('val');
            
            if(!targetpage) return;
            reloadTaskManager(targetpage);
        });
        
        $('.select2').select2()  
        $('[data-mask]').inputmask()  
        $('.datepicker').datepicker({
            autoclose: true,
            format:'mm/dd/yyyy',
        });
    });
    function task_navigate(state){
        $('#task-status').val(state);
        reloadTaskManager();
    }
    
    function reloadTaskManager(page){
        var state = $('#task-status').val();
        var search = $('#search-task').val();
        var filterType = $('#task-filter-type').val();
        var filterVal = $('#task-filter-val').val();
        
        var _url = '/admin/taskmanagement?';
        if(state >= 0) _url += 'state='+state;
        if(search.length) _url += '&search='+search;
        if(filterVal) _url += '&ftype='+filterType+'&fval='+filterVal;
        if(page) _url += '&page='+page;
        
        if(_url.slice(-1) == '?') _url = _url.slice(0, -1);
        document.location = _url;
    }
$(function() {    
    
});
function onDelete(id) {
    $('#delete_id').val(id);
    $('#modal-delete').modal('show');
    $('#title_delete').text('Are you sure delete this site?');    
}
function ajax_delete() {
    var id = $('#delete_id').val();
    document.location = '/admin/delete?id=' + id;
}

function onTaskEdit(id){
    console.log(id);
    document.getElementById('form_task').reset()
    // $('input[name="is_edit"]').val('edit')
    
    getTaskPropertiesByID(id)
    $('#modal-edit').modal('show');
}

function getTaskPropertiesByID(id) {
    var _assignedUserList = [];
    @foreach ($TASKLIST as $_task)
        if( {{ $_task->id }} == id ){
            $('input[name="task_id"]').val({{ $_task->id }});
            $('input[name="task_head"]').val("{{ $_task->head }}");
            $('input[name="task_description"]').val("{{ $_task->description }}");
            $('#task_status').val({{ $_task->status}});
            $('#task_datedue').val("{{ $_task['datedue'] }}");
            $('#site_id').val({{$_task->site_id}});
            
            @if( empty($_task->priority) )
                $(":radio[name='priority'][value='medium']").attr('checked', 'checked');
            @else
                $(":radio[name='priority'][value='{{$_task->priority}}']").attr('checked', 'checked');
            @endif
            
            @foreach ($_task->users as $_user)
                _assignedUserList.push({{ $_user->id }});
            @endforeach
        }
    @endforeach

    // if(!_assignedUserList.length) return;
    $('#task_assignuser').empty();
    @foreach ( $USERLIST as $_i => $val )
        if(_assignedUserList.includes( {{ $val->id }} )){
            $('#task_assignuser').append('<option selected value="{{ $val->id }}">{{ $val->name }}</option>'); 
        }else{
            $('#task_assignuser').append('<option value="{{ $val->id }}">{{ $val->name }}</option>');
        }
    @endforeach
}
function onSaveTask() {
    $('#modal-edit').modal('hide')
    $.ajax({
        url : '/ajax_saveTask',
        type : "POST",
        dataType : "JSON",
        data : $('#form_task').serialize(),
        success : function(result) {
            location.reload()
        },
        error : function(jqXHR, textStatus, errorThrown) {
            alert(jqXHR + textStatus + errorThrown);
        }
    });
}
</script>
@endpush