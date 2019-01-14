@extends('dashboard')
@section('title','AddClass')
@section('header-title')
	<h1>
        Add Exam
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Exam</li>
      </ol>
@endsection    
@section('content')
	<div>
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
		<form role="form" action="{{URL::to('/saveClassSetup')}}" method="post">
			@csrf
              <div class="form-group">
                <label>Session Name</label>
                <select class="form-control select2" style="width: 100%;" name="class_name">
                  <option selected="selected">class name</option>
                  @foreach($allSession as $session)
                  <option value="{{$session->session_id}}">{{$session->session_name}}</option>
                  @endforeach
                </select>
              </div>
                
                <div class="form-group">
                <label>Class Name</label>
                <select class="form-control select2" style="width: 100%;" name="class_name">
                  <option selected="selected">class name</option>
                  @foreach($allclass as $class)
                  <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                  @endforeach
                </select>
              </div>

                <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              </div>
              <!-- /.box-body -->
            </form>



@endsection