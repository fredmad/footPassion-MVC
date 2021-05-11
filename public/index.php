<?php

use Entity\Links;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';
$orm = new ORM(__DIR__ . '/../Resources');
$linkRepo = $orm->getRepository(Links::class);

if (isset($_GET['search'])) {
    $links = $linkRepo->findBy(array("title" => '%' . $_GET['search'] . '%'));
    } else {
    $links = $linkRepo->findAll();
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Mon CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Icon -->
    <link rel="shortcut icon" href="images/PassionFoot_logo.svg">


    <title>FootPassion</title>
</head>

<body>

    <!-- MAIN NAVIGATION -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/PassionFoot_logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                FootPassion
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-outline-secondary btn-custom" href="?action=login" role="button">Login</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-secondary btn-custom" href="?action=register" role="button">Sign
                            Up</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0" method="get">
                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher sur le blog" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CAROUSEL -->
    <header>
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                <li data-target="#carouselExampleControls" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/PassionFoot_1.png" class="d-block w-100" alt="image de football">
                </div>
                <div class="carousel-item">
                    <img src="images/PassionFoot_2.png" class="d-block w-100" alt="image de football">
                </div>
                <div class="carousel-item">
                    <img src="images/PassionFoot_3.png" class="d-block w-100" alt="image de football">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="bg-light-lilac py-5">
        <h1 class="font-weight-bold text-center">Les plus beau matchs de l'histoire !</h1>
        <section id="add-row" class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Vous-voulez ajouter un match à cette liste ?</h2>
                    <p class="text-muted">Créer un compte ou connectez-vous !</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-3 mb-5">
                    <a href="?action=login" class="btn btn-outline-success btn-block"> Login</a>
                </div>
                <div class="col-md-3 mb-5">
                    <a href="?action=register" class="btn btn-primary btn-block">Sign Up</a>
                </div>
            </div>
        </section>
        <section id="post-row" class="container">
            <div class="row">
                <?php
                foreach ($links as $oneLink) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <a href="<?= $oneLink->urlLink ?>" target="_blank">
                            <div class="wrap">
                                <div class="tile">
                                    <img src='<?= $oneLink->urlImage ?>' />
                                    <div class="text">
                                        <h3><?= $oneLink->title ?></h3>
                                        <h4 class="animate-text"><?= $oneLink->shortDesc ?></h4>
                                        <p class="animate-text"><?= $oneLink->longDesc ?></br>
                                        Posté par @<?= $oneLink->userId->username ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <section class="bg-dark text-light">
        <div class="container">
            <div class="row justify-content-center">
                <ul class="list-unstyled mb-0 py-2">
                    <li>© 2021 Propulsed By FredMad</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>