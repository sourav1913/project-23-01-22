<?php
    require_once "database.php";
    $id = $_GET['id'];
    $query ="SELECT * FROM users3 WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result)){
        $data = mysqli_fetch_assoc($result);
    }
    if(isset($_POST['submit'])){
        $name = trim(htmlentities($_POST['name']));
        $uname = trim(htmlentities($_POST['uname']));
        $email = trim(htmlentities($_POST['email']));
        $photo = $_FILES['photo'];
       
    
        if(empty($name)){
            $error['nameerr'] = "First Name is Requied!";
        }if(empty($uname)){
            $error['unameerr'] = "Last Name is Requied!";
        }if(empty($email)){
            $error['emailerr'] = "Email is Requied!";
        }if(empty($photo['name'])){
            $error['photoerr'] = "Upload Your Photo!";
        }
       
       
        if(empty($error)){
            require_once "database.php";
                if($photo['name']){
                    $ext = explode('.',$photo['name']);
                    $photoName = $name.'-'.time().'.'.end($ext);
                    $uploads = move_uploaded_file($photo["tmp_name"], 'uploads/profile/'. $photoName);
                    $xFile = "uploads/profile/" .$data['photo'];
                    if($xFile){
                        unlink($xFile); 
                    }
                    $query = "UPDATE users3 SET name='$name', uname='$uname',email='$email', photo ='$photoName' WHERE id =$id";    
                    $result = mysqli_query($conn,$query);
                }else{ 
                    $query = "UPDATE users3 SET name='$name', uname='$uname',email='$email' WHERE id =$id";    
                    $result = mysqli_query($conn,$query);
                }
               
        
                if($result){
                    header("Location: userslist.php");
                }
            
        }
    }
    
require_once "inc/header.php";
?>
<section id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">
        
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit User</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <?php
                                        if(isset($error['nameerr'])){
                                            echo "<p style = 'color:red;'>".$error['nameerr'] ."</p>";
                                        }
                                    ?>
                                    <input type="text" class="form-control" name="name" value="<?= $data['name']?>">
                                </div>
                                
                                
                                <div class="mb-3">
                                    <?php
                                        if(isset($error['unameerr'])){
                                            echo "<p style = 'color:red;'>".$error['unameerr']."</p>";
                                        }
                                    ?>
                                    <input type="text" class="form-control" name="uname" value="<?= $data['uname']?>">
                                </div>
                                
                                
                                <div class="mb-3">
                                    <?php
                                        if(isset($error['emailerr'])){
                                            echo "<p style = 'color:red;'>".$error['emailerr']."</p>";
                                    }
                                    ?>
                                <input type="email" class="form-control" name="email" value="<?= $data['email']?>">
                                </div>                       
                                
                                <div class="mb-3">
                                    <?php
                                    if(isset($error['nameerr'])){
                                        echo "<p style = 'color:red;'>".$error['photoerr']."</p>";
                                    }
                                    ?>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="mb-3">
                                <td><img width="40" src="uploads/profile/<?= $data['photo']?>" alt=""></td>
                                </div>
                                <input type="submit" class=" btn btn-primary" name="submit" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
 require_once "inc/footer.php";