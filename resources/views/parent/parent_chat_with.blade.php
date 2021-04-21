@extends('layouts.parent.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')


<div class="card rare-wind-gradient chat-room">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2">

   <!-- Grid column -->
      <div class="col-md-6 col-xl-4 px-0">

        <h6 class="font-weight-bold mb-3 text-center text-lg-left">Teachers</h6>
        <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
          <ul class="list-unstyled friend-list">
          <?php 
        
         foreach ($parent_chatlist as $key => $value) {?>
            <li class="active grey lighten-3 p-2">
              <a href="{{URL::to('parent_chat_with/').'/'.$value->Teacher_id}}" class="d-flex justify-content-between">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                <div class="text-small">
                  <strong><?php echo($value->teacher_name);?></strong>
                  <p class="last-message text-muted"><?php echo($value->teacher_designation);?></p>
                </div>
                <div class="chat-footer">
                  <p class="text-smaller text-muted mb-0"><i class="menu-icon mdi mdi-facebook-messenger"></i></p>
                </div>
              </a>
            </li>
          <?php } ?>
          </ul>
        </div>
      </div>
      <!-- Grid column -->
      <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

        <div class="chat-message">
          <?php
          $messege = Session::get('message');
          if ($messege) {
              echo $messege;
              Session::put('message',null);
          }
          
          ?>
          <ul class="list-unstyled chat-1 scrollbar-light-blue">
            <?php foreach ($results as $key => $value) {
            if($value->Sender_id == $Parent_id){
           ?>
           <div style="text-align: left; margin-top: 10px; margin-bottom: 5px;">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <?php echo($Parent_name); ?>
            </div>
              <div class="chat-body white p-3 ml-2 z-depth-1">
                <small style="text-align: right;"><i class="far fa-clock"></i> <?php  echo date('d/m/Y h:i a', strtotime($value->time)); ?></small>
                <hr>
                <p>
                  <?php echo($value->message); ?>
                </p>
              </div>

           <?php 
            }
            else if($value->Sender_id == $Teacher_id)
            { 
            ?>
            <div style="text-align: right; margin-top: 10px; margin-bottom: 5px;">
            <?php echo($Teacher_name); ?>
            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
            </div>
              <div class="chat-body white p-3 z-depth-1">
               <small style="text-align: right;"><i class="far fa-clock"></i> <?php  echo date('d/m/Y h:i a', strtotime($value->time)); ?></small>
               <hr>
                <p>
                  <?php echo($value->message) ?>
                </p>
              </div>
          <?php 
            }//else ends here
          }//foreach ends here
          ?> 
          </ul>
          <form action="{{URL::to('message_sending_to/')}}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
          <div class="white">
            <div class="form-group basic-textarea">
            <input type="hidden" id="custId" name="teacher_id" value="<?php echo $Teacher_id;?>">
              <textarea name="messages" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-outline-pink btn-rounded btn-sm waves-effect waves-dark float-right">Send</button>
        </form>

        </div>

      </div>
      <!-- Grid column -->


        </div>
    <!-- Grid row -->

  </div>
</div>
<style type="text/css">
img{
  height: 50px;
}
.card.chat-room .members-panel-1,
.card.chat-room .chat-1 {
position: relative;
overflow-y: scroll; }

.card.chat-room .members-panel-1 {
height: 570px; }

.card.chat-room .chat-1 {
height: 495px; }

.card.chat-room .friend-list li {
border-bottom: 1px solid #e0e0e0; }
.card.chat-room .friend-list li:last-of-type {
border-bottom: none; }

.scrollbar-light-blue::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-light-blue::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-light-blue::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #82B1FF; }

.rare-wind-gradient {
background-image: -webkit-gradient(linear, left bottom, left top, from(#a8edea), to(#fed6e3));
background-image: -webkit-linear-gradient(bottom, #a8edea 0%, #fed6e3 100%);
background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%); }
</style>
      @endsection

@section('footer')
    @parent
@endsection