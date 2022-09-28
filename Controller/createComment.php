<?php

if (!empty($_POST)) {
    include '../Config/database.php';
    
    $conn = mysqli_connect("$host", "$username", "$passwrd");
    $conn->select_db($db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $post_id = $_POST["post_id"];
    $comment = $_POST["comment"];
    session_start();
    $current_user_id = $_SESSION["user_id"];
    $current_date = date('Y-m-d h:i:s');

    $sql = "INSERT INTO comments (commnt, post_id,`user_id`,created_at) VALUES 
    ('$comment', '$post_id', '$current_user_id', '$current_date')";

    if ($conn->query($sql) === true) {
        session_start();
        $_SESSION['message'] = "New comment added";
        $_SESSION['class'] = "alert-success";
        header('Location:../index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
