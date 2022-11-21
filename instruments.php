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

    <title>Instruments</title>
</head>
<header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">ROCKSTAR STORE</h4>
                        <p class="text-muted">WELCOME IN YOUR STORE</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <ul class="list-unstyled">
                            <h3 class="text-light">profil</h3>
                            <li><a href="#" class="text-white text-decoration-none">Home</a></li>
                            <li><a href="#" class="text-white text-decoration-none">setting</a></li>
                            <li><a href="login.php" class="text-white bg-danger text-decoration-none">log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong><i class="fa-solid fa-music"></i> ROCKSTOR</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
<body>
  
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Type</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col"><a href="add instruments.php" class="btn btn-success float-end">Add Product</a></th>

    </tr>
  </thead>
  <tbody>
                                <?php 
                                    $query = "SELECT * FROM instruments";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $instrument)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $instrument['title']; ?></td>
                                                <td><?= $instrument['type']; ?></td>
                                                <td><?= $instrument['price']; ?></td>
                                                <td><?= $instrument['description']; ?></td>
                                                <td>
                                                    <a href="view.php?id=<?= $instrument['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="edited.php?id=<?= $instrument['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="scripts.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_instrument" value="<?=$instrument['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
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

</body>
</html>