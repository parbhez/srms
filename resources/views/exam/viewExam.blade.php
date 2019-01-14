@extends('dashboard')
@section('title','AddClass')
@section('header-title')
  <h1>
        View Exam
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Exam</li>
      </ol>
@endsection    
@section('content')
  <div class="box">
        <div class="col-md-6">
                <p class="alert-success p-4">
                <?php 
                  $message = Session::get('message');
                  if ($message) {
                    echo $message;
                  Session::put('message',null); 
                  }
                 ?>
                 </p>
           </div>
            <div class="box-header"><br>
              <h3 class="box-title">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No</th>
                  <th>Class Name</th>
                  <th>Section Name</th>
                  <th>Exam Name</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($allExam as $exam)
                <tr>
                  <td class="center">{{$exam->exam_id}}</td>
                  <td>{{$exam->class_name}}</td>
                  <td>{{$exam->class_section}}</td>
                  <td>{{$exam->exam_name}}</td>
                  <td>{{$exam->created_at}}</td>
                  @if($exam->publication_status == 1)
                  <td class="center">
                  <span class="label label-success">Active</span>
                </td>
                @else 
                   <td class="center">
                  <span class="label label-danger">Inactive</span>
                </td>
                @endif
                    <td class="center">
                      @if($exam->publication_status == 1)
                        <a class="btn btn-success btn-sm" href="{{URL::to('/inactiveStatus')}}/{{$exam->exam_id}}">
                          <i class="halflings-icon white zoom-in">status</i>  
                        </a>
                        @else
                        <a class="btn btn-success btn-sm" href="{{URL::to('activeStatus')}}/{{$exam->exam_id}}">
                          <i class="halflings-icon white zoom-in">status</i>  
                        </a>
                       @endif 
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
