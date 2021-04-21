<!DOCTYPE html>
<html lang="en">
<head>
<title>DIU Parent Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="{{ asset('css/login/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login/style.css') }}" rel="stylesheet">
	
	
	
</head>
<body>

<div class="signupform">
	<div class="container">
		<div class="agile_info">
			<div class="w3l_form">
				<div class="center_grid_info">
					<h1>Parent Portal</h1>
					<p style="margin-right: 31px; text-align: center;">𝐀 𝐝𝐢𝐬𝐭𝐢𝐧𝐠𝐮𝐢𝐬𝐡𝐞𝐝 𝐥𝐚𝐧𝐝𝐦𝐚𝐫𝐤 𝐢𝐧 𝐡𝐢𝐠𝐡𝐞𝐫 𝐞𝐝𝐮𝐜𝐚𝐭𝐢𝐨𝐧</p>
					<img src="images/login/diuIcon.png" alt="" />
				</div>
			</div>
			<div class="w3_info">
					<?php
					$messege = Session::get('message');
					if ($messege) {
						echo $messege;
						Session::put('message',null);
					}
					
					?>
				<h2>Login to your Account</h2>
				<p>Enter your details to login.</p>

				<form action="{{URL::to('/parent_login')}}" method="post">
						{{ csrf_field() }}

					<label>Email Address</label>
					<div class="input-group">
						<span class="fa fa-envelope" aria-hidden="true"></span>
						<input type="email" name="email" placeholder="Enter Your Email" required=""> 
					</div>
					<label>Password</label>
					<div class="input-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<input type="Password" name="password" placeholder="Enter Password" required="">
					</div> 
											
						<button type="submit"  class="btn btn-danger btn-block" type="submit">Login</button >                
				</form>
				<p class="account">By clicking login, you agree to our <a href="#">Terms & Conditions!</a></p>
				<p class="account1">Forgot Password? <a href="#">Click here</a></p>
			</div>
		</div>
	</div>
	
	<div class="footer">
		<p>&copy; 2019. All Rights Reserved | Design by <a href="#" target="blank">Mehedi Hasan</a></p>
	</div>
	
</div>
	
</body>
</html>