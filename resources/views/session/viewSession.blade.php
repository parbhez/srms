@extends('dashboard')
@section('title','AddClass')
@section('header-title')
  <h1>
        View Session
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Session</li>
      </ol>
@endsection    
@section('content')
            <div class="box-header"><br>
              <h3 class="box-title">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No</th>
                  <th>Session Name</th>
                  <th>Session Start</th>
                  <th>Session End</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($sessions as $session)
                <tr>
                  <td class="center">{{$session->session_id}}</td>
                  <td>{{$session->session_name}}</td>
                  <td>{{$session->session_start_date}}</td>
                  <td>{{$session->session_end_date}}</td>
                    <td>
                          <a class="btn btn-info btn-sm" href="#">
                            <i class="fa fa-edit">Edit</i>  
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                            <i class="fa fa-trash">Delete</i> 
                          </a>
                    </td>
                </tr>
               @endforeach 
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial No</th>
                  <th>Session Name</th>
                  <th>Session Start</th>
                  <th>Session End</th>
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
