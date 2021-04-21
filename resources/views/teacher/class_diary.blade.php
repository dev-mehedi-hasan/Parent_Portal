@extends('layouts.teacher.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
    <p>
    <style type="text/css">
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
    	
  <div class="container">
                                        <?php
                                        $messege = Session::get('message');
                                        if ($messege) {
                                            echo $messege;
                                            Session::put('message',null);
                                        }
                                        
                                        ?>

  <div class="row">
    <form action="{{URL::to('/teacher_class_diary_post')}}" method="post">
              {{ csrf_field() }}
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label for="exampleFormControlInput1">Student ID</label>
                            <input type="text" class="form-control" name="id" autocomplete="off" id="Name" placeholder="Student's Academic Id">
                      </div>
                    </div>
                      <div class="col-md-6">
                      <div class="form-group">
                      <label for="exampleFormControlInput1">Date</label>
                            <input name="date" type="date" value="<?php echo date('Y-m-d'); ?>" />
                      </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                      <label for="exampleFormControlInput1">Class Diary</label>
                            <textarea class="form-control textarea" rows="3" name="Message" id="Message" placeholder=""></textarea>
                      </div>
                    </div>
                    </div>
                    <button class="add-to-cart btn btn-default" type="submit"> Submit </button>
                </form>
  </div>
</div>
</p>
    

@endsection

@section('footer')
    @parent
@endsection