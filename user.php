<?php
require_once "database.php";
$id = $_GET['id'];
$query ="SELECT * FROM users3 WHERE id = $id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)){
    $data = mysqli_fetch_assoc($result);
}
require_once "inc/header.php";
?>
    <section  id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h3><?=$data['name'] ?></h3>
                            </div>
                            <div> 
                            <table class="table table-dark table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td><?=$data['name']?></td>
                                </tr>
                                <tr>
                                    <td>User Name</td>
                                    <td><?=$data['uname']?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?=$data['email']?></td>
                                </tr>
                                <tr>
                                <td><img width="50" src="uploads/profile/<?= $data['photo']?>" alt="<?= $data['name'] ?>"></td>
                                <td><?=$data['photo']?></td>
                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
require_once "inc/footer.php";