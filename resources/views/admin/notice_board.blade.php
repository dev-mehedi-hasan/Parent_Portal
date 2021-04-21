@extends('layouts.admin.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
      <td><a href="{{URL::to('notice_detail/').'/'.$notice->Notice_id}}">{{str_limit($notice->title, $limit = 20, $end = '...')}}</a></td>
      <td><a href="{{URL::to('department_notice/').'/'.$notice->Department_id}}">{{$notice->department_name}}</a></td>
      <td>{{$notice->date}}</td>
    </tr>
    @endforeach
  </tbody>

</table>
@endsection

@section('footer')
    @parent
@endsection