<?php
    require_once "inc/header.php";
?>
        <section id="contact">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-6">
    					<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><span>LOG IN</span> HERE</h2>
    				</div>
    				<div class="col-md-offset-3 col-md-6" data-wow-offset="50" data-wow-delay="0.9s">
    					<form action="login_Sign.php" method="post">
    						
                            <label>EMAIL</label>
                            <input name="email" type="email" class="form-control">    
                         
                            <label>PASSWORD</label>
                            <input name="password" type="password" class="form-control">  						

                            <input type="submit" name="login" value="Log In"class="form-control">
    					</form>
    				</div>
    			</div>
    		</div>
    	</section>
<?php 
    require_once "inc/footer.php";
?>