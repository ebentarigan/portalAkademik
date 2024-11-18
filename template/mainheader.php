<?php
define('HOST', "http://localhost/portalakademik")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Akademik</title>
    <link href="<?= HOST ?>/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <h3><a class="navbar-brand" href="#"><i class="bi bi-award me-1"></i>Portal Akademik</a></h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= HOST ?>">Home</a>
                    </li><!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= HOST ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Master
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= HOST . "/students/" ?>">Students</a></li>
                            <li><a class="dropdown-item" href="<?= HOST . "/studyprograms/" ?>">Study Programs</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">News</a></li>
                        </ul>
                    </li><!--
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>-->
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                <a href="<?= HOST . "/login.php" ?>" class="btn btn-dark">Login</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-2">
            <div class="col-md-2">
                <!--Left Side Menu-->
            </div>
            <div class="col-md-10 align-self-stretch">