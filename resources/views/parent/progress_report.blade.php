
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
$behavioural_assesment=DB::table('behavioural_assesments')
					  ->join('teachers','teachers.Teacher_id','=','behavioural_assesments.Teacher_id')
					  ->join('students','students.Student_id','=','behavioural_assesments.Student_id')
					  ->join('parents','parents.Student_id','=','students.Student_id')
					  ->where('parents.Parent_id',Session::get('Parent_id'))
					  ->get();

?>
<table style="margin-top: 20px; margin-bottom: 20px;" id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Serial No.
      </th>
      <th class="th-sm">Teacher Name
      </th>
      <th class="th-sm">Date
      </th>
      <th class="th-sm">Action
      </th>
    </tr>
  </thead>
  <tbody>
  @foreach($behavioural_assesment as $key =>$behavioural_assesments)
    <tr>
      <td>{{ ++$key }}</td>
      <td>{{$behavioural_assesments->teacher_name}}</td>
      <td>{{$behavioural_assesments->date}}</a></td>
      <td><button onclick="location.href='{{URL::to('view_progress_report/').'/'.$behavioural_assesments->Behavioural_assesment_id}}';" type="button" class="btn btn-warning">View</button></td>
    </tr>
    @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
    @parent
@endsection