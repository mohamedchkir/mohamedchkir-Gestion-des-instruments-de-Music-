<?php
require 'config.php';
include 'scripts.php';
if (!isset($_SESSION['admin-id'])) {
    header('location: login.php');
} else {
?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Instrument Edit</title>
    </head>

    <body>

        <div class="container mt-5">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-warning border-bottom border-warning">
                            <h4>instrument Edit
                                <a href="instruments.php" class="btn btn-warning text-light float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <?php
                            if (isset($_GET['id'])) {
                                $instrument_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM instruments WHERE id='$instrument_id' ";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    $instrument = mysqli_fetch_array($query_run);
                            ?>
                                    <form action="scripts.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="instrument_id" value="<?= $instrument['id']; ?>">

                                        <label> <strong>IMAGE</strong></label>
                                        <div class="mb-3 d-flex justify-content-center">
                                            <img class="text-center" height="150px" src="../uploads/<?= $instrument['image']; ?>" alt="">
                                        </div>
                                        <div>
                                            <input type="file" class="form-control border-warning" name="my_image">
                                        </div>

                                        <div class="mb-3">
                                            <label> <strong>Title</strong></label>
                                            <input type="text" class="form-control border-warning" name="title" value="<?= $instrument['title']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label><strong>Type</strong></label>
                                            <select class="form-select border-warning" name="type" aria-label="Default select example" id="type">
                                                <option value="BOWED STRINGS">BOWED STRINGS</option>
                                                <option value="WOODWIND">WOODWIND</option>
                                                <option value="BRASS INSTRUMENTS">BRASS INSTRUMENTS</option>
                                                <option value="PERCUSSION INSTRUMENTS">PERCUSSION INSTRUMENTS</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label><strong>Price</strong></label>
                                            <input type="text" class="form-control border-warning" name="price" value="<?= $instrument['price']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label><strong>Description</strong></label>
                                            <input type="text" class="form-control border-warning" name="description" value="<?= $instrument['description']; ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update_instrument" class="btn btn-warning text-light">
                                                UPDATE
                                            </button>
                                        </div>

                                    </form>
                            <?php
                                } else {
                                    echo "<h4>No Id Found</h4>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
}
?>