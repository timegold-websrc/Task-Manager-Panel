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
                Task Management
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Task Management</a></li>
                <li class=""><a href="#"><i class="fa fa-dashboard"></i> Site Management</a></li>
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
                        <h3 class="box-title"> {{ $SITE_NAME }}</h3>
                        <button class="btn btn-action btn-danger" style="float:right; margin-right: 10px;" onclick="onAdd()"><i class="fa fa-user"></i> Add New Task</button>
                        </div>
                        <!-- /.box-header -->
                            <div class="box-body">
                                <table id="sitelist" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task Description</th>
                                            <th>Status</th>
                                            <th>Due Date</th>
                                            <th>Assigned User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $TASKLIST as $_i => $val )
                                            <tr>
                                                <th>{{ $_i + 1 }}</th>
                                                <th>
                                                    <span style="font-weight: bold;">{{ $val->head }}</span>
                                                    <br>
                                                    <span>{{ $val->description }}</span>
                                                </th>
                                                <th>
                                                    @if ( $val->status == 1 )
                                                        @if ( $val->daydue <= 7 && $val->daydue >= 0 )
                                                            <span class="status-warning">Due Now</span>
                                                        @elseif ( $val->daydue < 0 )
                                                            <span class="status-danger">Past Due</span>
                                                        @else
                                                            <span class="status-success">In Progress</span>
                                                        @endif
                                                    @elseif ( $val->status == 2 )
                                                        <span class="status-success">Completed</span>
                                                    @else
                                                        @if ( $val->daydue <= 7 && $val->daydue >= 0 )
                                                            <span class="status-warning">Due Now</span>
                                                        @elseif ( $val->daydue < 0 )
                                                            <span class="status-danger">Past Due</span>
                                                        @else
                                                            <span class="status-success">Not Yet Started</span>
                                                        @endif                                                        
                                                    @endif
                                                </th>
                                                <th>{{ $val['datedue'] }}</th>
                                                <th class="text-right">
                                                    @if ( count($val->users) )
                                                        @foreach ( $val->users as $_j => $user )
                                                            @if ( $user->avatar )
                                                                <img src="../storage/{{ $user['avatar'] }}" class="img-circle" alt="" width="40" height="40">
                                                            @else
                                                            @endif
                                                        @endforeach
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
                Froce</a>.</strong> All rights reserved.
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
                <form action="/save_task" id="form_task" method="POST" enctype='multipart/form-data'>                
                    <input id="task_id" name="task_id"  type="hidden" />
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>   
                    <input name="is_edit" type="hidden" value=""/>   
                    <input name="site_id" type="hidden" value="{{ $SITE_ID }}"/>   
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
    var date = new Date();
    $('.select2').select2()  
    $('[data-mask]').inputmask()  
    $('.datepicker').datepicker({
      autoclose: true,
      format:'mm/dd/yyyy',
    });
    // $('.datepicker').setDate(date);
    initModalForm()    
});
$("#modal-edit").on("hidden.bs.modal", function () {
    if ( $('input[name="is_edit"]').val() == 'edit' ) 
        initModalForm()
});
function onAdd() {    
    $('input[name="is_edit"]').val('add')
    $('#title_edit').text('Add New Task')
    $('#modal-edit').modal('show');
}
function onEdit(id) {
    document.getElementById('form_task').reset()
    $('input[name="is_edit"]').val('edit')
    getTaskPropertiesByID(id)
    $('#title_edit').text('Edit Task')
    $('#modal-edit').modal('show');
}
function onDelete(id) {
    $('#delete_id').val(id)
    $('#title_delete').text('Are you sure delete this task?')
    $('#modal-delete').modal('show');
}
function onSave() {
    $('#modal-edit').modal('hide')
    saveTask()
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

    $('#task_assignuser').empty();
    @foreach ( $USERLIST as $_i => $val )
        if(_assignedUserList.includes( {{ $val->id }} )){
            $('#task_assignuser').append('<option selected value="{{ $val->id }}">{{ $val->name }}</option>'); 
        }else{
            $('#task_assignuser').append('<option value="{{ $val->id }}">{{ $val->name }}</option>');
        }
    @endforeach
}
function saveTask() {
    $('#modal-edit').modal('hide');
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
function ajax_delete() {
    var id = $('#delete_id').val()
    $.ajax({
        url : '/ajax_deleteTask',
        type : "POST",
        dataType : "JSON",
        data : { '_token' : '{{ csrf_token() }}', 'id' : id },
        success : function(result) {
            location.reload()
        },
        error : function(jqXHR, textStatus, errorThrown) {
            alert(jqXHR + textStatus + errorThrown);
        }
    }); 
}
function initModalForm() {
    document.getElementById('form_task').reset()
    $('#task_assignuser').empty(); 
    @foreach ( $USERLIST as $_i => $val )
        $('#task_assignuser').append('<option value="{{ $val->id }}">{{ $val->name }}</option>');
    @endforeach
}
</script>
@endpush