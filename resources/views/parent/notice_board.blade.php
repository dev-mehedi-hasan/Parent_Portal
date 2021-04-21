@extends('layouts.parent.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
<table style="margin-top: 20px; margin-bottom: 20px;" id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Serial No.
      </th>
      <th class="th-sm">Title
      </th>
      <th class="th-sm">Department
      </th>
      <th class="th-sm">Date
      </th>
    </tr>
  </thead>
  <tbody>
  @foreach($notices as $key =>$notice)
    <tr>
      <td>{{ ++$key }}</td>
      <td><a href="{{URL::to('parent_notice_detail/').'/'.$notice->Notice_id}}">{{str_limit($notice->title, $limit = 20, $end = '...')}}</a></td>
      <td><a href="{{URL::to('parent_department_notice/').'/'.$notice->Department_id}}">{{$notice->department_name}}</a></td>
      <td>{{$notice->date}}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
@endsection

@section('footer')
    @parent
@endsection