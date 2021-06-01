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

    <title>{{title_head}}</title>
</head>

<body>

    <!-- Main navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
        <div class="container d-flex justify-content-center align-items-center py-1">
            <a class="navbar-brand" href="/display">
                <img src="images/PassionFoot_logo.svg" width="30" height="30" class="d-inline-block" alt="logo de foot">
                FootPassion
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex justify-content-center align-items-center connect">
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <li class="nav-item mx-2">
                            <p>
                                Vous êtes connecté en tant que : <?= $_SESSION['user']->username ?>
                            </p>
                        </li>
                        <li class="nav-item mx-2">
                            <p>-</p>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="btn-lg btn btn-outline-light py-1 px-2" href="/logout" role="button" type="submit">Se déconnecter</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item pl-2">
                            <a class="btn-lg btn btn-outline-light py-1 px-2" href="/login" role="button" type="submit">Se connecter</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="btn-lg btn btn-outline-light py-1 px-2" href="/register" role="button" type="submit">S'inscrire</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form class="form-inline" method="get" action="/search">
                            <input class="form-control mr-sm-2" type="text" name="search" aria-label="Search" placeholder="Rechercher sur le blog ..." value="<?= $_GET['search'] ?? "" ?>"></input>
                            <button class="btn btn-outline-light myBtn py-1 px-2" type="submit">Rechercher</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
        <img src="../images/footPassionHeader.png" alt="Une image de foot">
    </header>

    <!-- Main content -->
    <main>
        <h1 class="py-3">FootPassion est un site qui vous propose de revivre<br>
            Les plus beaux matchs de l'histoire !</h1>

        <?php
        if (isset($_SESSION['user'])) {
        ?>
            <section class="container">
                <div class="row">
                    <div class="col newPost">
                        <ul class="list-group">
                            <li class="d-flex justify-content-center pb-2">
                                <h2 class="h3">Vous-voulez ajouter un match à cette liste ?</h2>
                            </li>
                            <li class="d-flex justify-content-center">
                                <a class="nav-link btn btn-primary btn-lg" href="/post" role="button" type="submit">Ajouter un match</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>

        <section class="container">
            <div class="row py-4">
                <?php
                foreach ($links as $oneLink) {
                ?>
                    <div class="link col col-lg-6">
                        <a href="<?= $oneLink->urlLink ?>" target="_blank">
                            <div class="d-flex justify-content-center">
                                <div class="tile my-4">
                                    <img src='<?= $oneLink->urlImage ?>' />
                                    <div class="text">
                                        <h3><?= $oneLink->title ?></h3>
                                        <h4 class="h5 animate-text"><?= $oneLink->shortDesc ?></h4>
                                        <p class="animate-text">
                                            <?= $oneLink->longDesc ?>
                                        </p>
                                        <p class="animate-text">
                                            <a href="?search=@<?= $oneLink->userId->username ?>">
                                                Posté par @<?= $oneLink->userId->username ?>
                                            </a>
                                        </p>
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
    <footer class="bg-dark text-light sticky-bottom">
        <div class="container">
            <div class="row justify-content-center pt-3 pb-0">
                <p>©2021 Propulsed By FredMad</p>
            </div>
        </div>
    </footer>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>