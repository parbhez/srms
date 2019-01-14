@extends('dashboard')
@section('title','AddClass')
@section('header-title')
  <h1>
        Published Class Wise Result
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Class Wise Result Published</li>
      </ol>
@endsection    
@section('content')
    @if(Session::has('message'))
      <div class="alert alert-success">
        {{Session::get('message')}}
      </div>
    @endif
  <div class="container col-md-8">
    <form action="{{URL::to('/resultPublished')}}" method="post">
      @csrf
          <div class="form-group ">
                <label>Class & Section</label>
                  <select class="form-control select2" style="width: 100%;" name="class_id" id="class_id">
                  <option selected="" disabled=""> Select Class & Section </option>
                  @foreach($classWiseResult as $class)
                  <option value="{{$class->class_id}}">{{$class->class_name}} -{{$class->class_section}}</option>
                  @endforeach
                </select>
          </div>

          <div class="form-group ">
                <label>Session</label>
                  <select class="form-control select2" style="width: 100%;" name="session_id" id="session_id">
                  <option selected="" disabled=""> Select Session </option>
                  @foreach($sessions as $session)
                  <option value="{{$session->session_id}}">{{$session->session_name}}</option>
                  @endforeach
                </select>
          </div>

          <div class="form-group ">
            <label>Exam Name</label>
                <select class="form-control select2" style="width: 100%;" name="exam_id" id="exam_id">
                </select>
          </div>
          <div class="form-group">
             <button class="btn btn-info">Submit</button>
          </div>
         </form>
   </div>      

<script type="text/javascript">
    $('#class_id').on('change',function(e){
      var classNameid = $('#class_id').val();
      //console.log(classNameid);
      var examName = $('#exam_id');
      examName.empty();
      $.ajax({
        url:'getClasswiseExamName/'+classNameid,
        type:'GET',
        success:function(data){
          // console.log(data);
          // return false;
          examName.append('<option selected disabled>Please Select Exam</option>');
          $.each(data,function(index,value){
            examName.append('<option value="'+value.exam_id+'">'+value.exam_name+'</option>');
          });
        },
        error:function(data){
          alert('Something Went Wrong');
        }
      });

  });
</script>
@endsection

