<?php
include 'scripts.php';
if(!isset($_SESSION['admin-id'])){
    header('location: login.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
</head>

<body>
    <section>
        <div class="container mt-5">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-success border-bottom border-success">
                            <h4>Add an instrument
                                <a href="instruments.php" class="btn btn-success float-end ">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="scripts.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" class="form-control border-success" name="my_image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control border-success" name="title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Type</label>
                                    <select class="form-select  border-success"  name="type" aria-label="Default select example" id="type">
                                        <option value="BOWED STRINGS">BOWED STRINGS</option>
                                        <option value="WOODWIND">WOODWIND</option>
                                        <option value="BRASS INSTRUMENTS">BRASS INSTRUMENTS</option>
                                        <option value="PERCUSSION INSTRUMENTS">PERCUSSION INSTRUMENTS</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Price</label>
                                    <input type="text" class="form-control border-success" name="price" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input type="text" class="form-control border-success" name="description" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="save" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>
<?php
}

?>