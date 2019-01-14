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
                  <th>Subject</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($allSubjectcombination as $subjectCombination)
                <tr>
                  <td class="center">{{$subjectCombination->subject_combination_id}}</td>
                  <td>{{$subjectCombination->class_name}}</td>
                  <td>{{$subjectCombination->class_section}}</td>
                  <td>{{$subjectCombination->subject_name}}</td>
                  @if($subjectCombination->status == 1)
                  <td class="center">
                  <span class="label label-success">Active</span>
                </td>
                  @else
                  <td class="center">
                  <span class="label label-warning">Inactive</span>
                </td>
                  @endif
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
                  <th>Class Name</th>
                  <th>Section Name</th>
                  <th>Subject</th>
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

