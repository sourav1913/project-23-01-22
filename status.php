<?php
require_once "database.php";
$id = $_GET['id'];

$query = "SELECT status FROM users3 WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)>0){
    $data = mysqli_fetch_assoc($result);
}if($data['status']==1){
    $query = "UPDATE users3 SET status='2' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location: userslist.php");
}else{
    $query = "UPDATE users3 SET status='1' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("Location: userslist.php");
}