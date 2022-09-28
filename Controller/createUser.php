<?php

if (!empty($_POST)) {
    include '../Config/database.php';
    
    $conn = mysqli_connect("$host", "$username", "$passwrd");
    $conn->select_db($db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email = $_POST["email"];
    $first_Name = $_POST["fName"];
    $last_Name = $_POST["lName"];
    // $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $password = $_POST["password"];
    $current_date = date('Y-m-d h:i:s');

    $sql = "INSERT INTO users (fName,lName,email,pass,created_at,updated_at) VALUES ('$first_Name', '$last_Name', '$email', '$password', '$current_date', '$current_date')";

    if ($conn->query($sql) === true) {
        session_start();
        $_SESSION['message'] = "New record created successfully";
        $_SESSION['class'] = "alert-success";
        header('Location:../Auth/signIn.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
