<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="dashbord.css">
</head>

<body>
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <nav class="sidebar">
        <div class="text">
        </div>
        <ul class="main_side">
            <li class="active"><a href="#">Dashboard</a></li>
            <li>
                <a href="#" id="1">Pages
                    <span class="fas fa-caret-down"></span>
                </a>
                <ul class="item-show-1">
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">Our Team</a></li>
                </ul>
            </li>
            <li>
                <a href="#" id="2">Services
                    <span class="fas fa-caret-down"></span>
                </a>
                <ul class="item-show-2">
                    <li><a href="#">App Design</a></li>
                    <li><a href="#">Web Design</a></li>
                </ul>
            </li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Message</a></li>
            <li><a href="#">Bookmark</a></li>
            <li><a href="#">Files</a></li>
        </ul>
    </nav>
    <div class="content">
        <div class="header">
            Main content goes here
        </div>

    </div>
    <!-- <script src="scripts.js"></script> -->
    <script src="dashbord.js"></script>
</body>

</html>