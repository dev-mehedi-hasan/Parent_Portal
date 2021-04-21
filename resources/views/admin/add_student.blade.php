@extends('layouts.admin.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>
                        <?php
                                        $messege = Session::get('message');
                                        if ($messege) {
                                            echo $messege;
                                            Session::put('message',null);
                                        }
                                        
                                        ?>
                        </p>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Student</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                            <form action="{{URL::to('/create_student')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <h3 class="register-heading">Create User as Student</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="S_name" class="form-control" placeholder="Student Name *" value="" required="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="S_email" class="form-control" placeholder="Email *" value="" required="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="S_password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="S_mobile" class="form-control"  placeholder="Mobile Number *" value="" />
                                        </div>
                                        <div class="form-group">
                                             <div class="custom-file">
                                                <input name="S_avatar" type="file" class="custom-file-input" id="file" required="">
                                                <label class="custom-file-label" for="fileInput">Avatar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                           <input type="text" name="S_academic_id" class="form-control"  placeholder="Student Academic Id *" value="" required="" />
                                        </div>
                                    <div class="form-group">
                                            <select name="department" class="form-control" required="">
                                                <option class="hidden"  selected disabled>Department</option>
                                                @foreach($departments as $key =>$department)
                                                <option value="{{$department->Department_id}}">{{$department->department_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control">Date of Birth</label>
                                            <input type="date" name="S_dob" class="form-control"  value="<?php echo date('Y-m-d'); ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="S_present_address" class="form-control" placeholder="Present Address *" value="" required=""></textarea>
                                        </div>
                                         <div class="form-group">
                                            <textarea class="form-control" name="S_permanent_address" class="form-control" placeholder="Permanent Address *" value="" required=""></textarea>
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </form>
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