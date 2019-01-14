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
		<form role="form" action="{{URL::to('/saveExam')}}" method="post">
			@csrf
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="exam_name">Exam Name</label>
                  <input type="text" class="form-control" id="exam_name" placeholder="Enter exam" name="exam_name">
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

                <div class="form-group">
                  <label for="publication_status">Publication Status</label><br>
                  <input type="checkbox"id="publication_status" name="publication_status" value="1">
                </div>

                <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              </div>
              <!-- /.box-body -->
            </form>



@endsection