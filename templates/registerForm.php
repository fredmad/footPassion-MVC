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
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-5">
                    <form class="form-signin" method="POST" action="/register">
                    <h1 class="form-signin-heading text-center">Inscription !</h1>
                    <?php
                    if (isset($errorMsg)) {
                        echo "<div class='alert alert-warning' role='alert' style='background-color:red; color:white;'>$errorMsg</div>";
                    }
                    ?>
                    <input type="text" class="form-control my-2" name="username" placeholder="Username (4 characters)" required="" autofocus="" />
                    <input type="password" class="form-control my-2" name="password" placeholder="Password (8 characters)" required="" />
                    <label class="my-2">Taper à nouveau le mot de passe :</label>
                    <input type="password" class="form-control mb-2" name="passwordRetype" placeholder="Password" required="" />
                    <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>          
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light fixed-bottom">
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