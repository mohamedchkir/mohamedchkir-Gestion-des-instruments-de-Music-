<?php

//INCLUDE DATABASE FILE
include('config.php');

//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

// SIGN UP
if (isset($_POST['signin'])) {

    //SQL SELECT 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $Cpassword = md5($_POST['Cpassword']);

    $select = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = 'user already exist';
        header('location:sign up.php');
        die;
    } else {
        $insert = " INSERT INTO users(name,email,password) VALUES ('$name','$email','$password')";
        mysqli_query($conn, $insert);
        header('location:login.php');
        die;
    }
};

// CHECK LOGIN INFO IN DB
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM users WHERE email='$email' && password='$password'";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        header('location:dashbord.php');
        $_SESSION['username'] = $row['name'];
        $_SESSION['admin-id'] = $row['id'];
        die;
    } else {
        $_SESSION['error']  = 'Email or Password are incorrect !';
        header('location:login.php');
        die;
    }
};


// ADD AN INSTRUMENT WITH IMAGE
if (isset($_POST['save']) && isset($_FILES['my_image'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 2000000) {
            $em = "Sorry, your file is too large.";
            header("Location: add instruments.php?error=$em");
            die;
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // INSERT INTO DB
                $sql = "INSERT INTO `instruments`( `title`, `type`, `price`, `image`, `description`)
                 VALUES ('$title','$type','$price','$new_img_name','$description')";
                mysqli_query($conn, $sql);
                header("Location: instruments.php");
                die;
            } else {
                $em = "You can't upload files of this type";
                header("Location: add instruments.php?error=$em");
                die;
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: add instruments.php?error=$em");
        die;
    }
}

// DELETE AN INSTRUMENT
if (isset($_GET['idInstrument'])) {

    //SQL SELECT 
    $instrument_id = $_GET['idInstrument'];

    $query = "DELETE FROM instruments WHERE id='$instrument_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['success'] = "instrument Deleted Successfully";
        header("Location: instruments.php");
        die;
    } else {
        $_SESSION['erreur'] = "instrument Not Deleted";
        header("Location: instruments.php");
        die;
    }
}

// UPDATE AN INSTRUMENT 
if (isset($_POST['update_instrument'])) {

    //SQL SELECT 
    $instrument_id = mysqli_real_escape_string($conn, $_POST['instrument_id']);
    $Title = mysqli_real_escape_string($conn, $_POST['title']);
    $Type = mysqli_real_escape_string($conn, $_POST['type']);
    $Price = mysqli_real_escape_string($conn, $_POST['price']);
    $Description = mysqli_real_escape_string($conn, $_POST['description']);
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 2000000) {
            $em = "Sorry, your file is too large.";
            header("Location: add instruments.php?error=$em");
            die;
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $query = "UPDATE instruments SET title='$Title', type='$Type', price='$Price', description='$Description', image='$new_img_name' WHERE id='$instrument_id' ";
                mysqli_query($conn, $query);
                $_SESSION['success'] = "instrument Updated Successfully";
                header("Location: instruments.php");
                die;
            } else {
                $em = "You can't upload files of this type";
                header("Location: add instruments.php?error=$em");
                die;
            }
        }
    } else {
        $_SESSION['erreur'] = "instrument Not Updated";
        header("Location: instruments.php");
        die;
    }
}

// COUNT PRODUCT FUNCTION
function countProduct()
{
    $requete = "SELECT COUNT(id) FROM instruments";
    global $conn;
    $res = mysqli_fetch_assoc(mysqli_query($conn, $requete));
    return $res['COUNT(id)'];
}
// COUNT PRICE FUNCTION
function countPrice()
{

    global  $conn;
    $requete = "SELECT SUM(price) FROM instruments;";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $requete));
    return $res['SUM(price)'];
}

// MAX PRICE FUNCTION
function maxPrice()
{

    global  $conn;
    $requete = "SELECT MAX(price) FROM instruments;";
    $res = mysqli_fetch_array(mysqli_query($conn, $requete));
    return $res['MAX(price)'];
}

// MIN PRICE FUNCTION
function minPrice()
{

    global  $conn;
    $requete = "SELECT MIN(price) FROM instruments;";
    $res = mysqli_fetch_array(mysqli_query($conn, $requete));
    return $res['MIN(price)'];
}
