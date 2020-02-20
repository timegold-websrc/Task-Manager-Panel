@extends('admin.app')

@section('page-css')    
    <style>
    .btn-action {
        padding: 0 !important;
        height: 25px;
        padding-left: 5px !important;
        padding-right: 5px !important;
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
                Site Management
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Site Management</a></li>
                <li class="">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row br-4">
                    @csrf
                    <!-- table -->
                    <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                        <h3 class="box-title">Registered Sites</h3>
                        </div>
                        <!-- /.box-header -->
                            <div class="box-body">
                                <table id="sitelist" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Site Name</th>
                                            <th>Site Location</th>
                                            <th>Property Build Date</th>
                                            <th>Date added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $SITELIST as $_i => $val )
                                            <tr>
                                                <th>{{ $_i + 1 }}</th>
                                                <th>{{ $val->site_name }}</th>
                                                <th>{{ $val->site_location }}</th>
                                                <th>{{ $DATE_LIST[$_i]['property_build_date'] }}</th>
                                                <th>{{ $DATE_LIST[$_i]['date_added_STF'] }}</th>
                                                <th>
                                                <a href="/admin/edit?id={{$val->id}}" class="btn btn-success btn-action"> Edit</a>
                                                <a href="/admin/tasks?id={{$val->id}}" class="btn btn-info btn-action"> Task Management</a>
                                                <a href="#" onclick="onDelete({{ $val->id }})" class="btn btn-danger btn-action"> Delete</a>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- table end -->
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
<script>

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

</script>
@endpush