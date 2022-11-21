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
        $insert = " INSERT INTO users(name,email,password) VALUES ('$name','$email','$password')";
        mysqli_query($conn, $insert);
        header('location:login.php');
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
        // $_SESSION['error'];
        header('location:login.php');
    }
};



if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: add instruments.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO instruments(image) 
				        VALUES('$new_img_name')";
				mysqli_query($conn, $sql);
				header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: add instruments.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: add instruments.php?error=$em");
	}

}else {
	header("Location: add instruments.php");
}


if(isset($_POST['delete_instrument']))
{
    $instrument_id = mysqli_real_escape_string($conn, $_POST['delete_instrument']);

    $query = "DELETE FROM instruments WHERE id='$instrument_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "instrument Deleted Successfully";
        header("Location: instruments.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "instrument Not Deleted";
        header("Location: instruments.php");
        exit(0);
    }
}

if(isset($_POST['update_instrument']))
{
    $instrument_id = mysqli_real_escape_string($conn, $_POST['instrument_id']);

    $Title = mysqli_real_escape_string($conn, $_POST['title']);
    $Type = mysqli_real_escape_string($conn, $_POST['type']);
    $Price = mysqli_real_escape_string($conn, $_POST['price']);
    $Description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "UPDATE instruments SET title='$Title', type='$Type', price='$Price', description='$Description' WHERE id='$instrument_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "instrument Updated Successfully";
        header("Location: instruments.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "instrument Not Updated";
        header("Location: instruments.php");
        exit(0);
    }

}

// ADD PRODUCT
if(isset($_POST['save']))
{
    $Title = mysqli_real_escape_string($conn, $_POST['title']);
    $Type = mysqli_real_escape_string($conn, $_POST['type']);
    $Price = mysqli_real_escape_string($conn, $_POST['price']);
    $Description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "INSERT INTO instruments (title,type,price,description) VALUES ('$Title','$Type','$Price','$Description')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "instrument Created Successfully";
        header("Location: instruments.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "instrument Not Created";
        header("Location: instruments.php");
        exit(0);
    }
}
