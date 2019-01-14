@extends('dashboard')
@section('title','AddClass')
@section('header-title')
  <h1>
        Add Session
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Session</li>
      </ol>
@endsection    
@section('content')
  @if(Session::has('message'))
    <div class="alert alert-success">
      {{Session::get('message')}}
    </div>
  @endif
    <form role="form" action="{{URL::to('/saveSession')}}" method="post">
      @csrf
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="session_name">Session Name</label>
                  <input type="text" class="form-control" id="session_name" placeholder="Enter exam" name="session_name">
                </div>
                
                <div class="form-group">
                <label for="session_start_date">Session Start Date</label>
                <input type="date" class="form-control" id="session_start_date" name="session_start_date">
              </div>

              <div class="form-group">
                <label for="session_end_date">Session End Date</label>
                <input type="date" class="form-control" id="session_end_date" name="session_end_date">
              </div>


                <div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              </div>
              <!-- /.box-body -->
            </form>



@endsection