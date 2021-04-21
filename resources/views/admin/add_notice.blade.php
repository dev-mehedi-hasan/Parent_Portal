@extends('layouts.admin.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')

<form class="border border-light p-5" action="{{URL::to('/post_notice')}}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
										<?php
                                        $messege = Session::get('message');
                                        if ($messege) {
                                            echo $messege;
                                            Session::put('message',null);
                                        }
                                        
                                        ?>

    <p class="h4 mb-4 text-center">Add Notice</p>

    <label for="textInput">Title</label>
    <input name="title" type="text" class="form-control mb-4" placeholder="Title">


    <label for="textarea">Notice Description(Optional)</label>
    <textarea name="description" id="textarea" class="form-control mb-4" placeholder="Textarea"></textarea>

	<label for="select">Department</label>
    <select name="department_id" class="form-control mb-4">
        <option value="" disabled="" selected="">Choose your option</option>
        <option value="1">Computer Science Engineering</option>
        <option value="2">Software Engineering</option>
        <option value="3">Electrical & Electronic Engineering</option>
    </select>

    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            <input name="file" type="file" class="custom-file-input" id="file">
            <label class="custom-file-label" for="fileInput">File Label</label>
        </div>
    </div>

                   <button type="submit" style="width: 20%; margin-left: 380px;" class="btn btn-success btn-block">Post Notice
                    <i class="mdi mdi mdi-share"></i>
                  </button>
</form>

@endsection

@section('footer')
    @parent
@endsection