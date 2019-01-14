@extends('dashboard')
@section('title','indiviualResultCheck')
@section('header-title')
	<h1>
        Indiviual Result
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Indiviual Result Check</li>
      </ol>
@endsection    
@section('content')
  @if(Session::has('message'))
    <div class="alert alert-danger">
        {{Session::get('message')}}
    </div>
  @endif
		<form role="form" action="{{URL::to('/viewProgressReport')}}" method="post">
			@csrf
          <div class="form-group">
              <label class="col-md-2">Class & Section</label>
              <div class="col-md-4">
                <select class="form-control select2" style="width: 100%;" name="class_id" id="class_id">
                  <option selected=""disabled>Select Class & Section</option>
                  @foreach($allclass as $class)
                  <option value="{{$class->class_id}}">{{$class->class_name}}- {{$class->class_section}}</option>
                  @endforeach
                </select>
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-md-2">Exam Name</label>
              <div class="col-md-4">
                <select class="form-control select2" style="width: 100%;" name="exam_id" id="exam_id">
                </select>
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-md-2">Year</label>
              <div class="col-md-4">
                <select class="form-control select2" style="width: 100%;" name="session_id" id="session_id">
                  <option selected=""disabled>Select One</option>
                  @foreach($allsession as $session)
                  <option value="{{$session->session_id}}">{{$session->session_name}}</option>
                  @endforeach
                </select>
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-md-2">Student Id</label>
              <div class="col-md-4">
                <input type="number" name="student_id" class="form-control">
              </div>
            </div><br><br>

            
              <div>
                <button class="btn btn-primary">Submit</button>
              </div>
              <!-- /.box-body -->
            </form>
            
  <script type="text/javascript">
     $('#class_id').on('change',function(e){
      var classNameid = $('#class_id').val();
      var examName = $("#exam_id");
      examName.empty();
      $.ajax({
        url: 'stdMarksSheet/'+classNameid,
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
    
  </script>

@endsection