@extends('layouts.admin.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
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


	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					 @foreach($view_notice as $notice_show)
					 <div class="container">
					 	<div class="row">
						<h3 class="product-title">{{$notice_show->title}}</h3>
						</div>
						<div class="row">
						<h4>Description:</h4>
						</div>
						<div class="row">
						<p class="product-description">{{$notice_show->description}}</p>
						</div>
						<div class="row">
						<h4 class="price">Department: <span>{{$notice_show->department_name}}</span></h4>
						</div>
						<div class="row">
						<h4 class="price">Admin: <span>{{$notice_show->name}}</span></h4>
						</div>
            <div class="row">
            <h4 class="price">Updated at: <span>{{$notice_show->date}}</span></h4>
            </div>

            @if($notice_show->file_name=== null)
           
            @else
						</div>
						<h5 class="colors">File:
							<span>{{$notice_show->file_name}}</span>
						</h5>
						<div class="action">
            <form method="get" action="/{{$notice_show->file_url}}">
							<button type="submit" class="add-to-cart btn btn-default" type="button"><i class="fa fa-download"></i>Download</button>
              </form>
						</div>
            @endif
					 @endforeach
					</div>
				</div>
			</div>
		</div>

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