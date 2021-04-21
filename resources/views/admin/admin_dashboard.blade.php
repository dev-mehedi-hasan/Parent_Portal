@extends('layouts.admin.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
    <p>
    	<img src={{asset('images/admin/welcometoadmin.png')}} class="img-fluid" alt="Responsive image">

    	<!--Carousel Wrapper-->
<div id="video-carousel-example" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#video-carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#video-carousel-example" data-slide-to="1"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div style="height: 400px;" class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <video class="video-fluid" autoplay loop muted>
        <source src="video/carousel-1.mp4" type="video/mp4" />
      </video>
    </div>
    <div class="carousel-item">
      <video class="video-fluid" autoplay loop muted>
        <source src="video/carousel-2.mp4" type="video/mp4" />
      </video>
    </div>
  </div>
  <!--/.Slides-->
</div>
<!--Carousel Wrapper-->
    </p>
@endsection

@section('footer')
    @parent
@endsection