<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Parent Portal - @yield('title')</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">

        <link href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/parent/layoutstyle.css') }}" rel="stylesheet">
    </head>

    <body>
        @section('navbar')

    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="#">
              <img style="height: 40px;" src="/images/layout/diu.png" alt="logo" />
            </a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-file-document-box"></i>
                  <span class="count">1</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <div class="dropdown-item">
                    <p class="mb-0 font-weight-normal float-left">You have 1 unread message
                    </p>
                    <span class="badge badge-info badge-pill float-right">View all</span>
                  </div>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../images/faces/face4.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                      <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                        <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                      </h6>
                      <p class="font-weight-light small-text">
                        The meeting is cancelled
                      </p>
                    </div>
                  </a>
                </div>
              </li>
          
              <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <span class="profile-text">Hello, {{Session::get('Admin_name')}} !</span>
                  <img class="img-xs rounded-circle" src="/images/teacher/picture/shohelsir.jpg" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <a class="dropdown-item p-0">
                    <div class="d-flex border-bottom">
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                      </div>
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                        <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                      </div>
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                      </div>
                    </div>
                  </a>
                  <a href="{{URL::to('/admin_profile')}}" class="dropdown-item mt-2">
                    Manage Accounts
                  </a>
                  <a class="dropdown-item">
                    Change Password
                  </a>
                  <a class="dropdown-item">
                    Check Inbox
                  </a>
                  <a href="{{URL::to('/admin_logout')}}" class="dropdown-item">
                    Sign Out
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
    </div>
        @show

        @section('sidebar')

      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item nav-profile">
                <div class="nav-link">
                  <div class="user-wrapper">
                    <div class="profile-image">
                      <a href="{{URL::to('/admin_profile')}}"><img src="/images/teacher/picture/shohelsir.jpg" alt="profile image"></a>
                    </div>
                    <div class="text-wrapper">
                    <a href="{{URL::to('/admin_profile')}}">
                      <p class="profile-name">{{Session::get('Admin_name')}}</p>
                    </a>
                      <div>
                        <small class="designation text-muted">{{Session::get('user_type')}}</small>
                        <span class="status-indicator online"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/admin_dashboard')}}">
                  <i class="menu-icon mdi mdi-television"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <i class="menu-icon mdi mdi-account"></i>
                  <span class="menu-title">Profile</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/admin_profile')}}">View Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/admin_profile_edit')}}">Update Profile</a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic-notice" aria-expanded="false" aria-controls="ui-basic">
                  <i class="menu-icon mdi mdi-bullhorn"></i>
                  <span class="menu-title">Notice</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic-notice">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/admin_notice_board')}}">View Notice</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/add_notice')}}">Add Notice</a>
                    </li>
                  </ul>
                </div>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/add_user')}}">
                  <i class="menu-icon mdi mdi-account-plus"></i>
                  <span class="menu-title">Add User</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/add_student')}}">
                  <i class="menu-icon mdi  mdi-account-multiple-plus"></i>
                  <span class="menu-title">Add Students</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-payment-section" aria-expanded="false" aria-controls="ui-basic">
                  <i class="menu-icon mdi mdi-cash-multiple"></i>
                  <span class="menu-title">Payment Section</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-payment-section">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/admin_payment_ledger')}}">View Ledger</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/admin_profile_edit')}}">Update Ledger</a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-others" aria-expanded="false" aria-controls="ui-basic">
                  <i class="menu-icon mdi mdi-zip-box"></i>
                  <span class="menu-title">Others</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-others">
                  <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/add_semester')}}">Add Semester</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/add_section')}}">Add Section</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{URL::to('/enroll_course')}}">Course Enrollment</a>
                    </li>
                    <li class="nav-item">
                      <a style="color: red;" class="nav-link" href="{{URL::to('/admin_profile_edit')}}">Delete Users</a>
                    </li>
                  </ul>
                </div>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/teacher_dashboard')}}">
                  <i class="menu-icon mdi mdi-television"></i>
                  <span class="menu-title">Result</span>
                </a>
              </li>
              

                <li class="nav-item nav-profile">
                <div class="nav-link">
                  <button onclick="location.href='{{URL::to('/admin_logout')}}'" class="btn btn-success btn-block">Log Out
                    <i class="mdi mdi-logout"></i>
                  </button>
                </div>
              </li>
            </ul>
          </nav>
             @show

        

        
        
        <div class="main-panel">
         @yield('content')

         @section('footer') 
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
              <a href="" target="_blank"></a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="http://aunik007.000webhostapp.com/">Mehedi Hasan</a>
              <i class="mdi mdi-map-marker-multiple"></i>
            </span>
          </div>
        </footer>
      </div> 
         @show             

      <script type="text/javascript" src="{{ URL::to('vendors/js/vendor.bundle.base.js') }}"></script>
     

    </body>
</html>