<?php
if (isset($_GET['id'])) {

    $id = $_GET['id'];

} else {
    die("404 Error");
}

include("config/db_connect.php");

$result = $con->query("SELECT * FROM `songs_data` WHERE id=$id");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="30" />
    <title><?php echo $row["title"]; ?> - Download getMusic.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="./img/getmusic_logo.png" type="image/x-icon">
    <style>
        .searchResults {
            position: absolute;
            background-color: black;
            border: 2px solid blue;
            z-index: 50;
            display: none;
            color: white;
            font-size: 14px;

        }

        #searchlink:hover {
            color: red;
        }
    </style>
    <script type="text/javascript" src="script.js"></script>
    <link rel="icon" href="./img/getmusic_logo.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg fs-5 bg-dark">
        <div class="container-fluid mx-4 p-2">
            <a class="navbar-brand text-white " href="index.php">
                <img src="./img/getmusic_logo.png" alt="Logo" width="25" height="30"
                    class="d-inline-block align-text-top">
                getMusic
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Exclusive.php">Exclusive</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Top50.php">TOP 50</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu bg-dark ">
                            <li><a class="dropdown-item  text-warning" href="Category.php">Single</a></li>
                            <li><a class="dropdown-item  text-warning" href="Category.php">EP</a></li>
                            <li><a class="dropdown-item  text-warning" href="Category.php">Album</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Genres
                        </a>
                        <ul class="dropdown-menu bg-dark ">
                            <li><a class="dropdown-item  text-warning" href="Genre.php">Pop</a></li>
                            <li><a class="dropdown-item  text-warning" href="Genre.php">Rock</a></li>
                            <li><a class="dropdown-item  text-warning" href="Genre.php">Jazz</a></li>
                        </ul>
                    </li>

                </ul>

                <form class="d-flex" role="search" action="result.php" method="post">
                    <input class="form-control me-2" id="search" placeholder="search here..." size="50" name="result" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                    <div class="mt-5 searchResults">
                        <div id="display"> </div>

                    </div>
                </form>
            </div>

        </div>
    </nav>

    <div class="main m-2 mt-5 mx-4 p-2 ">
        <div class="container-fluid my-3">
            <section class="text-center mt-4 mb-2 p-2 mx-4">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <table class="table border table-border">
                            <thead>
                                <tr>
                                    <th class="fs-4">
                                        <?php echo $row["title"]; ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <img src="<?php echo $row["album_art"]; ?>" class="w-50 rounded mx-auto d-block"
                                            alt="">
                                    </th>
                                </tr>

                            </thead>
                            <tbody class="text-start">

                                <tr>
                                    <td><i class="fa-solid fa-music"></i>&nbsp; Singers : <?php echo $row["artist_name"]; ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-file-pen"></i>&nbsp; Album Artist : <?php echo $row["album_artist"]; ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-hashtag"></i>&nbsp; Genre :</td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-calendar-days"></i>&nbsp; Release date : <?php echo $row["year_released"]; ?> </td>
                                </tr>

                                <tr>
                                    <td><i class="fa-regular fa-file"></i>&nbsp; File size : <?php echo $row["file_size"]; ?> MB </td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-record-vinyl"></i>&nbsp; Duration : <?php echo $row["duration"]; ?>    </td>
                                </tr>

                                <tr>
                                    <td><i class="fa-solid fa-eye"></i>&nbsp; Seen :</td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-download"></i>&nbsp; Count of downloads :</td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-circle-info"></i><a href="#"
                                            style="text-decoration: none;">&nbsp; Something Wrong? </a> </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-dark">Download Now &nbsp;<i
                                class="fa-regular fa-floppy-disk"></i></button>
                        <?php

    }
}


                        ?>
                    </div>
            </section>
        </div>

    </div>

    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(172, 172, 172, 0.2);">
            © 2023 getMusic All rights reserved.

        </div>
        <!-- Copyright -->
    </footer>
    <script>
        $("#search").keyup(function () {
            $(".searchResults").show().width($("#search").width());
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>