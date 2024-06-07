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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/css/vendor.min.css">

    <!-- CSS Unify Template -->
    <link rel="stylesheet" href="/assets/css/theme.min.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



</head>

<body>
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light navbar-absolute-top navbar-show-hide" data-hs-header-options='{
            "fixMoment": 0,
            "fixEffect": "slide"
          }'>
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <a class="navbar-brand" href="{{ route('index') }}" aria-label="Unify">
                            <img class="navbar-brand-logo"  src="{{ asset('images/logoivoirlexgreen.png') }}" alt="Image Description" style="width: 530px; height:50px">
                        </a>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-6 offset-md-16 d-sm-flex justify-content-sm-end mt-2">

                        <div class="dropdown">
                            <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #ff8333; color:#fff">
                                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('logout') }}">  {{ __('Déconnexion') }}</a></li>

                            </ul>
                          </div>


                    </div>
                </div>
            </div>

            <!-- Default Logo -->

            <!-- End Default Logo -->

            <!-- Toggler -->




        </nav>
    </div>
</header>



    @if ($errors->any())

    {{-- <div class="alert alert-danger" style="margin-top: 4em">

        <ul style="background-color: #fff">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div> --}}
    <div class="alert alert-warning" role="alert" style="margin-left:15px; margin-right:15em">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>


    @endif


    {{-- @if ($message = Session::get('success'))
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default card-md mb-4">
                        <div class="card-header py-20">
                            <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                            <h4>Success !!!</h4>
                        </div>
                        <div class="card-body">
                            <div class=" alert alert-success " role="alert">
                                <div class="alert-content">
                                    <p>{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif --}}



<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Hero -->
    <div class="content-space-t-3 content-space-t-lg-4 content-space-b-2 content-space-b-lg-3 overflow-hidden">
        <div class="container">
            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 mb-2 mb-lg-0">
                    <div class="mb-0">
                        <h1>Ajouter un texte</h1>
                        <p class="lead">
                            Ajouter un texte à la base de données
                        </p>
                    </div>

                    <h5> Quel public visé ?</h5>

                    <!-- List -->
                    <ul class="list-checked list-checked-dark mb-6">
                        <li class="list-checked-item">les professionsels du droit </li>
                        <li class="list-checked-item">les professionnels du TIC</li>
                        <li class="list-checked-item">les juristes en TIC</li>
                    </ul>
                    <!-- End List -->
                    <div class="row ">
                        <div class="col-4">
                            <a href="{{ route('users.index') }}" class="btn" style="background-color: #ff8333; color:#fff">Utilisateur</a>
                        </div>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-lg-6">
                    <div class="position-relative">

                        <form action="{{ route('lois.store') }}" method="POST">
                            @csrf
                            @method('POST')

                             <!-- Card -->
                        <div class="card card-lg">
                            <div class="card-body">
                                <h4>Formulaire d'ajout</h4>

                                <!-- Form -->
                                <form>
                                    <div class="row gx-3">
                                        <div class="col-sm-6">
                                            <!-- Form -->
                                            <div class="mb-3">
                                                <label class="form-label visually-hidden" for="statut">Budget</label>
                                                <select name="statut" id="statut" class="form-select form-select-lg" aria-label="Choisissez le statut">
                                                    <option selected>Choisissez le statut</option>
                                                    <option value="Abrogé"> Abrogé</option>
                                                    <option value="En vigueur">En vigueur</option>
                                                </select>
                                            </div>
                                            <!-- End Form -->
                                            <!-- Form -->

                                            <!-- End Form -->
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <select name="typeLoi" id="typeLoi" class="form-select form-select-lg" aria-label="Type de texte">
                                                   <label class="form-label visually-hidden" for="statut">Budget</label>
                                                    <option selected>Type de texte</option>
                                                    <option value="Loi"> Loi</option>
                                                    <option value="Décret">Décret</option>
                                                    <option value="Ordonnance">Ordonnance</option>
                                                    <option value="Arrêté">Arrêté</option>
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="mb-3">
                                        <label class="form-label visually-hidden" for="numeroLoi"> Numéro du texte</label>
                                        <input type="text" class="form-control form-control-lg" name="numeroLoi" id="numeroLoi" placeholder="Le numéro du texte " >
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="mb-3">
                                        <label class="form-label visually-hidden" for="titre">Titre <span class="form-label-secondary">(Optional)</span></label>
                                        <input type="text" class="form-control form-control-lg" name="titre" id="titre" placeholder="Saisissez le titre" aria-label="Saisissez le titre">
                                    </div>
                                    <!-- End Form -->

                                    <!-- Select -->
                                    <div class="mb-3">
                                        <label class="form-label visually-hidden" for="datePublication">Date de publication <span class="form-label-secondary">(Optional)</span></label>
                                        <input type="date" class="form-control form-control-lg" name="datePublication" id="datePublication" placeholder="la date de publication" aria-label="la date de publication">
                                    </div>
                                    <!-- End Select -->

                                    <!-- Form -->
                                    <div class="mb-3">
                                        <label class="form-label visually-hidden" for="contenu">Contenu</label>
                                        <textarea class="form-control form-control-lg" name="contenu" id="contenu" placeholder="Ajouter le contenu du texte" aria-label="Ajouter le contenu du texte" rows="4"></textarea>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Checkbox -->
                                    <div class="mb-3">
                                        <label class="form-label visually-hidden" for="annexe">Annexe <span class="form-label-secondary">(Optional)</span></label>
                                        <input type="text" class="form-control form-control-lg" name="annexe" id="annexe" placeholder=" L'annexe" aria-label="Saisissez le titre">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label visually-hidden" for="fichier">Source <span class="form-label-secondary">(Optional)</span></label>
                                        <input type="file" class="form-control form-control-lg" name="fichier" id="fichier" placeholder="charger le fichier" aria-label="Saisissez le titre">
                                    </div>
                                    <div class="mb-3">
                                        <select name="domaine" id="domaine" class="form-select form-select-lg" aria-label="Type de texte">
                                           <label class="form-label visually-hidden" for="domaine">Budget</label>
                                            <option selected>Domaine concerné</option>
                                            <option value="TIC"> TIC</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Comptabilité">Comptabilité</option>
                                        </select>
                                    </div>
                                    <!-- End Checkbox -->

                                    <div class="d-grid mb-2">
                                        <button type="submit" class="btn  btn-lg" style="background-color: #ff8333;color:#fff;">Ajouter le texte</button>
                                    </div>

                                    <div class="text-center">
                                        <span class="form-text">L'ajout de texte permettra d'enrichir notre base de données.</span>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                        <!-- End Card -->

                        </form>


                        <!-- SVG Shape -->
                        <figure class="position-absolute top-0 end-0 d-none d-md-block mt-n10" style="width: 12rem; margin-right: -10rem;">
                            <img class="img-fluid" src="/assets/svg/components/three-arrows-1.svg" alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->

                        <!-- SVG Shape -->
                        <figure class="position-absolute bottom-0 end-0 zi-n1 d-none d-md-block mb-n10" style="width: 15rem; margin-right: -8rem;">
                            <img class="img-fluid" src="/assets/svg/illustrations/grid-grey.svg" alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->

                        <!-- SVG Shape -->
                        <figure class="position-absolute bottom-0 end-0 d-none d-md-block me-n5 mb-n5" style="width: 10rem;">
                            <img class="img-fluid" src="/assets/svg/illustrations/plane.svg" alt="Image Description">
                        </figure>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Hero -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

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
    })()
</script>
<script>
  @if(Session::has('success'))
    toastr.options =
    {
  	    "closeButton" : true,
  	    "progressBar" : true
    }
    toastr.success('{{ Session::get('success') }}');
  @endif
</script>
</body>
</html>
