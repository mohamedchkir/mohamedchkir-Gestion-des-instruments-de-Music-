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
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header>
    <nav class="navbar navbar-light">
      <div class="container-fluid mb-4">
        <a class="navbar-brand" href="#">
          <h3 class="rockstar mt-2"><strong>ROCKSTAR</strong></h3>
        </a>
        <form class="d-flex">
          <a href="index.php"><button class="signup btn btn-outline-primary" type="button">Sign Up</button></a>
        </form>
      </div>
    </nav>
  </header>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-4 col-xl-4 offset-xl-5">
          <form class="form" method="post" action="scripts.php">
            <h2 class="text-warning"><strong>GOOD TO SEE YOU AGAIN</strong></h2>
            <?php
            if (isset($_SESSION['error'])) {

              echo '<span class="error_msg">' . $_SESSION['error'] . '</span>';
              unset($_SESSION['error']);
            }

            ?>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="text form-label text-white" for="form3Example3 ">Email address</label>
              <input name="email" type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <label class="text form-label text-white" for="form3Example4">Password</label>
              <input name="password" type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
              <button name="login" type="submit" class="login btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem">Login</button>
              <p class="text small fw-bold mt-2 pt-1 mb-0 text-white">Don't have an account? <a href="index.php" class="register text-danger">Register Now</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>