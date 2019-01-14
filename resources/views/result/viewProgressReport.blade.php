@extends('dashboard')
@section('title','Progress Report')
@section('header-title')
    <h1>
       Progress Report
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Progress Report</li>
      </ol>
@endsection    
@section('content')     
    <style>
    td{
        padding-left: 20px;
        padding-right: 20px;
    }
    .student-info-div{
        padding : 20px;
    }
    #std-info{
        font-size: 16px;
    }#mark-info{
         font-size: 16px;
     }/*.logo{
          width: 100px;
          height: 100px;
          margin-top: 20px;
      }*/

    @media print {

        .class_for_print_media_one{
            display: none !important;
        }
        .class_for_print_media_two{
            display: none !important;
        }
        .logo{
            width: 100px;
            height: 100px;

        }
    }


</style>
<div style="text-align:center; color: #5E6C4B; font-size: 1.3em; line-height:25px;" class="row" id="heading">
    <span style="float:left; margin-left:25px;"></span><br>
    <span style="font-size: 22px;">Al jameatul Falahia Kamiil Madrasah FENI</span><br>
    <span style="font-size: 18px;">{{$students->exam_name}}</span><br>
    <span style="font-size: 18px;"> <strong>Academic Progress Report</strong></span>
</div><br><br>
<div class="row">
    <div class="col-md-8 col-xs-8 student-info-div">
        <table id="std-info">
            <tr>
                <td><label>Student Name</label> </td>
                <td style="padding-left: 20px;padding-right: 20px;">:</td>
                <td>{{$students->Student_full_name}}</td> 
            </tr>
            <tr>
                <td><label>Class Name</label> </td>
                <td style="padding-left: 20px;padding-right: 20px;">:</td>
                <td>{{$students->class_name}}</td>
            </tr>
            <tr>
                <td><label>Group Name </label> </td>
                <td style="padding-left: 20px;padding-right: 20px;">:</td>
                <td>{{$students->class_section}}</td> 
            </tr>
            <tr>
                <td><label>Student ID</label> </td>
                <td style="padding-left: 20px;padding-right: 20px;">:</td>
                <td>{{$students->student_id}}</td>
            </tr>
            <tr>
                <td><label>Student Roll</label> </td>
                <td style="padding-left: 20px;padding-right: 20px;">:</td>
                <td>{{$students->student_roll_number}}</td>
            </tr>
            <tr>
                <td><label>Batch Name </label> </td>
                <td style="padding-left: 20px;padding-right: 20px;">:</td>
                <td>evening</td>
            </tr>
            <tr>
                <td><label>Shift Name </label> </td>
                <td style="padding-left: 20px;padding-right: 20px;">:</td>
                <td>morning</td>
            </tr>
            <tr>
                <td><label>Session Name </label> </td>
                <td style="padding-left: 20px;padding-right: 20px;">:</td>
                <td>{{$students->session_name}}</td> 
            </tr>
          
        </table>
        <br/>
        <br/>
        <table class="table table-bordered text-center" style="border: 1px solid #ccc;" id="mark-info">
            <thead>
            <tr>
                <th style="width: 30%;text-align: left;">Subject Name</th>
                <th style="width: 5%">CQ</th>
                <th style="width: 5%">MCQ</th>
                <th>Practical</th>
                 <th style="width: 5%">Marks</th>
                <th>LG</th>
                <th>GP</th>
                 <th>Obtained Mark</th>
            </tr>
            </thead>
            <tbody id="tbody">
                @foreach($results as $result)
                    <tr>
                        <td style="text-align: left;">{{$result->subject_name}}</td>
                        <td>{{$result->written_marks}}</td>
                        <td>{{$result->mcq_marks}}</td>
                        <td>{{$result->practical_marks}}</td>
                         <td style="text-align: left;">{{$result->total_marks}}</td>
                        
                        <td>{{$result->grade}}</td>
                        <td>{{$result->gpa}}</td>
                        <td>good</td>
                    </tr>
                 @endforeach 
                  <tr>
                    <td></td>
                    <!-- <td>500</td> -->
                    <td></td>
                    <td><strong>Final Marks</strong></td>
                    <td>{{$finalMarks->final_marks}}</td>
                    <td><strong>GPA</strong></td>
                    <td colspan="1">{{$finalMarks->final_gpa}}</td>
                    <td><strong>LG</strong></td>
                    <td colspan="1">{{$finalMarks->final_grade}}</td>
                  </tr>     
            </tbody>
        </table>
        <span style="font-size:15px;">Date of Publication of Result: <strong>bnjh</strong></span>
    </div>

    <div class="col-sm-4 col-xs-4" style="" id="mark-info">
        <article style="border:1px solid #ccc; margin-bottom: 5px; padding: 5px;">
            <strong style="border-right: 1px solid #CCC; padding: 7px; width: 50%">Total Participate Students </strong>
            <strong style="padding: 0 0 0 7px;">23</strong>
        </article>

        <article style="border:1px solid #ccc; margin-bottom: 5px; padding: 5px;">
            <strong style="border-right: 1px solid #CCC; padding: 7px; width: 50%">Merit Place </strong>
            <strong style="padding: 0 0 0 7px;">{{$finalMarks->merit_list}}</strong>
        </article>

        <article style="border:1px solid #ccc; margin-bottom: 5px;">
            <p style="border-bottom: 1px solid #ccc; padding: 3px; text-align:center;"><strong>Teacher Comments</strong></p>
            <div class="form-group" style="padding: 0 5px 7px 5px">
                <label><u>Comments</u> :</label>

                <div style="margin-left: 25px;">
                        <label style="font-weight: normal; width: 100%;">
                            <input onclick="return false" type="checkbox">
                           

                        </label>
                   
                </div>

                <label><u>Class Attendance</u> :</label>
                <div style="margin-left: 25px; ">
                    <label style="font-weight: normal; width: 160px ;">
                        <input name="check1" value="1" type="checkbox">
                        
                    </label>
                </div>
                <div style="margin-left: 25px;">
                    <label style="font-weight: normal; width: 160px;">
                        <input name="check1" value="1" type="checkbox">
                        
                    </label>
                </div>
                <div style="margin-left: 25px;">
                    <label style="font-weight: normal; width: 160px;">
                        <input name="check1" value="1" type="checkbox">
                        
                    </label>
                </div>

                <label><u>Advice</u> :</label>
                <div style="margin-left: 25px; margin-bottom: 30px;">
                    <p style="margin:0;">1. <label style="width:150px; border-top:1px dotted #888;"></label></p>
                    <p style="margin:0;">2. <label style="width:150px; border-top:1px dotted #888;"></label></p>
                    <p style="margin:0;">3. <label style="width:150px; border-top:1px dotted #888;"></label></p>
                </div>

                <label class="pull-right" style="border-top:1px dotted #888; font-weight: normal;">Class teacher signature &amp;  date </label>
            </div>
        </article>

        <article style="border:1px solid #ccc; margin-bottom: 5px; min-height: 200px;">
            <p style="border-bottom: 1px solid #ccc; padding: 3px; text-align:center;"><strong>Guardian Comments</strong></p>
            <label class="pull-right" style="margin:80px 5px 0 0; border-top:1px dotted #888; font-weight: normal;  margin-top:200px;">Guardian signature &amp;  date </label>
        </article>



        <label class="pull-right" style="margin:80px 5px 0 0; border-top:1px dotted #888; font-weight: normal; margin-top:150px;">Controller of Examination </label>

    </div>

</div>


 
@endsection