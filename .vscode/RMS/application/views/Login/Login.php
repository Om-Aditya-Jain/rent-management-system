<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>RMS</title>

</head>
<style>
	body{
		width: 100%;
	    height: 100%;
	    background: #007bff;
	}
	main#main{
		width:100%;
		height: 100%;
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: 100%;
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: 100%;
		background:#22027b;
		display: flex;
		align-items: center;
		background: url(assets/uploads/background.jpg);
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #22027b;
    z-index: 10;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* /*background: #f0d0a0; */
}

</style>

<body>


  <main id="main" class=" bg-light">
  		<div id="login-left" class="bg-dark">
  		</div>

  		<div id="login-right" class="bg-light" style="background-color:red;">
  			<div class="w-100">
			<h1 class="text-center"><b>Login</b></h1>
			<br>
  			<div class="card col-md-7">
  				<div class="card-body">
  					<form id="login-form" action="<?php echo base_url('Login/Login') ?>" method="POST">
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
						<br>
  						<center><input type="submit" class="btn-sm btn-block btn-wave col-md-4 btn-primary"></input></center>
  					</form>
  				</div>
  			</div>
  			</div>
  		</div>
   

  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
