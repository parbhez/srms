@extends('dashboard')
@section('title','AddClass')
@section('header-title')
  <h1>
        View studentInfo
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View studentInfo</li>
      </ol>
@endsection    
@section('content')
  <div class="box">
            <div class="box-header"><br>
              <h3 class="box-title">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No</th>
                  <th>Student Name</th>
                  <th>Roll</th>
                  <th>Class Name</th>
                  <th>Section Name</th>
                  <th>Session</th>
                  <th>DOB</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($allStudentinfo as $studentInfo)
                <tr>
                  <td class="center">{{$studentInfo->student_id}}</td>
                  <td>{{$studentInfo->Student_full_name}}</td>
                  <td>{{$studentInfo->student_roll_number}}</td>
                  <td>{{$studentInfo->class_name}}</td>
                  <td>{{$studentInfo->class_section}}</td>
                  <td>{{$studentInfo->session_name}}</td>
                  <td>{{$studentInfo->student_dob}}</td>
                  <td>
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
                  <th>Student Name</th>
                  <th>Roll</th>
                  <th>Class Name</th>
                  <th>Section Name</th>
                  <th>Session</th>
                  <th>DOB</th>
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

