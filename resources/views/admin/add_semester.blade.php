@extends('layouts.admin.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{URL::to('/add_new_semester')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Semester Name:</label>
            <input type="text" name="semester_name" class="form-control" id="semester-name" required="">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Start Date:</label>
            <input type="date" name="semester_start" class="form-control"  value="<?php echo date('Y-m-d'); ?>"/>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">End Date:</label>
            <input type="date" name="semester_end" class="form-control"  value="<?php echo date('Y-m-d'); ?>"/>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-block">Save
      <i class="mdi mdi-cloud-upload"></i>
      </button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="container box">
   <div class="panel panel-default">
    <div class="panel-body">
     <div style="margin-top: 5px;" class="form-group">
      <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-block">Add New
      <i class="mdi mdi-cloud-upload"></i>
      </button>
     </div>
      @if($errors->any())
      <h6>{{$errors->first()}}</h6>
      @endif
     <div class="table-responsive">
      <h3 align="center">All Semester List</h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Serial NO.</th>
         <th>Semester Name</th>
         <th>Starting Date</th>
         <th>End Date</th>
        </tr>
       </thead>
       <tbody>
      @foreach($semesters as $key =>$semester)
      <tr>       
       <td>{{ ++$key }}</td>
       <td>{{$semester->semester_name}}</td>
       <td>{{$semester->start_date}}</td>
       <td>{{$semester->end_date}}</td>
      </tr>
      @endforeach
       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
<div class="astrodivider"><div class="astrodividermask"></div><span><i>&#10038;</i></span></div> 

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>
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
@endsection

@section('footer')
    @parent
@endsection