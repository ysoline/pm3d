<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="public/img/favicon.png" />
    <link rel="stylesheet" type="text/css" href="public/style.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?= $title = "Jean Forteroche" ?></title>
</head>

<body>
    <header class="blog-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="navbar-header">
                <a class="navbar-brand" href="./">Jean Forteroche</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="d-flex flex-column flex-sm-row justify-content-between col-lg-11">
                    <ul class="nav navbar-nav">
                        <li>
                            <?php if (!isset($_SESSION['id_user'])) { ?>
                                <a class="nav-link" href="inscription"><span class="glyphicon glyphicon-user"></span>Inscription</a>
                            <?php } ?>
                        </li>
                        <li>
                            <?php if (isset($_SESSION['id_user'])) { ?>
                                <a class="nav-link text-decoration-none mx-2" href="profil">Profil</a>
                        </li>
                        <li>
                            <?php if (($_SESSION['rank_id']) == 1) { ?>
                                <a class="nav-link" href="administration">Administration</a>
                        <?php }
                        } ?>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li>
                            <?php if (!isset($_SESSION['id_user'])) { ?>
                                <a class="btn btn-sm btn-outline-light" href="connexion"><span class="fas fa-user-alt"></span>
                                    Connexion</a>
                            <?php } ?>
                        </li>
                        <li>
                            <?php if (isset($_SESSION['id_user'])) { ?>
                                <a class="btn btn-sm btn-outline-light" href="deconnexion"><i class="fas fa-power-off"></i>
                                    Déconnexion</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            <div id="carousel_alaska" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel_alaska" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel_alaska" data-slide-to="1"></li>
                    <li data-target="#carousel_alaska" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="public/img/1.jpg" alt="jean forteroche lac alaska">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="public/img/2.jpg" alt="chien loup alaska">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="public/img/3.jpg" alt="lac gelé alaska">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel_alaska" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précedente</span>
                </a>
                <a class="carousel-control-next" href="#carousel_alaska" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivante</span>
                </a>
            </div>

            <div class="text-center m-4">
                <h1>"Billet simple pour l'Alaska"<br /><small class="text-muted"> par </small>Jean Forteroche</h1>
            </div>
        </div>
    </header>


    <div class="container-fluid mt-2 py-4">
        <?= $content ?>
    </div>


    <footer>
        <div class="blog-footer bg-dark text-center p-3">
            <p class="text-light">Copyright © Julie Pilarski - 2019 - Tous droits réservés</p>
            <small class="text-light">Projet 4 - Formation Développeur Web Junior</small><br />
            <a href="mentionslegales"><small class="text-light">Mentions Légales </small></a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="public/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#post, #postEdit',
            language: 'fr_FR'
        });
    </script>
    <script src="public/js/script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">

    </script>
</body>

</html>