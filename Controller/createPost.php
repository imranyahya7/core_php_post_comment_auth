<?php

if (!empty($_POST)) {
    include '../Config/database.php';
    
    $conn = mysqli_connect("$host", "$username", "$passwrd");
    $conn->select_db($db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $title = $_POST["title"];
    $post = $_POST["post"];
    session_start();
    $current_user_id = $_SESSION["user_id"];
    $current_date = date('Y-m-d h:i:s');

    $sql = "INSERT INTO posts (post_title, post,`user_id`,created_at,updated_at) VALUES 
    ('$title', '$post', '$current_user_id', '$current_date', '$current_date')";

    if ($conn->query($sql) === true) {
        session_start();
        $_SESSION['message'] = "New post added successfully";
        $_SESSION['class'] = "alert-success";
        header('Location:../index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
