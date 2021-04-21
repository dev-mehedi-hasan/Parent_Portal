@extends('layouts.parent.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
    <p>

    <table style="margin-left: 10px;">
    	<tr>
    		<td> <label for="sel1">Academic Id:</label> </td>
    		<td> <label for="sel1">Select Semester:</label>  </td>
    		<td></td>
    	</tr>
    	<tr>
<form action="{{URL::to('/parent_academic_result_show')}}" method="post">
  {{ csrf_field() }}

    		<td> <input name="student_academic_id" type="text" class="form-control" placeholder="Student's Academic Id"> </td>
    		<td> <select name="semester_name" class="form-control">
	 				<option>Summer-2019</option>
			    	<option>Fall-2018</option>
	    			<option>Spring-2018</option>
	  			 </select> 
	  		</td>
    		<td> <button style="background-color: #39B24A !important;" type="submit" class="btn btn-info">Show Result</button> </td>
</form>
    	</tr>
    </table>

 </p>

@endsection

@section('footer')
    @parent
@endsection