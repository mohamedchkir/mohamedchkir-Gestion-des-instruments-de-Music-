<?php

//INCLUDE DATABASE FILE
include('config.php');

//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

// CHECK PASSWORD
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
        die;
    } else {
        // $_SESSION['error'];
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
        if ($img_size > 1250000) {
            $em = "Sorry, your file is too large.";
            header("Location: add instruments.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
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
        $_SESSION['message'] = "instrument Deleted Successfully";
        header("Location: instruments.php");
        die;
    } else {
        $_SESSION['message'] = "instrument Not Deleted";
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

    $query = "UPDATE instruments SET title='$Title', type='$Type', price='$Price', description='$Description' WHERE id='$instrument_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "instrument Updated Successfully";
        header("Location: instruments.php");
        exit(0);
    } else {
        $_SESSION['message'] = "instrument Not Updated";
        header("Location: instruments.php");
        exit(0);
    }
}

// ADD PRODUCT
// if (isset($_POST['save'])) {
//     $Title = mysqli_real_escape_string($conn, $_POST['title']);
//     $Type = mysqli_real_escape_string($conn, $_POST['type']);
//     $Price = mysqli_real_escape_string($conn, $_POST['price']);
//     $Description = mysqli_real_escape_string($conn, $_POST['description']);

//     $query = "INSERT INTO instruments (title,type,price,description) VALUES ('$Title','$Type','$Price','$Description')";

//     $query_run = mysqli_query($conn, $query);
//     if ($query_run) {
//         $_SESSION['message'] = "instrument Created Successfully";
//         header("Location: instruments.php");
//         exit(0);
//     } else {
//         $_SESSION['message'] = "instrument Not Created";
//         header("Location: instruments.php");
//         exit(0);
//     }
// }
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
    $total = 0;
    global $rows, $conn;
    $requete = "SELECT SUM(price) FROM instruments;";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $requete));
    //$total+= $rows['price'];
    //var_dump($res[0]);

    return $res['SUM(price)'];
}

// MAX PRICE FUNCTION
function maxPrice()
{
    $total = 0;
    global $rows, $conn;
    $requete = "SELECT MAX(price) FROM instruments;";
    $res = mysqli_fetch_array(mysqli_query($conn, $requete));
    //$total+= $rows['price'];
    //var_dump($res[0]);

    return $res['MAX(price)'];
}

// MIN PRICE FUNCTION
function minPrice()
{
    $total = 0;
    global $rows, $conn;
    $requete = "SELECT MIN(price) FROM instruments;";
    $res = mysqli_fetch_array(mysqli_query($conn, $requete));
    //$total+= $rows['price'];
    //var_dump($res[0]);

    return $res['MIN(price)'];
}
