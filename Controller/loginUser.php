<?php

if (!empty($_POST)) {
    include '../Config/database.php';
    $conn = mysqli_connect("$host", "$username", "$passwrd");
    $conn->select_db($db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $password = '123';

    $sql = "SELECT id, fName,lName,email,pass FROM `users` WHERE email = '$email' AND pass = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        session_start();
        $_SESSION['message'] = "Logged in successfully";
        $_SESSION['class'] = "alert-success";
        $_SESSION['base_url'] = "http://localhost/core_php_user_post/";
        $_SESSION['user'] = $row['fName']. ' '. $row['lName'];
        $_SESSION['user_id'] = $row['id'];
        header('Location:../index.php');
        exit;
    } else {
        session_start();
        $_SESSION['message'] = "Email id or password does not match";
        $_SESSION['class'] = "alert-danger";
        header('Location:../Auth/signIn.php');
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
