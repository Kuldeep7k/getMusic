<?php
//Check if any account is login or not

//Connect to Database connection 
include("config/db_connect.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>getMusic - Download Music For Free</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    <input class="form-control me-2" id="search" placeholder="search here..." size="50" name="result"
                        aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                    <div class="mt-5 searchResults">
                        <div id="display"> </div>

                    </div>
                </form>
            </div>

        </div>
    </nav>

    <div class="main m-2 mt-5 mx-4 p-2 ">
        <div class="header text-center mt-4">
            <h1>Genre</h1>
        </div>

        </ul>
        <div class="container-fluid my-3">
            <section class="text-center mt-4 mb-2 mx-4">
                <div class="row">

                    <?php
                    include('config/db_connect.php');


                    $i = 0;


                    $result = $con->query("SELECT * FROM songs_data");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                    ?>
                    <div class="card mx-1 mt-2" style="width: 21rem;">
                        <a href="Download.php?id=<?php echo $row["id"]; ?>&<?php echo $row["title"]; ?>">
                            <img src="<?php echo $row["album_art"]; ?>" class="card-img-top" alt="logo"> </a>
                        <div class="card-body">
                            <p class="card-text fw-bold">
                                <a style="text-decoration: none; color: black;"
                                    href="Download.php?id=<?php echo $row["id"]; ?>&<?php echo $row["title"]; ?>">
                                    <?php echo $row["title"]; ?> - Free Download
                                </a>
                            </p>
                        </div>
                    </div>
                    <?php

                            $i++;
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