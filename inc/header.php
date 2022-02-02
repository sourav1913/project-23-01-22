<?php
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>My Responsive Website</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/templatemo-style.css">		
	</head>
<body id="top">
	<!-- start preloader -->
	<div class="preloader">
			<div class="sk-spinner sk-spinner-wave">
     	 		<div class="sk-rect1"></div>
       			<div class="sk-rect2"></div>
       			<div class="sk-rect3"></div>
      	 		<div class="sk-rect4"></div>
      			<div class="sk-rect5"></div>
     		</div>
    	</div>
    	<!-- end preloader -->

        <!-- start header -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <p><i class="fa fa-phone"></i><span> Phone</span>+880 18613-88436</p>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <p><i class="fa fa-envelope-o"></i><span> Email</span><a href="mailto:souravbairagi81@gmail.com">souravbairagi81@gmail.com</a></p>
                    </div>
                    <div class="col-md-5 col-sm-4 col-xs-12">
                        <ul class="social-icon">
                            <li><span>Meet us on</span></li>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="https://www.youtube.com/" class="fa fa-youtube"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->

    	<!-- start navigation -->
		<nav class="navbar navbar-default"  role="navigation">
			<div class="container">
            <a class="navbar-brand" href="index.php"><i style="font-weight: bolder;"><marquee style="color:aqua;">SBM</marquee></i></a>
				<div class="navbar-header ">
					<button class="navbar-toggle"  data-toggle="collapse" data-target="#navbarSupportedContent">
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="nav navbar-nav navbar-right ms-auto" >
						<li><a href="index.php">HOME</a></li>
						<li ><a href="userslist.php">USERS LIST</a></li>

						<?php
							if(isset($_SESSION['id'])){
						?>
                       	 <li><a href="logout.php">LOG OUT</a></li>
						<?php
							}else{
						?>
						    <li><a href="login.php">LOG IN</a></li>
						<?php
							}
						?>
						<li><a href="signup.php">SIGN UP</a></li>
					</ul> 
				</div>
			</div>
		</nav>
		<!-- end navigation -->

    	