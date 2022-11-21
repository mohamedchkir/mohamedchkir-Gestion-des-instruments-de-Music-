<?php
session_start();
require 'config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Instruments</title>
</head>
<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 pt-3">
                    <p class="text-muted font-monospace">WELCOME IN YOUR STORE</p>
                    <p class="text-light font-monospace">HERE YOU CAN SEE YOUR PRODUCTS </p>
                </div>
                <div class="col-sm-4 offset-md-1 pt-3">
                    <ul class="list-unstyled d-grid gap-2">
                        <h3 class="text-light">profil</h3>
                        <li class=""><a href="dashbord.php" class="link-light text-decoration-none font-monospace">Home</a></li>
                        <li class=""><a href="instruments.php" class="link-light text-decoration-none font-monospace">Product Table</a></li>
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
                <img style="width: 80px;" src="images/chrome-capture-2022-10-18-removebg-preview (1).png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<body>
    <div class="d-flex flex-row justify-content-center gap-2 pt-5 ">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header text-light font-monospace text-center">Count Price</div>
            <div class="card-body">
                <h5 class="card-title">Dark card title</h5>
                <p class="card-text"></p>
            </div>
        </div>
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Danger card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>

        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Danger card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header text-light font-monospace text-center">Count Product</div>
            <div class="card-body">
                <h5 class="card-title">Dark card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>

    <table class="table table-dark table-striped mt-1 ">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col"><a href="add instruments.php" class="btn btn-success float-end">Add Product</a></th>

            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM instruments";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $instrument) {
            ?>
                    <tr>
                        <td><img width="55px" height="55px" src="uploads/<?= $instrument['image']; ?>" alt=""></td>
                        <td><?= $instrument['title']; ?></td>
                        <td><?= $instrument['type']; ?></td>
                        <td><?= $instrument['price']; ?></td>
                        <td><?= $instrument['description']; ?></td>
                        <td>
                            <a href="view.php?id=<?= $instrument['id']; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="edited.php?id=<?= $instrument['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                            <a href="scripts.php?idInstrument=<?= $instrument['id']; ?>" class="btn btn-danger btn-sm">Delete</a>

                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<h5 > No Record Found </h5>";
            }
            ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>