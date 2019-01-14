@extends('dashboard')
@section('title','AddClass')
@section('header-title')
	<h1>
        Add Class
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add class</li>
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
		<form role="form" action="{{URL::to('/saveClass')}}" method="post">
			@csrf
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="class_name">Class Name</label>
                  <input type="text" class="form-control" id="class_name" placeholder="Enter class" name="class_name">
                </div>

                <div class="form-group">
                  <label for="section_name">Section Name</label>
                  <input type="text" class="form-control" id="section_name" placeholder="Enter section" name="section_name">
                </div>

                <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              </div>
              <!-- /.box-body -->
            </form>



@endsection