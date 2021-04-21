@extends('layouts.teacher.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')

<style type="text/css">
 
.emp-profile{
    padding: 3%;
    border-radius: 0.5rem;
    background: #fff;
    border: 3px solid #21718D;
    margin: 10px;
}

.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.add-to-cart{
  background: #21718D;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover{
    background: #46A673;
    color: #fff; }
</style>
<p>
    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                                <div class="card testimonial-card">

                <!--Avatar-->
                <div class="avatar mx-auto white"><img src="images/teacher/picture/Mr. Md. Anwar Hossen.jpg"
                    alt="avatar mx-auto white" class="rounded-circle img-fluid">
                </div>

                <div class="card-body">
                  <!--Name-->
                  <h4 class="card-title mt-1">{{$lresult->teacher_name}}</h4>
                  <hr>
                  <!--Quotation-->
                  <p>Teacher</p>
                </div>

                                </div>
                        </div>
                    </div>
                  <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Department</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$lresult->department_name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Designation</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$lresult->teacher_designation}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                            <a href="mailto:{{$lresult->teacher_email}}">
                                                <p>{{$lresult->teacher_email}}</p>
                                            </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                            <a href="tel:{{$lresult->teacher_mobile_no}}">
                                                <p>{{$lresult->teacher_mobile_no}}</p>
                                            </a>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$lresult->teacher_address}}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{date('d-m-Y', strtotime($lresult->teacher_date_of_birth))}}</p>
                                            </div>
                                        </div>

                            </div>
                        </div>
                    </div>
                            <button onclick="location.href='{{URL::to('/teacher_profile_edit')}}';" style="margin-left: 800px;" class="add-to-cart btn btn-default" type="button"><i class="fa fa-edit"></i> Edit Profile</button>
                </div>
            </form>           
        </div>
</p>



@endsection

@section('footer')
    @parent
@endsection