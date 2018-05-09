<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BK Healthcare</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	{{-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> --}}
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />

	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body background="images/bg.jpg">


	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '415863205491500',
				cookie     : true,
				xfbml      : true,
				version    : 'v3.0'
			});

			FB.AppEvents.logPageView();		

		};

		

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));


		function statusChangeCallback(){
			FB.getLoginStatus(function(response){
				if(response.status === 'connected'){
					FB.api('/me', function(response) {
						console.log('Successful login for: ' + response.name);

						loadLogin(response.name);
					});
				}
			});
		}

		function login() {

			FB.getLoginStatus(function(response) {
				if(response.status === 'connected'){
					// window.location.href = 'fbconnect.php';
					FB.api('/me', function(response) {
						console.log('Successful login for: ' + response.name);
						
						loadLogin(response.name);
					});
				}else{
					FB.login(function(r) {
						if(r.authResponse) {
							// window.location.href = 'fbconnect.php';
							FB.api('/me', function(response) {
								console.log('Successful login for: ' + response.name);
								loadLogin(response.name);
							});
						} else {
						}
					},{scope:'email'}); 
				}
			});

		}

		function testAPI() {
			console.log('Welcome!  Fetching your information.... ');
			FB.api('/me', function(response) {
				console.log('Successful login for: ' + response.name);
				document.getElementById('status').innerHTML =
				'Thanks for logging in, ' + response.name + '!';
			});
		}

		function loadLogin(username){
			var info_login = document.getElementById('info-login');
			info_login.innerHTML = username;
			var divLogin = document.getElementById("form-login");
			divLogin.setAttribute('hidden', '');
			var divLogout = document.getElementById("form-logout");
			divLogout.removeAttribute('hidden');

			document.getElementById('username').innerHTML = username;
		}

		function logout(){
			FB.logout(function(response) {
				var info_login = document.getElementById('info-login');
				info_login.innerHTML = "Login";
				var divLogin = document.getElementById("form-login");
				divLogin.removeAttribute('hidden');
				var divLogout = document.getElementById("form-logout");
				divLogout.setAttribute('hidden','');
				document.getElementById('username').innerHTML = "";
			});
		}


	</script>




	@include('header')

	<div class="container">
		@yield('content')
	</div>

	@include('footer')
</body>
</html>