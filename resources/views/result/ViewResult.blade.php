@extends('dashboard')
@section('title','AddClass')
@section('header-title')
  <h1>
        Class Wise Result
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Class Wise Result Info</li>
      </ol>
@endsection    
@section('content')
      <div class="form-group">
                <label class="col-md-2">Class Name</label>
                <div class="col-md-4">
                  <select class="form-control select2" style="width: 100%;" name="class_id" id="class_id">
                  <option selected="" disabled=""> Select Class </option>
                  @foreach($allclass as $class)
                  <option value="{{$class->class_id}}">{{$class->class_name}} -{{$class->class_section}}</option>
                  @endforeach
                </select>
                </div>
            <label class="col-md-2">Exam Name</label>
              <div class="col-md-4">
                <select class="form-control select2" style="width: 100%;" name="exam_id" id="exam_id">
                
                </select>
              </div>
             </div><br><br>

            <div class="form-group">
              <label class="col-md-2">Session</label>
              <div class="col-md-4">
                <select class="form-control select2" style="width: 100%;" name="session_id" id="session_id">
                
                </select>
              </div>

          </div> <br><br><br>
          <div class="box" id="dataTable" style="display: none">
            <div class="box-header"><br>
              <h3 class="box-title">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Roll</th>
                  <th>Class & Section</th>
                  <th>Exam Name</th>
                  <th>Session</th>
                  <th>Total</th>
                  <th>GPA(5.00)</th>
                  <th>Grade(A+)</th>
                  <th>Position</th>
                </tr>
                </thead >

                <tbody id="showResult">
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>Roll</th>
                  <th>Class & Section</th>
                  <th>Exam Name</th>
                  <th>Session</th>
                  <th>Total</th>
                  <th>GPA(5.00)</th>
                  <th>Grade(A+)</th>
                  <th>Merit List</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
           



  
<script>
$('#class_id').on('change',function(e){
      var classNameid = $('#class_id').val();
      var examName = $("#exam_id");
      examName.empty();
      $.ajax({
        url: 'getExamName/'+classNameid,
        type: 'GET',
        success: function(data){
          examName.append('<option selected disabled>Please Select Exam</option>');
          $.each(data, function(index,value){
            examName.append('<option value="'+value.exam_id+'">'+value.exam_name+'</option>');
          });
        },
        error: function(data){
          alert('Something went wrong.');
        }

      });
  });

$('#exam_id').on('change',function(){
  var classId = $('#class_id').val();
  var examId = $('#exam_id').val();
  $.ajax({
    url:'classWiseResult/'+classId+'/'+examId,
    type: 'GET',
     success:function(data){
        $('#dataTable').show();
        // console.log(data);
        //   return false;
        var studentShow = $("#showResult");
        studentShow.empty();
        var content = '';

        $.each(data,function(index,value){
          content += '<tr><td>'+
            value.student_id+'</td><td>'+
            value.Student_full_name+'</td><td>'+
            value.student_roll_number+'</td><td>'+
            value.class_name+'-'+value.class_section+'</td><td>'+
            value.exam_name+'</td><td>'+
            value.session_name+'</td><td>'+
            value.final_marks+'</td><td>'+
            value.final_gpa+'</td><td>'+
            value.final_grade+'</td><td>'+
            value.position+'</td><tr>';
        });

        studentShow.append(content);
      },
    error:function(data){
      alert("something went wrong");
    }
  });
});
  </script>
  <!-- DataTables -->
  <script type="text/javascript">
    $('#example1').DataTable();   
</script>
@endsection

