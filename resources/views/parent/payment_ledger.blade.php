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
<br>
@foreach($payment_ledger as $payment_ledgers)
            <div  class="row">
                <div class="col-md-12">
                    <div class="card  height">
                        <div class="card-header">Studenr Details</div>
                        <div class="card-block">

                            <table>

                                <tr>
                                    <td> <strong>Student Name</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;">  {{$payment_ledgers->student_name}} </td>
                                </tr>
                                <tr>
                                    <td> <strong>Department</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;"> {{$payment_ledgers->department_name}}</td>
                                </tr>
                                <tr>
                                    <td> <strong>Semester</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;">{{$payment_ledgers->semester_name}}</td>
                                </tr>
                                <tr>
                                    <td> <strong>Id</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;"> {{$payment_ledgers->student_academic_id}} </td>
                                </tr>
                                <tr>
                                    <td> <strong>Total Credit</strong> </td>
                                    <td style="padding-left: 5px;"> : </td>
                                    <td style="padding-left: 5px;"> {{$payment_ledgers->total_credits}} 
                                    </td>
                                </tr>
                            </table>
                           


                        </div>
                    </div>
                </div>
            </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="text-xs-center"><strong> Ledger </strong></h3>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <td> <strong> Total Payable </strong> </td>
                                    <td class="text-xs-center"> </td>
                                    <td class="text-xs-center"> </td>
                                    <td class="text-xs-right"> {{$payment_ledgers->total_payable}} </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <strong> Total Paid </strong> </td>
                                    <td class="text-xs-center"> </td>
                                    <td class="text-xs-center"> </td>
                                    <td class="text-xs-right"> {{$payment_ledgers->total_paid}} </td>
                                </tr>
                               
                                <tr>
                                    <td><strong> Waiver </strong></td>
                                    <td class="text-xs-center"> </td>
                                    <td class="text-xs-center"> </td>
                                    <td class="text-xs-right">{{$payment_ledgers->waiver}}</td>
                                </tr>
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                    </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-xs-center"><strong> Total Due </strong></td>
                                    <td class="emptyrow text-xs-right">{{$payment_ledgers->total_due}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach  

</div>


<div class="astrodivider"><div class="astrodividermask"></div><span><i>&#10038;</i></span></div> 

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
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
@endsection

@section('footer')
    @parent
@endsection