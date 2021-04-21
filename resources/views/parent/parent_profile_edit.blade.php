@extends('layouts.parent.master')

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
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
input{
    text-align: center;
}
</style>
<p>
    <div class="container emp-profile">
        <form action="{{URL::to('/parent_profile_update')}}" method="post">
              {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                                <div class="card testimonial-card">

                <!--Avatar-->
                <div class="avatar mx-auto white"><img src="/images/parent/picture/meherunnahar.jpg"
                    alt="avatar mx-auto white" class="rounded-circle img-fluid">
                </div>
                            <div style="margin-left: 45px; margin-top: 1px; background-color: #21718D !important;" class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="Profile_image"/>
                            </div>

                <div class="card-body">
                  <!--Name-->
                  <h4 class="card-title mt-1"><input name="parent_name" value="{{$lresult->parent_name}}"></input></h4>
                  <hr>
                  <!--Quotation-->
                  <p></i>{{$lresult->user_type}}</p>
                </div>

                                </div>
                        </div>
                    </div>
                  <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Student's Academic Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$lresult->student_academic_id}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Relation with Student</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$lresult->relation}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input name="parent_email" value="{{$lresult->parent_email}}"></input></p>
                                            </div>
                                        </div>
                                           <div class="row">
                                            <div class="col-md-6">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input type="password" name="parent_password" id="myInput" value="{{$lresult->parent_password}}"><span style="margin-left: 5px;" onclick="myFunction()"class="mdi mdi-eye"></span></p>
                                            </div>
                                        </div>



                                        <script type="text/javascript">
                                            function myFunction() {
                                                                      var x = document.getElementById("myInput");
                                                                      if (x.type === "password") {
                                                                        x.type = "text";
                                                                      } else {
                                                                        x.type = "password";
                                                                      }
                                                                    }
                                        </script>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input name="parent_mobile_no" value="{{$lresult->parent_mobile_no}}"></input></p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input name="parent_profession" value="{{$lresult->parent_profession}}"></input></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input name="parent_address" value="{{$lresult->parent_address}}"></input></p>
                                            </div>
                                        </div>

                                           <div class="row">
                                            <div class="col-md-6">
                                                <label>Date Of Birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><input name="parent_date_of_birth" value="{{$lresult->parent_date_of_birth}}"></input></p>
                                            </div>
                                        </div>

                            </div>
                                                   <?php
                                        $messege = Session::get('message');
                                        if ($messege) {
                                            echo $messege;
                                            Session::put('message',null);
                                        }
                                        
                                        ?>

                             <button style="width: 30%; margin-left: 120px; margin-top: 70px;" type="submit" class="btn btn-success btn-block">Apply
                              </button>

                        </div>
                    </div>
                </div>
                </div>
                </div>
            </form>           
        </div>
</p>
@endsection

@section('footer')
    @parent
@endsection