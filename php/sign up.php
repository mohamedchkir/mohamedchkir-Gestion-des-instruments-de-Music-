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
  <link rel="stylesheet" href="../css/signup.css" />
</head>

<body>
  <section class="">
    <div class="container-fluid mt-4 d-flex justify-content-center">
      <a class="navbar-brand pt-4" href="#">
        <img style="width: 150px;" src="images/chrome-capture-2022-10-18-removebg-preview (1).png" alt="">
      </a>
    </div>
    <div class="container  py-3" style="width: 550px">
      <div class="d-flex justify-content-center align-items-center rounded bg-light">

        <div class="col-sm-10 col-md-11 col-lg-7 ">
          <form method="POST" action="scripts.php" data-parsley-validate>
            <?php
            if (isset($_SESSION['error'])) {

              echo '<span class="error_msg">' . $_SESSION['error'] . '</span>';
              unset($_SESSION['error']);
            }

            ?>
            <!-- Username input -->
            <div class="form-outline my-2">
              <label class="text form-label text-dark" for="form3Example2 ">Username</label>
              <input type="text" name="name" id="form3Example2" class="form-control form-control-lg" placeholder="Enter your username" required data-parsley-length="[8, 40]" data-parsley-group="block-2" />
            </div>
            <!-- Email input -->
            <div class="form-outline mb-2">
              <label class="text form-label text-dark" for="form3Example3 ">Email address</label>
              <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[a-z]{2,4}$" placeholder="Enter a valid email address" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-2">
              <label class="text form-label text-dark" for="form3Example4">Password</label>
              <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter Password " required data-parsley-length="[8, 20]" />
            </div>
            <!--Confirm Password input -->
            <div class="form-outline mt-2 w-100">
              <label class="text form-label text-dark" for="form3Example4">Cofirm Password</label>
              <input type="password" name="Cpassword" id="form3Example5" class="form-control form-control-lg" placeholder="Confirm Password" required data-parsley-equalto="#form3Example4" />
            </div>
            <div class="text-center text-lg-start mt-4 pt-2 d-flex justify-content-center">
              <button name="signin" type="submit" class="login btn btn-primary btn-lg mb-4" style="padding-left: 2.5rem; padding-right: 2.5rem">Sign Up</button>
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