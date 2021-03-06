@extends('dashboard')
@section('title','AddClass')
@section('header-title')
  <h1>
        View Class
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View class</li>
      </ol>
@endsection    
@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No</th>
                  <th>Class Name</th>
                  <th>Section Name</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($allClass as $class)
                <tr>
                  <td class="center">{{$class->class_id}}</td>
                  <td>{{$class->class_name}}</td>
                  <td>{{$class->class_section}}</td>
                  <td>{{$class->created_at}}</td>
                  <td class="center">
                  <span class="label label-success">Active</span>
                </td>
                    <td class="center">
                        <a class="btn btn-success btn-sm" href="#">
                          <i class="halflings-icon white zoom-in">status</i>  
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                          <i class="halflings-icon white edit">Edit</i>  
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                          <i class="halflings-icon white trash">Delete</i> 
                        </a>
                    </td>
                </tr>
               @endforeach 
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial No</th>
                  <th>Class Name</th>
                  <th>Section Name</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  <!-- DataTables -->
  <script type="text/javascript">
    $('#example1').DataTable();   
</script>
@endsection

