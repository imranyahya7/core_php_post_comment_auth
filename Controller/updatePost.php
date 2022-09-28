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
    $post_id = $_POST['postId'];
    session_start();
    $current_user_id = $_SESSION["user_id"];
    $current_date = date('Y-m-d h:i:s');

    $sql = "UPDATE posts set post_title = '$title', post = '$post', updated_at = '$current_date' where id = $post_id";

    if ($conn->query($sql) === true) {
        session_start();
        $_SESSION['message'] = "post updated successfully";
        $_SESSION['class'] = "alert-info";

        header('Location:../index.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
