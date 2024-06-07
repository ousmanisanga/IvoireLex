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
    <link rel="stylesheet" href="/assets/css/vendor.min.css">

    <!-- CSS Unify Template -->
    <link rel="stylesheet" href="/assets/css/theme.min.css?v=1.0">

</head>

<body>
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="{{route('index')}}" aria-label="Unify">
                <img class="navbar-brand-logo" src="/images/logoivoirlexprimary.png" alt="Image Description">
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
                <ul class="navbar-nav nav-pills">

                    <!-- Pages -->
                    <li class="hs-has-mega-menu nav-item">

                    </li>

                    <li class="nav-item ms-lg-auto">
                        <a class="btn btn-dark d-lg-none" href="#">Ajouter un texte</a>
                    </li>
                    <!-- End Log in -->

                    <!-- Sign up -->
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('law.create') }}">Ajouter un texte</a>
                    </li>
                    <!-- End Sign up -->
                </ul>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>

<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->

<main id="content" role="main">
    <!-- Content -->
    <div class="container content-space-1 content-space-b-lg-3">
        <div class="row mb-7">
            <div class="col-md mb-3 mb-md-0">
                <div class="mb-3">
                    <a class="link-bordered link-secondary" href="{{ route('index')}}"><i class="bi-arrow-left small me-1"></i> Retour</a>
                </div>

                <h3 class="mb-0">{{$loi->typeLoi}} n° {{$loi->numeroLoi}} du {{$loi->datePublication}} portant sur {{$loi->titre}}</h3>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="row">
            <div class="col-lg-3 order-lg-2 mb-5 mb-lg-0">
                <div id="stickyBlockStartPoint">
                    <!-- Card -->
                    <div class="js-sticky-block card card-borderless bg-soft-dark" data-hs-sticky-block-options='{
                 "parentSelector": "#stickyBlockStartPoint",
                 "targetSelector": "#header",
                 "breakpoint": "lg",
                 "startPoint": "#stickyBlockStartPoint",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                        <div class="card-body">
                            <dl>
                                <dt style="display: inline; margin-right:10px" >Statut:</dt>
                                <dd style="display: inline; margin-right:10px"  >
                                    <span class="badge bg-{{$loi->statut == 'Abrogé' ? 'danger' : 'primary'}}">{{$loi->statut}}</span>
                                </dd>
                                <dt class="mt-4">Date Publication:</dt>
                                <dd>{{Carbon\Carbon::parse($loi->datePublication)->translatedFormat('j F Y')}}</dd>
                                <dt style="display: inline; margin-right:10px" class="mt-4">Auteur : </dt>
                                <dd style="display: inline; margin-right:10px">ARTCI.</dd>

                            </dl>

                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Col -->
            <div class="col-lg-9">
                <div class="mb-7">

                    <p>
                        {{$loi->contenu}}
                    </p>
                    <p>
                        {{$loi->annexe}}
                    </p>
                    <a href="{{ route('lois.telechargerFichier', ['fichier' => $loi->fichier]) }}" style="text-decoration:none; " >Télécharger le texte en PDF...</a>

                    @if ($loi->typeLoi != 'Loi')

                        @if($reference)
                            <div class="mb-7 mt-4">
                                <div class="mb-3">
                                    <h4>Bases réglémentaires : </h4>
                                </div>
                                @if ($reference->count() === 0)
                                    @if (Auth::check())
                                    <a class="btn " href="{{ route('references.create', ['id' => $loi->id])  }}" style="background-color: #ff8333; color:#fff">Ajouter une Référence</a>

                                    @else
                                        <p>Aucune référence ajoutée pour l'instant </p>
                                    @endif

                                @else
                                    @foreach($reference as $ref)
                                        <a class="btn btn-soft-secondary btn-sm mb-1" href="{{ route('lois.show', ['numeroLoi'=> $ref->code]) }}">
                                        {{ $ref->lois->typeLoi}}  n°  {{$ref->code}}
                                        </a><br>
                                    @endforeach
                                    @if (Auth::check())
                                    <a class="btn " href="{{ route('references.create', ['id' => $loi->id])  }}" style="background-color: #ff8333; color:#fff"> Nouvelle Référence ?</a>

                                    @endif

                                @endif

                            </div>

                        @endif

                    @endif

                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
</main>

{{-- <main id="content" role="main">
    <!-- Content -->
    <div class="container content-space-1 content-space-b-lg-3">
        <div class="row mb-7">
            <div class="col-md mb-3 mb-md-0">
                <div class="mb-3">
                    <a class="link-bordered link-secondary" href="{{ route('index')}}"><i class="bi-arrow-left small me-1"></i> Retour</a>
                </div>

                <h3 class="mb-0">{{$loi->typeLoi}} n° {{$loi->numeroLoi}} du {{$loi->datePublication}} portant sur {{$loi->titre}}</h3>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="row">
            <div class="col-lg-3 order-lg-2 mb-5 mb-lg-0">
                <div id="stickyBlockStartPoint">
                    <!-- Card -->
                    <div class="js-sticky-block card card-borderless bg-soft-dark" data-hs-sticky-block-options='{
                 "parentSelector": "#stickyBlockStartPoint",
                 "targetSelector": "#header",
                 "breakpoint": "lg",
                 "startPoint": "#stickyBlockStartPoint",
                 "endPoint": "#stickyBlockEndPoint",
                 "stickyOffsetTop": 20
               }'>
                        <div class="card-body">
                            <dl>
                                <dt style="display: inline; margin-right:10px" >Statut:</dt>
                                <dd style="display: inline; margin-right:10px"  >
                                    <span class="badge bg-{{$loi->statut == 'Abrogé' ? 'danger' : 'primary'}}">{{$loi->statut}}</span>
                                </dd>
                                <dt class="mt-4">Date Publication:</dt>
                                <dd>{{Carbon\Carbon::parse($loi->datePublication)->translatedFormat('j F Y')}}</dd>
                                <dt style="display: inline; margin-right:10px" class="mt-4">Auteur : </dt>
                                <dd style="display: inline; margin-right:10px">ARTCI.</dd>

                            </dl>

                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
            <!-- End Col -->
            <div class="col-lg-9">
                <div class="mb-7">

                    <p>
                        {{$loi->contenu}}
                    </p>
                    <p>
                        {{$loi->annexe}}
                    </p>
                    <a href="{{ route('lois.telechargerFichier', ['fichier' => $loi->fichier]) }}" style="text-decoration:none; " >Télécharger le texte en PDF...</a>

                    @if ($loi->typeLoi != 'Loi')

                        @if($reference)
                            <div class="mb-7 mt-4">
                                <div class="mb-3">
                                    <h4>Bases réglémentaires : </h4>
                                </div>
                                @if ($reference->count() === 0)
                                    @if (Auth::check())
                                    <a class="btn " href="{{ route('references.create', ['id' => $loi->id])  }}" style="background-color: #ff8333; color:#fff">Ajouter une Référence</a>

                                    @else
                                        <p>Aucune référence ajoutée pour l'instant </p>
                                    @endif

                                @else
                                    @foreach($reference as $ref)
                                        <a class="btn btn-soft-secondary btn-sm mb-1" href="{{ route('lois.show', ['numeroLoi'=> $ref->code]) }}">
                                        {{$ref->lois->typeLoi}}  n°  {{$ref->code}}
                                        </a><br>
                                    @endforeach
                                    @if (Auth::check())
                                    <a class="btn " href="{{ route('references.create', ['id' => $loi->id])  }}" style="background-color: #ff8333; color:#fff"> Nouvelle Référence ?</a>

                                    @endif

                                @endif

                            </div>

                        @endif

                    @endif

                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
</main> --}}
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
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
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

<!-- JS Implementing Plugins -->
<script src="/assets/js/vendor.min.js"></script>

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


        // INITIALIZATION OF STICKY BLOCKS
        // =======================================================
        new HSStickyBlock('.js-sticky-block', {
            targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
        })
    })()
</script>
</body>
</html>
