<?php
session_start();
if(isset($_POST['login'])){
    $email = trim(htmlentities($_POST['email']));
    $password = $_POST['password'];
    $encpass = md5($password);

    require_once "database.php";

    $query = "SELECT id,name,email,password FROM users3 WHERE email = '$email' AND password = '$encpass' ";
    $result = mysqli_query($conn, $query);
   
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['email'] = $data['email'];
        header('Location:userslist.php');
    }else{
        header('Location:login.php');
    }
}