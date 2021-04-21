@extends('layouts.admin.master')

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
      <th class="th-sm">Date
      </th>
    </tr>
  </thead>
  <tbody>
  @foreach($department_notices as $key =>$department_notice)
    <tr>
      <td>{{ ++$key }}</td>
      <td><a href="{{URL::to('notice_detail/').'/'.$department_notice->Notice_id}}">{{str_limit($department_notice->title, $limit = 20, $end = '...')}}</a></td>
      <td>{{$department_notice->date}}</td>
    </tr>
  </tbody>
  </table>
  @endforeach
@endsection

@section('footer')
    @parent
@endsection