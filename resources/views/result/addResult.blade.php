@extends('dashboard')
@section('title','AddClass')
@section('header-title')
	<h1>
        Marks Antry
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Exam</li>
      </ol>
@endsection    
@section('content')
	
    @if(Session::has('message'))
      <div class="alert alert-success">
        {{Session::get('message')}}
      </div>
    @endif
		<form role="form" action="{{URL::to('saveMarksEntry')}}" method="post" id="marksEntry">
			@csrf 
            <div class="form-group">
                <label class="col-md-2">Class Name</label>
                <div class="col-md-4">
                  <select class="form-control select2" style="width: 100%;" name="class_id" id="class_name">
                  <option selected="" disabled=""> Select Class </option>
                  @foreach($allclass as $class)
                  <option value="{{$class->class_id}}">{{$class->class_name}} -{{$class->class_section}}</option>
                  @endforeach
                </select>
                </div>
             <label class="col-md-2">Session Name</label>
                <div class="col-md-4">
                  <select class="form-control select2" style="width: 100%;" name="session_id" id="session_id">
                  <option selected="" disabled=""> Select One </option>
                  @foreach($allsession as $session)
                  <option value="{{$session->session_id}}">{{$session->session_name}}</option>
                  @endforeach
                </select>
                </div>
          </div> <br><br><br>
            
            <div class="form-group">
              <label class="col-md-2">Exam Name</label>
              <div class="col-md-4">
                <select class="form-control select2" style="width: 100%;" name="exam_id" id="exam_name">
                
                </select>
              </div>
              <label class="col-md-2">Subject Name</label>
              <div class="col-md-4">
                <select class="form-control select2" style="width: 100%;" name="subject_id" id="subject_name">
                </select>
              </div>
              
            </div><br><br>
                
                   <table class="table text-center" id="dataTable" style="display: none;">
                      <thead class="thead-light">
                        <tr>
                          <th>ID</th>
                          <th>Student Name</th>
                          <th>Subjective</th>
                          <th>Objective</th>
                          <th>Practical</th>
                        </tr>
                      </thead>
                          <tbody id="studentShow">
                           
                          </tbody>
                          <button type="submit" class="btn btn-primary pull-right" id="btn" style="display: none;">Save</button>
                
                </table>

              </div>
              <!-- /.box-body -->
            </form>


<script type="text/javascript">

  $('#class_name').on('change',function(e){
      var classNameid = $('#class_name').val();
      var examName = $("#exam_name");
      examName.empty();
      $.ajax({
        url: 'getClassWiseExam/'+classNameid,
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



  $('#exam_name').on('change',function(e){
    var classNameid = $('#class_name').val();
    var subName = $("#subject_name");
    subName.empty();
    $.ajax({
      url:'getClassWiseSubjectName/'+classNameid,
      type:'GET',
      success:function(data){
        //console.log(data);
        subName.append('<option selected disabled>Please Select Subject</option');
        $.each(data,function(index,value){
          subName.append('<option value="'+value.subject_id+'">'+value.subject_name+'</option>');
        })
      },
      error:function(){
        alert("something went wrong");
      }
    });

  });

  $('#subject_name').on('change',function(e){
    var classNameid = $('#class_name').val();
    var subNameid = $("#subject_name").val();
    var examNameid = $("#exam_name").val();
    $.ajax({
      url:'getClassNameWiseStudent/'+classNameid+'/'+subNameid,
      type:'GET',
      success:function(data){
        $('#dataTable').show();
        $('#btn').show();
        // console.log(data);
        // return false;
        var studentShow = $("#studentShow");
        studentShow.empty();
        var content = '';
        $.each(data,function(index,value){
          content += '<tr><td>'+
            value.student_id+'</td><td>'+
            value.Student_full_name+'</td><td>'+
            '<input name="subjective['+value.student_id+']"type="number" class="form-control" data-maximum="'+value.subjective+'" id="subjective'+value.student_id+'" onkeyup="checkSubjective('+value.student_id+')" /></td><td>'+
            '<input name="objective['+value.student_id+']"class="form-control" data-maximum="'+value.objective+'" onkeyup="checkObjective('+value.student_id+')" id="objective'+value.student_id+'" type="number" /></td><td>'+
            '<input name="practical['+value.student_id+']" type="number" class="form-control" data-maximum="'+value.practical+'" onkeyup="checkPractical('+value.student_id+')" id="practical'+value.student_id+'" /></td><td></td><tr>';
        });
        studentShow.append(content);
      },
      error:function(data){
        alert("something went wrong")
      }
    });
  });
  function checkSubjective(studentId)
  {
      var subjective= $("#subjective"+studentId);
      var maximum= parseInt(subjective.attr('data-maximum'));
      if(subjective.val() > maximum){
        alert('Maximum marks is '+maximum);
        subjective.val(maximum);
      }

  }
  function checkObjective(studentId)
  {
    //alert(studentId);
    var objective = $("#objective"+studentId); 
    var maximum= parseInt(objective.attr('data-maximum'));
    //alert(objective.val());
    if (objective.val() > maximum) {
      alert('Maximum marks is'+maximum);
      objective.val(maximum);
    }
  }
  function checkPractical(studentId)
  {
    var practical = $("#practical"+studentId);
    var maximum = parseInt(practical.attr('data-maximum'));
    if (practical.val() > maximum) {
      alert('Maximum marks is'+maximum);
      practical.val(maximum);
    }
  }
</script>

@endsection
