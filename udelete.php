<?php
    require_once "database.php";
    $id = $_GET['id'];
    $query = "DELETE FROM users3 WHERE id = $id";
    $result = mysqli_query($conn, $query);
        header("Location: userslist.php");