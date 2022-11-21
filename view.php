<?php
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

    <title> View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>instrument View Details 
                            <a href="instruments.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $instrument_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM instruments WHERE id='$instrument_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $instrument = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>instrument Title</label>
                                        <p class="form-control">
                                            <?=$instrument['title'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>instrument Type</label>
                                        <p class="form-control">
                                            <?=$instrument['type'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>instrument Price</label>
                                        <p class="form-control">
                                            <?=$instrument['price'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>instrument Description</label>
                                        <p class="form-control">
                                            <?=$instrument['description'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
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