<?php

if (!empty($_GET)) {
    include '../Config/database.php';
    
    $conn = mysqli_connect("$host", "$username", "$passwrd");
    $conn->select_db($db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $post_id = $_GET['postId'];
    session_start();
    $current_user_id = $_SESSION["user_id"];
    $current_date = date('Y-m-d h:i:s');

    $sql = "DELETE from posts where id = $post_id";

    if ($conn->query($sql)) {
        session_start();
        $_SESSION['message'] = "post Deleted successfully";
        $_SESSION['class'] = "alert-danger";
        header('Location:../index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
