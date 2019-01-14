@extends('dashboard')
@section('title','AddClass')
@section('header-title')
	<h1>
        Add Subject
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Subject</li>
      </ol>
@endsection    
@section('content')

   @if(Session::has('message'))
    <div class="alert alert-success col-md-8">
        {{Session::get('message')}}
    </div>
  @endif
		<form role="form" action="{{URL::to('/saveSubject')}}" method="post">
			@csrf
              <div class="box-body col-md-6">
                <div class="form-group">
                <label>Class Name</label>
                <select class="form-control select2" style="width: 100%;" name="class_id" id="class_id">
                  <option>Select class name</option>
                  @foreach($allclass as $class)
                  <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                  @endforeach
                </select>
              </div>

                <div class="form-group">
                  <label for="subject_name">Subject Name</label>
                  <input type="text" class="form-control" id="subject_name" placeholder="Enter subject" name="subject_name">
                </div>

                <div class="form-group">
                  <label for="subject_code">Subject Code</label>
                  <input type="text" class="form-control" id="subject_code" placeholder="Enter subject code" name="subject_code">
                </div>

                <div class="form-group">
                  <label for="subjective">Subjective</label>
                  <input type="number" class="form-control" id="subjective" placeholder="Enter subjective marks" name="subjective">
                </div>

                <div class="form-group">
                  <label for="objective">Objective</label>
                  <input type="number" class="form-control" id="objective" placeholder="Enter objective marks" name="objective">
                </div>

                <div class="form-group">
                  <label for="practical">Practical</label>
                  <input type="text" class="form-control" id="practical" placeholder="Enter practical marks" name="practical">
                </div>

                

                <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              </div>
              <!-- /.box-body -->
            </form>



@endsection