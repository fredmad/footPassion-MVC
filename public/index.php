<?php
require "../vendor/autoload.php";

use Entity\Links;
use Entity\Users;

$user1 = new Users(1, "FredMad", "Fred0201!");

$link1 = new Links(1, "Liverpool - Milan AC", "« Le miracle d’Istanbul »", "La finale de la Ligue des champions 2005, qui demeure l’un des plus grands si ce n’est LE plus grand match que cette compétition ait connu. Ce Liverpool - AC Milan restera est la plus belle finale de l’histoire de la C1, tant le scénario du match fut un véritable ascenseur émotionnel.", "https://editorial.uefa.com/resources/0254-0e8ee4c04620-de66d7d1ccd9-1000/format/square1/steven_gerrard_led_liverpool_s_dramatic_comeback_in_the_uefa_champions_league_final.jpeg", "https://www.youtube.com/watch?v=hG4LvyfYVXI&ab_channel=RMCSport", "2021-05-10 15:00:00", $user1);
$link2 = new Links(2, "Barcelone - PSG", "« La Remontada »", "Nous présentons d'ores et déjà nos excuses aux supporters parisiens pour ce qui va suivre mais il était difficile - pour ne pas dire impossible - de ne pas inclure la fameuse « Remontada » dans ce top. Tout a été dit ou presque sur ce huitième de finale qui fut le théâtre du plus incroyable renversement de situation de l'histoire de la compétition.", "https://medias.lequipe.fr/img-photo-jpg/-l-r-samuel-umtiti-of-fc-barcelona-sergi-roberto-of-fc-barcelona-andre-gomes-of-fc-barcelona-ger/1500000000891455/0:0,2496:1664-650-400-75/9feaf.jpg", "https://www.youtube.com/watch?v=h4m68r8kWAc&ab_channel=FCBarcelona", "2021-05-10 15:00:00", $user1);
$link3 = new Links(3, "Liverpool - Barcelone", "« La Remontada n°2»", "Encore une histoire de remontada ! Le Barça se retrouve dans le rôle de la victime, crucifiée par un boureau nommé Liverpool, en demi-finale de l'édition 2019. Tout avait pourtant bien commencé pour les coéquipiers de Lionel Messi ! Les Catalans remportent en effet le match aller (3-0). Mais rien ne va se passer comme prévu 6 jours plus tard à Anfield !", "https://photo.maxifoot.fr/georginio-wijnaldum-2.jpg", "https://www.youtube.com/watch?v=01F9N7GeDMg&ab_channel=RMCSport", "2021-05-10 15:00:00", $user1);
$link4 = new Links(4, "Real Madrid - Atlético", "« La Decima »", "Certains regretteront probablement la présence de la finale de l'édition 2014 dans ce top, mais l'égalisation tardive des Madrilènes au bout du temps additionnel, reste l'un des plus incroyables comebacks de l'histoire de la Ligue des champions. Ce match a connu en effet un final époustouflant que les supporters du Real ne sont pas prêts d'oublier.", "https://secure.static.goal.com/410600/410655_hp.jpg", "https://www.youtube.com/watch?v=9XfuxIvcQEw&feature=emb_imp_woyt&ab_channel=UEFA", "2021-05-10 15:00:00", $user1);
$link5 = new Links(5, "Tottenham - Ajax", "« Un miracle signé Lucas »", "L'ancien parisien, auteur d'un triplé, a en effet connu son jour de gloire lors de cette demi-finale incroyable disputée à l'ArenA d'Amsterdam. Il faut dire que, dès le tirage au sort, la perspective de voir l'Ajax, équipe frisson de cette édition 2019, se mesurer aux hommes de Pochettino et leur football attrayant en faisait saliver plus d'un.", "https://www.leparisien.fr/resizer/NUtKdaSZ-2hLLty1fcVMjwgAX-Q=/932x582/arc-anglerfish-eu-central-1-prod-leparisien.s3.amazonaws.com/public/LWK36LKQ4WT65J5HLVLJ5HB7AQ.jpg", "https://www.youtube.com/watch?v=n05oIoU73Wg&feature=emb_imp_woyt&ab_channel=RMCSport", "2021-05-10 15:00:00", $user1);

$items = [$link1, $link2, $link3, $link4, $link5];

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
                            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher sur le blog" aria-label="Search">
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
                foreach ($items as $oneItem) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <a href="<?= $oneItem->urlLink ?>" target="_blank">
                            <div class="wrap">
                                <div class="tile">
                                    <img src='<?= $oneItem->urlImage ?>' />
                                    <div class="text">
                                        <h3><?= $oneItem->title ?></h3>
                                        <h4 class="animate-text"><?= $oneItem->shortDesc ?></h4>
                                        <p class="animate-text"><?= $oneItem->longDesc ?></br>
                                        Posté par @<?= $oneItem->userId->username ?></p>
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