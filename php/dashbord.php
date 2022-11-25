<?php
include 'scripts.php';
if (!isset($_SESSION['admin-id'])) {
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 pt-3">
                        <p class="text-muted font-monospace">&nbsp; &nbsp; &nbsp; WELCOME IN YOUR STORE</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 pt-3">
                        <ul class="list-unstyled d-grid gap-2">
                            <h3 class="text-light fst-italic"> HELLO <?php echo $_SESSION['username'] ?></h3>
                            <li class=""><a href="dashbord.php" class="link-light text-decoration-none font-monospace">Home</a></li>
                            <li class=""><a href="instruments.php" class="link-light text-decoration-none font-monospace">Product Table && Statistiques</a></li>
                            <li class=""><a href="#" class="link-light text-decoration-none font-monospace">setting</a></li>
                            <li><a href="login.php" class=" btn btn-danger btn-sm font-monospace">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm py-0">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <!-- <strong><i class="fa-solid fa-music"></i> ROCKSTOR</strong> -->
                    <img style="width: 80px;" src="../images/chrome-capture-2022-10-18-removebg-preview (1).png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
    <section>
        <div class="cards d-flex justify-content-evenly py-4 row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 rounded ">

            <?php
            $query = "SELECT * FROM instruments";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $instrument) {
            ?>
                    <div class="card mb-3  border border-dark" style="width: 18rem; ">
                        <div class="" style="height: 200px ;background-position:center;background-repeat: no-repeat;
                         background-image:url(../uploads/<?= $instrument['image']; ?>)"></div>
                        <div class="card-body">
                            <h5 class="card-title text-truncat"><?= $instrument['title']; ?></h5>
                            <p class="card-text overflow-auto text truncat text-secondary"><?= $instrument['description']; ?></p>
                            <p class="card-text overflow-auto text truncat text-success"><?= $instrument['price']; ?> DH</p>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo  " 
                     <h5> No Product Found </h5>
                    ";
            }
            ?>

        </div>
        </div>
    </section>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>