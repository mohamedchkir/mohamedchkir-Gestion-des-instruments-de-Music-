<?php
session_start();
include('config.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $Cpassword = md5($_POST['Cpassword']);

    $select = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = 'user already exist';
    } else {
        if ($password != $Cpassword) {
            $_SESSION['error'] = 'password not matched';
        } else {
            $insert = " INSERT INTO users(name,email,password) VALUES ('$name','$email','$password')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM users WHERE email='$email' && password='$password'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        header('location:dashbord.php');
        die();
    } else {
        $_SESSION['error'];
        header('location:login.php');
    }
};
