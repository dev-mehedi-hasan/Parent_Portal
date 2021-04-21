@extends('layouts.parent.master')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')

<div style="text-align: center; margin-top: 10px; border: 2px solid">
  <span class="navbar-brand"><h2><strong>Payment Scheme</strong></h3></span>
</div>

<table style="margin-bottom: 10px;" id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Payment Name
      </th>
      <th class="th-sm">Amount
      </th>
      <th class="th-sm">Multiple
      </th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Admission Fee</td>
      <td>10000</td>
      <td>Admission time</td>
    </tr>
     <tr>
      <td>Campus Development Fee</td>
      <td>4500</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Extra Curriculam Fee</td>
      <td>1500</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Lab Fee</td>
      <td>1500</td>
      <td>	Every semester</td>
    </tr>
     <tr>
      <td>Rover Scout & BNCC Fee</td>
      <td>500</td>
      <td>Admission time</td>
    </tr>
     <tr>
      <td>Semester Fee</td>
      <td>4500</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Tuition Fee ( Core )</td>
      <td>2200</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Tuition Fee ( Core With Lab for 1 Credit )</td>
      <td>2750</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Tuition Fee ( Core With Lab for 2 Credit )</td>
      <td>2934</td>
      <td>Every semester</td>
    </tr> 
    <tr>
      <td>Tuition Fee ( Core With Lab for 3 Credit )</td>
      <td>2567</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Tuition Fee ( Core With Lab for 4 Credit )</td>
      <td>2475</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Tuition Fee ( Dissertation/ Oral Assessment )</td>
      <td>3000</td>
      <td>Every semester</td>
    </tr> 
    <tr>
      <td>Tuition Fee ( General Course )</td>
      <td>2200</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Tuition Fee ( Lab )	</td>
      <td>3300</td>
      <td>Every semester</td>
    </tr>
     <tr>
      <td>Tuition Fee ( Non Core )</td>
      <td>2200</td>
      <td>Every semester</td>
    </tr> 
    <tr>
      <td>Tuition Fee ( Project/Thesis/Internship )</td>
      <td>3300</td>
      <td>Every semester</td>
    </tr>
  </tbody>

</table>

@endsection

@section('footer')
    @parent
@endsection