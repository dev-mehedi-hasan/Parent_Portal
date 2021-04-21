@extends('layouts.teacher.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
<?php
$students=DB::table('sections')
          ->join('enrolled_courses','enrolled_courses.Section_id','=','sections.Section_id')
          ->join('students','students.Student_id','=','enrolled_courses.Student_id')
          ->join('courses','courses.Course_id','=','enrolled_courses.Course_id')
          ->where('sections.Teacher_id','2')
          ->orderBy('enrolled_courses.Course_id')
          ->select(DB::raw('DISTINCT students.student_academic_id'),'students.Student_id','courses.course_name','sections.Section_id')
          ->get();
$Semesters=DB::table('Semesters')
          ->get();
?>
    <p>
 	
<form style="margin:20px;" action="{{URL::to('/post_behavioral_assessment')}}" method="post">
{{ csrf_field() }}
<div class="form-row mb-4">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Student Id</label>
            <select name="Student_id" class="form-control" id="exampleFormControlSelect1">
          <?php
          foreach ($students as $key => $student) {?>
            <option value="<?php echo $student->Student_id; ?>"><?php echo $student->student_academic_id;?>(<?php echo $student->course_name;?>)</option>  
          <?php }?> 
            </select>
        </div>
  </div>

  <div class="form-row mb-4">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Semesters</label>
            <select name="Semester_id" class="form-control" id="exampleFormControlSelect1">
          <?php
          foreach ($Semesters as $key => $Semester) {?>
            <option value="<?php echo $Semester->Semester_id; ?>"><?php echo $Semester->semester_name;?></option>  
          <?php }?> 
            </select>
        </div>
  </div>

  <div class="form-row mb-4">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Class Performance</label>
    <select name="class_performance" class="form-control" id="exampleFormControlSelect1">
      <option>Execlent</option>
      <option>Very Good</option>
      <option>Good</option>
      <option>Bad</option>
      <option>Very Bad</option>
    </select>
  </div>
  </div>
    <div class="form-row mb-4">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Manner</label>
    <select name="manner" class="form-control" id="exampleFormControlSelect1">
      <option>Polite</option>
      <option>So so</option>
      <option>Impolite</option>
    </select>
  </div>
  </div>
  <div class="form-row mb-4">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Class Attendance</label>
    <input class="form-control" type="text" name="class_attendance" placeholder="%">
  </div>
  </div>
  <div class="form-row mb-4">
  <div class="form-group">
    <label for="exampleFormControlSelect2">Comment</label>
    <textarea style="width: 400px;" name="comment" class="form-control"></textarea>
  </div>
</div>
    </p>
    <button style="margin-left:40%; width: 180px; background-color: #00C851 !important;" type="submit" class="btn btn-default">Submit</button>
</form>
@endsection

@section('footer')
    @parent
@endsection