@extends('dashboard')
@section('title','AddClass')
@section('header-title')
	<h1>
        Add Student
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Student</li>
      </ol>
@endsection    
@section('content')
	@if(Session::has('message'))
  <div class="alert alert-success col-md-8">
    {{Session::get('message')}}
  </div>
  @endif
		<form role="form" action="{{URL::to('/saveStudent')}}" method="post">
			@csrf
              <div class="box-body col-md-12">
                <div class="form-group">
                  <label for="student_full_name" class="col-md-2">Student Name</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="student_full_name" placeholder="Enter class" name="student_full_name">
                    </div>
                  <label for="student_roll_number" class="col-md-2">Roll Number</label>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="student_roll_number" placeholder="Enter section" name="student_roll_number">
                  </div> 
                </div> <br><br>
                
                <div class="form-group">
                  <label for="student_reg_number" class="col-md-2">Reg Number</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" id="student_reg_number" placeholder="Enter section" name="student_reg_number">
                    </div>
                  
                  <label class="col-md-2">Session</label>
                    <div class="col-md-4">
                      <select class="form-control select2" style="width: 100%;" name="session_id">
                        <option selected disabled>Select session</option>
                        @foreach($allsession as $session)
                        <option value="{{$session->session_id}}">{{$session->session_name}}</option>
                        @endforeach
                </select>
                    </div>
                </div> <br><br>

                <div class="form-group">
                  <label for="student_session" class="col-md-2">Student Type</label>
                  <div class="col-md-4">
                    <input type="radio" name="student_type" value="Regular">Regular 
                  <input type="radio" name="student_type" value="Irregular">Irregular 
                  </div>
                  <label for="student_email" class="col-md-2">Email</label>
                  <div class="col-md-4">
                    <input type="email" class="form-control" id="student_email" placeholder="Enter section" name="student_email">
                  </div>
                </div> <br><br>

                <div class="form-group">
                      <label for="student_session" class="col-md-2">Gender</label>
                      <div class="col-md-4">
                        <input type="radio" name="student_gender" value="Male"> Male
                        <input type="radio" name="student_gender" value="Female">Female 
                        <input type="radio" name="student_gender" value="Other">Other
                      </div>
                    <label class="col-md-2">Class Name</label>
                    <div class="col-md-4">
                      <select class="form-control select2" style="width: 100%;" name="class_id">
                        <option selected>Select class</option>
                        @foreach($allclass as $class)
                        <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                        @endforeach
                </select>
                    </div>
                </div> <br><br>
                
               <div class="form-group">
                      <label for="student_session" class="col-md-2">Section</label>
                      <div class="col-md-4">
                        <select class="form-control select2" style="width: 100%;" name="class_section">
                          <option selected>Select Section</option>
                          @foreach($allclass as $class)
                        <option value="{{$class->class_id}}">{{$class->class_section}}</option>
                        @endforeach
                      </select>
                      </div>
                    <label class="col-md-2">Date Of Birth</label>
                    <div class="col-md-4">
                  <input type="date" class="form-control" id="student_dob" placeholder="Enter section" name="student_dob">
                    </div>
                </div> <br><br>

                
                <div>
                <button type="submit" class="btn btn-primary pull-md-right">Submit</button>
              </div>

              </div>
              <!-- /.box-body -->
            </form>



@endsection