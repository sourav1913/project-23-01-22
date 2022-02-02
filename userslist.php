<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location:login.php');
    
}
    require_once "database.php";
    $query = "SELECT id, name, uname, email, photo, status FROM users3";

    $result = mysqli_query($conn,$query); 

    if(mysqli_num_rows($result) > 0){
        $datas  = mysqli_fetch_all($result,true);
    }
    require_once "inc/header.php";
?>
<section id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-header">
                            <h2 class="wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s"><span>USERS LIST</span></h2>                        
                            </div>
                            <div class="card-body"> 
                            <table class="table table-bordered">
                                <tr class="table-dark btn-primary">
                                    <th>ID</th>
                                    <th>PHOTO</th> 
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>EMAIL</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                    <th>VERIFICATION</th>
                                </tr>

                                <?php
                                    foreach($datas as $data){
                                ?>
                                <tr>
                                    <td><?= $data['id']?></td>
                                    <td><img width="40" src="uploads/profile/<?= $data['photo']?>" alt=""></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['uname'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['status']==1 ? "Active" : "Deactive"?></td>
                                    <td>                                    
                                        <a href="status.php?id=<?= $data['id']?>" class="badge bg-primary btn"><?= $data['status']==1 ? "Deactive" : "Active"?></a>
                                    </td>
                                    <td>
                                        <a href="user.php?id=<?= $data['id']?>" class="badge bg-primary btn">View</a>
                                        <a href="uedite.php?id=<?=$data['id']?>" class="badge bg-primary btn">Edit</a>
                                        <a href="udelete.php?id=<?= $data['id']?>" class="badge bg-primary btn">Delete</a>
                                    </td>

                                </tr>
                                <?php
                                    }
                                ?>                              
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php 
    require_once "inc/footer.php";
?>



