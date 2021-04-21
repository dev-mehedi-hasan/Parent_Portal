   @extends('layouts.parent.master')


@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection
@section('content')

  <?php

   $Total_credits=0;
   $Total_Points=0;
   $CGPA=0;
   foreach($lresult as $key =>$result){
   $Total_credits= $Total_credits + $result->course_credit;
    $Total_Points= $Total_Points + ($result->GPA*$result->course_credit);
  }


    $CGPA= $Total_Points/$Total_credits;

  ?>

    <p>
    <style type="text/css">
        
.astrodivider {
  margin:64px auto;
  width:400px; 
  max-width: 100%;
  position:relative;
}

.astrodividermask { 
    overflow:hidden; height:20px; 
}

.astrodividermask:after { 
      content:''; 
      display:block; margin:-25px auto 0;
      width:100%; height:25px;  
        border-radius:125px / 12px;
       box-shadow:0 0 8px #049372;
}
.astrodivider span {
    width:50px; height:50px; 
    position:absolute; 
    bottom:100%; margin-bottom:-25px;
    left:50%; margin-left:-25px;
    border-radius:100%;
   box-shadow:0 2px 4px #4fb39c;
    background:#fff;
}
.astrodivider i {
    position:absolute;
    top:4px; bottom:4px;
    left:4px; right:4px;
    border-radius:100%;
    border:1px dashed #68beaa;
    text-align:center;
    line-height:40px;
    font-style:normal;
     color:#049372;
}
    </style>

    <div class="container">
		<br>
            <div  class="row">
                <div class="col-md-12">
                    <div class="card  height">
                        <div class="card-header">Student Details</div>
                        <div class="card-block">
                            <table>
                                <tr>
                                    <td> <strong>Student Name</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;">  <?php echo ($lresult[0]->student_name);?>                                                                         
                               </td>
                                </tr>
                                <tr>
                                    <td> <strong>Department</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;"> <?php echo ($lresult[0]->department_name);?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <strong>Semester</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;"> <?php echo ($lresult[0]->semester_name);?> </td>
                                </tr>
                                <tr>
                                    <td> <strong>Id</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;"> <?php echo ($lresult[0]->student_academic_id);?> </td>
                                </tr>
                                <tr>
                                    <td> <strong>Total Credit</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;"> <?php echo $Total_credits;?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    <div class="astrodivider"><div class="astrodividermask"></div><span><i>&#10038;</i></span></div>

   <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Course Code </th>
      <th scope="col">Course Title</th>
      <th scope="col">Credit</th>
      <th scope="col">Grade</th>
      <th scope="col">Grade Point</th>
    </tr>
  </thead>
  <tbody>



      @foreach($lresult as $key =>$result)

    <tr>
      <th scope="row">{{$result->course_code}}</th>
      <td>{{$result->course_name}}</td>
      <td>{{$result->course_credit}}</td>
      <td>{{$result->grade}}</td>
      <td>{{$result->GPA}}</td>
    </tr>
      @endforeach 

  </tbody>
</table> 
<table class="table table-borderless" style="background-color: #2F8582;">
  <thead>
    <tr>
      <th scope="col">Total Credit Requirement:<?php echo $Total_credits;?></th>
      <th scope="col">Total Credits Teken:<?php echo $Total_credits;?></th>
      <th scope="col">SGPA:<?php  echo number_format((float)$CGPA, 2, '.', ''); ?></th>
      
    </tr>
  </thead>
  </table> 


   </p>

@endsection

@section('footer')
    @parent
@endsection