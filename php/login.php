<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet" />
  <!-- BEGIN parsley css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css" />
  <!-- END parsley css-->
  <link rel="stylesheet" href="../css/login.css" />
</head>

<body>
  <header>
    <nav class="navbar navbar-light  ">
      <div class="container-fluid mb-5 ">
        <a class="navbar-brand" href="#">
          <img style="width: 83px;" src="../images/chrome-capture-2022-10-18-removebg-preview (1).png" alt="">
        </a>
        <form class="d-flex">
          <a href="sign up.php"><button class="signup btn btn-outline-primary" type="button">Sign Up</button></a>
        </form>
      </div>
    </nav>
  </header>
  <section class="">
    <div class="container-fluid h-custom">
      <div class="row justify-content-center p-4">
        <div class="col-md-8 col-lg-4 col-xl-4 offset-xl-5">
          <form class="form row justify-content-center bg-white rounded-4 p-3 mb-5  rounded" method="post" action="scripts.php" data-parsley-validate>
            <img class="pb-2 bg-dark rounded mt-1 shadow-lg  mb-5" style="width: 150px;" src="../images/chrome-capture-2022-10-18-removebg-preview (1).png" alt="">
            <?php if (isset($_SESSION['error'])) : ?>
              <div class="alert alert-danger alert-dismissible fade show">
                <strong>error!</strong>
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
              </div>
            <?php endif ?>
            <!-- Email input -->
            <div class="form-outline mb-2">
              <label class="text form-label text-dark" for="form3Example3 "><strong>Email address</strong> </label>
              <input name="email" type="email" id="form3Example3" class="form-control form-control-lg" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[a-z]{2,4}$" placeholder="Enter a valid email address" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="text form-label text-dark" for="form3Example4"> <strong>Password</strong> </label>
              <input name="password" type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" required data-parsley-length="[8, 20]" />
            </div>
            <div class="text-center mt-4 pt-2">
              <button name="login" type="submit" class="login btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem">Login</button>
              <p class="text small fw-bold mt-2 pt-1 mb-0 text-wdark">Don't have an account? <a href="sign up.php" class="register text-danger">Register Now</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- BEGIN jquery js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- END jquery js-->

  <!-- BEGIN parsley js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- END parsley js-->
</body>

</html>