<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>IvoireLois</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">

    <!-- CSS Unify Template -->
    <link rel="stylesheet" href="/assets/css/theme.min.css">
    <style>
        /* Animation pour le texte de la balise <h1> */
        .animated-heading {
            animation: fadeInUp 1.5s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        /* Animation pour les cartes */
        .card-transition {
            animation: scaleUp 1.5s ease-in-out forwards;
            opacity: 0;
            transform: scale(0.8);
        }

        /* Définition des animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleUp {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

    </style>
</head>

<body>
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light navbar-absolute-top navbar-show-hide"
        data-hs-header-options='{
            "fixMoment": 0,
            "fixEffect": "slide"
          }'>
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="#" aria-label="Unify">
                <img class="navbar-brand-logo" src="images/logoivoirlexgreen.png" alt="Image Description" style="width: 280px;">
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
                <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="navbar-absolute-top-scroller">
                    <ul class="navbar-nav nav-pills">
                        <!-- Landings -->

                        <!-- Log in -->
                        <li class="nav-item ms-lg-auto">
                            <a class="btn btn-dark d-lg-none" href="{{route('law.create')}}">Ajouter un texte</a>
                        </li>
                        <!-- End Log in -->

                        <!-- Sign up -->
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{route('law.create')}}">Ajouter un texte</a>
                        </li>
                        <!-- End Sign up -->
                    </ul>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
<!-- ========== END HEADER ========== -->
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Hero -->
    <div class="d-flex bg-img-center" style="background-image: url(images/law.jpg);">
        <div class="container content-space-t-3 content-space-t-lg-4 content-space-b-1">
            <div class="w-lg-65">
                <h1 class="display-6 mb-5 text-white animated-heading">
                    Trouvez aisément des textes législatifs et réglementaires ivoiriens.
                </h1>
                <form action="{{route('law.searchRequest')}}" method="post">
                    @csrf
                    <!-- Input Card -->
                    <div class="input-card mb-sm-4 card-transition">
                        <div class="input-card-form">
                            <label for="searchInput" class="form-label visually-hidden">
                                Entrez votre recherche
                            </label>
                            <input type="text" class="form-control form-control-lg" id="searchInput" name="searchInput" {{-- value="{{old('searchInput')}}"  --}} value="{{ isset($searchInput) ? $searchInput : '' }}" placeholder="Entrez votre recherche ici" aria-label="Entrez votre recherche ici">
                        </div>
                        <button type="submit" class="btn btn-primary btn-icon">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Links -->
                <div class="d-none d-sm-flex align-items-center">
                    <a class="me-1" href="#">
                        <span class="badge bg-primary">Télécommunication</span>
                    </a>
                    <a class="me-1" href="#">
                        <span class="badge bg-secondary">Cybersécurité</span>
                    </a>
                    <a class="me-1" href="#">
                        <span class="badge bg-secondary">Données à caractère personnel </span>
                    </a>
                </div>
                <!-- End Links -->
            </div>
        </div>
    </div>
    <!-- End Hero -->


    <!-- Card Grid -->
    <div class="container border-top content-space-1 content-space-b-lg-3">
        <div class="row">
            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                <!-- Card -->
                <a class="card card-transition bg-soft-primary h-100" href="#">
                    <div class="card-body">
                        <!-- Icon Block -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-people fs-3 text-dark"></i>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h5 class="card-title">Rejoindre la communauté</h5>
                                <p class="card-text">Rejoignez la communauté des professionels du droit</p>
                            </div>
                        </div>
                        <!-- End Icon Block -->
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                <!-- Card -->
                <a class="card card-transition bg-soft-primary h-100" href="#">
                    <div class="card-body">
                        <!-- Icon Block -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-app-indicator fs-3 text-dark"></i>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h5 class="card-title">Participez à l'amélioration de la plateforme</h5>
                                <p class="card-text">Ajoutez votre pierre à l'édifice</p>
                            </div>
                        </div>
                        <!-- End Icon Block -->
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-lg-4">
                <!-- Card -->
                <a class="card card-transition bg-soft-primary h-100" href="#">
                    <div class="card-body">
                        <!-- Icon Block -->
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-envelope-open fs-3 text-dark"></i>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h5 class="card-title">Contactez-nous par email</h5>
                                <p class="card-text">écrivez-nous sur <span class="text-primary">info@ivoirlex.com</span></p>
                            </div>
                        </div>
                        <!-- End Icon Block -->
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Card Grid -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
<footer class="bg-dark">
    <div class="container">
        <div class="row align-items-md-center py-6">
            <div class="col-md mb-3 mb-md-0">
                <!-- List -->
                <ul class="list-inline list-px-2 mb-0">
                    <li class="list-inline-item"><a class="link link-light link-light-75" href="#">Politique & confidentialité</a></li>
                    <li class="list-inline-item"><a class="link link-light link-light-75" href="#">Accueil</a></li>
                    <li class="list-inline-item"><a class="link link-light link-light-75" href="#">Contact</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-md-auto">
                <p class="fs-5 text-white-70 mb-0">© Copyright. 2023</p>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</footer>
<!-- ========== END FOOTER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Go To -->
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
   data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
</a>
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets/vendor/hs-header/dist/hs-header.min.js"></script>
<script src="/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
<script src="/assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>

<!-- JS Unify -->
<script src="/assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        // INITIALIZATION OF NAVBAR
        // =======================================================
        new HSHeader('#header').init()


        // INITIALIZATION OF MEGA MENU
        // =======================================================
        const megaMenu = new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })


        // INITIALIZATION OF GO TO
        // =======================================================
        new HSGoTo('.js-go-to')
    })()
</script>
</body>
</html>
