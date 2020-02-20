@extends('admin.app')

@section('page-css')    
    <link rel="stylesheet" href="../assets/admin/bower_components/select2/dist/css/select2.css">
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
                <li class="">
                    <a href="/admin/sitemanage">
                        <i class="fa fa-cog"></i><span>Site Management</span>
                    </a>
                </li>
                <li class="">
                    <a href="/admin/taskmanagement">
                        <i class="fa fa-tasks"></i><span>Task Management</span>
                    </a>
                </li>
                <li class="active">
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
                User Management
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> User Management</a></li>
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
                        <h3 class="box-title">Registered Users</h3>
                        <button class="btn btn-action btn-danger" style="float:right; margin-right: 10px;" onclick="onAdd()"><i class="fa fa-user"></i> Add New User</button>
                        </div>
                        <!-- /.box-header -->
                            <div class="box-body">
                                <table id="sitelist" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile Image</th>
                                            <th> Name</th>
                                            <th> Email Address</th>
                                            <th> Phone Number</th>
                                            <th> Resume</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $USERLIST as $_i => $val )
                                            <tr>
                                                <th>{{ $_i + 1 }}</th>
                                                <th>
                                                    @if ( $val->avatar )
                                                        <img src="../storage/{{ $val->avatar }}" class="img-circle" alt="" width="40" height="40">
                                                    @else
                                                        <img src="../assets/images/users/avatar.png" class="img-circle" alt="" width="40" height="40">
                                                    @endif
                                                </th>
                                                <th>{{ $val->name }}</th>
                                                <th>{{ $val->email }}</th>
                                                <th>{{ $val->phone }}</th>
                                                <th>
                                                    @if ( $val->resume )
                                                        <a href="/storage/{{ $val->resume }}" target="blank"><i class="fa fa-file-pdf-o text-black"></i></a>
                                                    @endif
                                                </th>
                                                <th>
                                                    <a href="#" onclick="onEdit({{ $val->id }})" class="btn btn-success btn-action"> Edit</a>
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

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 id="title_edit" class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <form action="/saveuser" id="form_user" method="POST" enctype='multipart/form-data'>                
                    <input id="user_id" name="user_id"  type="hidden" />
                    <input name="_token" type="hidden" value=""/>   
                    <input type="hidden" name="is_edit">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Name</label>            
                            <input id="user_name" name="user_name" type="text" class="form-control" placeholder="Enter ...">        
                        </div>
                    </div>        
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Email Address</label>            
                            <input id="user_email" name="user_email" type="text" class="form-control" placeholder="Enter ...">        
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Phone Number</label>            
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input id="user_phone" name="user_phone" type="text" class="form-control" data-inputmask='"mask": "999-999-9999"' data-mask>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Profile Image</label> 
                            <input type="hidden" name="user_profileImage">           
                            <input id="user_avatar" name="user_avatar" type="file" class="form-control" placeholder="Enter ..." accept="image/*">  
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Resume PDF</label> 
                            <input type="hidden" name="user_resumePdf">           
                            <input id="user_resume" name="user_resume" type="file" class="form-control" placeholder="Enter ..." accept=".pdf">  
                        </div>
                    </div>
                    <div class="col-sm-6 user-password">
                        <div class="form-group">
                            <label for="">Password</label> 
                            <input type="hidden" name="user_profileImage">           
                            <input id="user_password" name="user_password" type="text" class="form-control" placeholder="Enter ...">  
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Dashboard Access</label>       
                            <input name="user_site_ids" type="hidden" value="">     
                            <select name="user_site" id="user_site" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            
                            </select>                               
                        </div>
                    </div>
                </form>
            </div>            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="onSave()">Save changes</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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

$(function() {    
    $('.select2').select2()  
    $('[data-mask]').inputmask()          
});
function onAdd() {
    document.getElementById('form_user').reset();
    $('.user-password').css('display', 'block');
    $('#user_site').empty(); 
    @foreach ( $SITELIST as $_i => $val )
        $('#user_site').append('<option value="{{ $val->id }}">{{ $val->site_name }}</option>');
    @endforeach
    $('input[name="is_edit"]').val('add');
    $('input[name="_token"]').val('{{ csrf_token() }}');
    $('#modal-edit').modal('show');
    $('#title_edit').text('Add User');    
}
function onEdit(user_id) {
    document.getElementById('form_user').reset();
    $('.user-password').css('display', 'none');
    $('input[name="is_edit"]').val('edit');
    getUserPropertiesByUserID(user_id);
    $('input[name="_token"]').val('{{ csrf_token() }}');
    $('#modal-edit').modal('show');
    $('#title_edit').text('Edit User');    
}
function onDelete(id) {   
    $('#delete_id').val(id);
    $('#modal-delete').modal('show');
    $('#title_delete').text('Are you sure delete this user?'); 
}
function ajax_delete() {
    var id = $('#delete_id').val();
    $.ajax({
        url : '/deleteuser',
        type : "POST",
        dataType : "JSON",
        data : { '_token' : '{{ csrf_token() }}', 'id' : id },
        success : function(data) {
            location.reload();       
        },
        error : function(jqXHR, textStatus, errorThrown) {
            alert(jqXHR + textStatus + errorThrown);
        }
    });
}
function onSave() {        
    $('#modal-edit').modal('hide');
    var user_site = $('select[name="user_site"]').val();
    $('input[name="user_site_ids"]').val(user_site);
    $('#form_user').submit();        
}
function getUserPropertiesByUserID(id) {    
    $.ajax({
        url : '/edituser',
        type : "POST",
        dataType : "JSON",
        data : { '_token' : '{{ csrf_token() }}', 'id' : id },
        success : function(data) {
            console.log(data['site_list']);
            $('input[name="user_id"]').val(data['id']);
            $('input[name="user_name"]').val(data['name']);
            $('input[name="user_email"]').val(data['email']);    
            $('input[name="user_profileImage"]').val(data['avatar']);   
            $('input[name="user_resumePdf"]').val(data['resume'])
            $('input[name="user_phone"]').val(data['phone']);
            $('#user_site').empty();                  
            @foreach ( $SITELIST as $_i => $val )
                var is_showed = 0;
                data['site_list'].forEach(function(element){
                    if ( element['id'] == {{ $val->id }} ) {
                        $('#user_site').append('<option selected value="{{ $val->id }}">{{ $val->site_name }}</option>'); 
                        is_showed ++;
                    }
                });   
                if ( is_showed == 0 ){
                    $('#user_site').append('<option value="{{ $val->id }}">{{ $val->site_name }}</option>');
                }
            @endforeach
        },
        error : function(jqXHR, textStatus, errorThrown) {
            alert(jqXHR + textStatus + errorThrown);
        }
    });   
}
</script>
@endpush