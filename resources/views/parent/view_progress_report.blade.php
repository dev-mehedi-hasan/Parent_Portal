@extends('layouts.parent.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')

	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					 @foreach($behavioural_assesment as $behavioural_assesments)
					 <div class="container">
					 	<div class="row">
						<h3 class="product-title">Progress Report</h3>
						</div>
						<div class="row">
						<h4>Description:</h4>
						</div>
						<div class="row">
						<p class="product-description">{{$behavioural_assesments->comment}}</p>
						</div>
						<div class="row">
						<h4 class="price">Semester: <span>{{$behavioural_assesments->semester_name}}</span></h4>
						</div>
						<div class="row">
						<h4 class="price">Teacher: <span>{{$behavioural_assesments->teacher_name}}</span></h4>
						</div>
						<div class="row">
						<h4 class="price">Class Performance: <span>{{$behavioural_assesments->class_performance}}</span></h4>
						</div>
						<div class="row">
						<h4 class="price">Manner: <span>{{$behavioural_assesments->manner}}</span></h4>
						</div>
						<div class="row">
						<h4 class="price">Class Attendance: <span>{{$behavioural_assesments->class_attendance}}%</span></h4>
						</div>
            <div class="row">
            <h4 class="price">Date: <span>{{$behavioural_assesments->date}}</span></h4>
            </div>

            <div class="action">
              <button onclick="location.href='{{URL::to('parent_chat_with/').'/'.$behavioural_assesments->Teacher_id}}'" style="margin-left: 80%;" type="submit" class="add-to-cart btn btn-default" type="button"><i class="menu-icon mdi mdi-facebook-messenger"></i>Talk to Teacher</button>
            </div>
					 @endforeach
					</div>
				</div>
			</div>
		</div>

<style type="text/css">
	
/*****************globals*************/
body {
  font-family: 'open sans';
  overflow-x: hidden; }

.tab-content {
  overflow: hidden; }

.card {
	padding: 3%;
    border-radius: 0.5rem;
    background: #fff;
    border: 3px solid #21718D;
    margin: 10px;
    margin-top: 40px;
    line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title {
  font-weight: bold; }
.price span {
  color: #21718D;
  margin-left: 5px;
  padding: 3px; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }


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

/*# sourceMappingURL=style.css.map */
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
<div class="astrodivider"><div class="astrodividermask"></div><span><i>&#10038;</i></span></div>
@endsection

@section('footer')
    @parent
@endsection