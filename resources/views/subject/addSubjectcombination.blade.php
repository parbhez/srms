@extends('dashboard')
@section('title','AddClass')
@section('header-title')
	     <h1>
        Add Subject Combination
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Subject Combination</li>
      </ol>
@endsection    
@section('content')
@if(Session::has('message'))
  <div class="alert alert-success">
    {{Session::get('message')}}
  </div>
@endif 
		<form role="form" action="{{URL::to('/saveSubjectcombination')}}" method="post">
			@csrf
                <div class="form-group">
                <label class="col-md-2">Class Name</label>
                <div class="col-md-4">
                  <select class="form-control select2" style="width: 100%;" name="class_id">
                  <option selected="selected">Class name</option>
                  @foreach($allclass as $class)
                  <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                  @endforeach
                </select>
                </div>

                <label class="col-md-2">Subject Name</label>
                <div class="col-md-4">
                  <select class="form-control select2" style="width: 100%;" name="subject_id">
                  <option selected="selected">Subject name</option>
                  @foreach($allsubject as $subject)
                  <option value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                  @endforeach
                </select>
                </div>
              </div><br><br><br>

                <div>
                <button type="submit" class="btn btn-primary center-block">Submit</button>
              </div>

              </div>
              <!-- /.box-body -->
            </form>



@endsection