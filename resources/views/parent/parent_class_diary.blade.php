@extends('layouts.parent.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
<div style="text-align: center; margin-top: 10px; border: 2px solid">
  <span class="navbar-brand"><h2><strong>Class Diary</strong></h3></span>
</div>
<table style="margin-top: 20px; margin-bottom: 20px;" id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Serial No.
      </th>
      <th class="th-sm">Diary About
      </th>
      <th class="th-sm">Teacher Name
      </th>
      <th class="th-sm">Date
      </th>
    </tr>
  </thead>
  <tbody>
  @foreach($lresult as $key =>$class_diary)
    <tr>
      <td>{{ ++$key }}</td>
      <td><a href="{{URL::to('parent_class_diary_detail/').'/'.$class_diary->Class_diary_id}}">{{str_limit($class_diary ->teacher_comment, $limit = 20, $end = '...')}}</a></td>
      <td><a href="{{URL::to('parent_chat_with/').'/'.$class_diary->Teacher_id}}">{{$class_diary->teacher_name}}</a></td>
      <td>{{$class_diary->date}}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
    @parent
@endsection