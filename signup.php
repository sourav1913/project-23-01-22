<?php

$error=[];

    if(isset($_POST['submit'])){
        $name = trim(htmlentities($_POST['name']));
        $uname = trim(htmlentities($_POST['uname']));
        $email = trim(htmlentities($_POST['email']));
        $password = $_POST['password'];
        $encpass = md5($password);
        $conpassword = $_POST['conpassword'];
        $photo = $_FILES['photo'];
        if(empty($name)){
            $error['nameerr'] = "First Name is Requied!";
        }if(empty($uname)){
            $error['unameerr'] = "Last Name is Requied!";
        }if(empty($email)){
            $error['emailerr'] = "Email is Requied!";
        }if(empty($password)){
            $error['passworderr'] = "Password is Requied!";
        }if(empty($conpassword)){
            $error['conpassworderr'] = "Confirm Password is Requied!";
        }if($password != $conpassword){
            $error['pass3'] = "Password don't match!";
        }if(empty($photo['name'])){
            $error['photoerr'] = "Upload Your Photo!";
        }
        if(empty($error)){
            require_once "database.php";
                $ext = explode('.',$photo['name']);
                $photoName = $name.'-'.time().'.'.end($ext);
                $file_ex = ['jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF'];
                if(in_array(end($ext),$file_ex)){
                    echo "Allow!";
                }else{
                    echo "Picture Not Support!";
                    exit();
                }
                $uploads = move_uploaded_file($photo["tmp_name"], 'uploads/profile/'. $photoName);
                if($uploads){
                    $query = "INSERT INTO users3(name,uname,email,password,photo) VALUES ('$name','$uname','$email','$encpass','$photoName')";    
                    $result = mysqli_query($conn,$query);
                if($result){
                    $success = "User Insert Successfully!";
            }
        }else{
            $error = "File Not Uploated!";
            }
            
    }
}
require_once "inc/header.php";
?>
<section id="contact">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12">
    					<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s">Please <span>SIGN UP</span></h2>
    				</div>
    				<div class="col-md-offset-3 col-md-6" data-wow-offset="50" data-wow-delay="0.9s">
						<?php
							if(isset($success)){
						?>
						<div class="alert alert-success">
							<p><?= $success ?></p>
						</div>
						<?php
						}
						?>	
					<form action="" method="post" enctype="multipart/form-data">
							<?php
                                if(isset($error['nameerr'])){
                                    echo "<p style = 'color:red;'>".$error['nameerr'] ."</p>";
                                }
                            ?>
    						<label>FIRST NAME</label>
    						<input name="name" type="text" class="form-control">
   						  	
							<?php
                                if(isset($error['unameerr'])){
                                    echo "<p style = 'color:red;'>".$error['unameerr'] ."</p>";
                            	}
                            ?>
                            <label>LAST NAME</label>
    						<input name="uname" type="text" class="form-control">
   						  	
							<?php
                                if(isset($error['emailerr'])){
                                    echo "<p style = 'color:red;'>".$error['emailerr'] ."</p>";
                            	}
                            ?>
                            <label>EMAIL</label>
                            <input name="email" type="email" class="form-control">    
                         
							<?php
                                if(isset($error['passworderr'])){
                                    echo "<p style = 'color:red;'>".$error['passworderr'] ."</p>";
                            	}
                            ?>
                            <label>PASSWORD</label>
                            <input name="password" type="password" class="form-control">  						
                            
							<?php 
                                if(isset($error['conpassworderr'])){
                                    echo "<p style = 'color:red;'>".$error['conpassworderr']."</p>";
                                }if(isset($error['pass3'])){
                                    echo "<p style = 'color:red;'>".$error['pass3']."</p>";
                                }
                            ?>
                            <label>CONFRIM PASSWORD</label>
                            <input name="conpassword" type="password" class="form-control">

							<?php
                            	if(isset($error['nameerr'])){
                                    echo "<p style = 'color:red;'>".$error['photoerr']."</p>";
                                }
                            ?>
                            <label>PHOTO</label>
                            <input name="photo" type="file" class="form-control">

                            <input type="submit" name="submit" class="form-control">
    					</form>
    				</div>
    			</div>
    		</div>
    	</section>
    	<!-- end contact -->

<?php
    require_once "inc/footer.php";
?>