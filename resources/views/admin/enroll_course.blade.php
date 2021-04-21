@extends('layouts.admin.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
<?php
$departments=DB::table('departments')
			->get();
$courses=DB::table('courses')
			->get();
$semesters=DB::table('semesters')
			->get();
?>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        @if($errors->any())
                        <p>
                        {{$errors->first()}}                      
                        </p>
                        @endif
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Section</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                            <form action="{{URL::to('/create_section')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <h3 style="margin-right: 50px;" class="register-heading">Course Enrollment</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <input type="text" name="S_academic_id" class="form-control" placeholder="Student Academic Id *" value="" required="" />
                                        </div>
                                     <div class="form-group">
                                            <select name="Sec_department" class="form-control" required="">
                                                <option class="hidden"  selected disabled>Courses</option>
                                                @foreach($courses as $key =>$course)
                                                <option value="{{$course->Course_id}}">{{$course->course_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="Sec_semester" class="form-control" required="">
                                                <option class="hidden"  selected disabled>Semester</option>
                                                 @foreach($semesters as $key =>$semester)
                                                <option value="{{$semester->Semester_id}}">{{$semester->semester_name}}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="Sec_L_T" class="form-control" required="">
                                                <option class="hidden"  selected disabled>Level-Term</option>
                                                <option>Level-1:Term-1</option>
                                                <option>Level-1:Term-2</option>
                                                <option>Level-1:Term-3</option>
                                                <option>Level-2:Term-1</option>
                                                <option>Level-2:Term-2</option>
                                                <option>Level-2:Term-3</option>
                                                <option>Level-3:Term-1</option>
                                                <option>Level-3:Term-2</option>
                                                <option>Level-3:Term-3</option>
                                                <option>Level-4:Term-1</option>
                                                <option>Level-4:Term-2</option>
                                                <option>Level-4:Term-3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="Sec_name" class="form-control" placeholder="Section name *" value="" required="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="Sec_capacity" class="form-control" placeholder="Section capacity *" value="" required="" />
                                        </div>

                                        <input type="submit" class="btnRegister"  value="Create"/>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

<style type="text/css">
    .register{
    background: -webkit-linear-gradient(left, #57BD66, #09509E);
    margin-top: 0%;
    padding: 0%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
@endsection

@section('footer')
    @parent
@endsection

