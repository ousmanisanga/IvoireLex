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

    <style>
        .highlighted {
            background-color: orange;
            font-weight: bold;
        }
    </style>

</head>

<body>
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="{{route('index')}}" aria-label="Unify">
                <img class="navbar-brand-logo"  src="{{ asset('images/logoivoirlexgreen.png') }}" alt="Image Description" style="width: 530px; height:50px">
            </a>
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
                    <!-- Landings -->
                    <!-- Pages -->
                    <li class="nav-item">
                        <form action="{{route('law.searchRequest')}}" method="post">
                            @csrf
                            <!-- Input Card -->
                            <div class="input-card mb-sm-4">
                                <div class="input-card-form">
                                    <label for="searchInput" class="form-label visually-hidden">
                                        Entrez votre recherche
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="searchInput" name="searchInput" value="{{old('searchInput')}}" placeholder="Entrez votre recherche ici" aria-label="Entrez votre recherche ici">
                                </div>
                                <button type="submit" class="btn btn-primary btn-icon">
                                    <i class="bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </li>

                    <li class="nav-item ms-lg-auto">
                        <a class="btn btn-dark d-lg-none" href="{{route('law.create')}}">Ajouter un texte</a>
                    </li>
                    <!-- End Log in -->

                    <!-- Sign up -->
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{route('law.create')}}" >Ajouter un texte</a>
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
    <!-- Hero -->
    <div class="bg-soft-primary">
        <div class="container py-4">
            <div class="w-lg-80 mx-lg-auto">
                <h3 class="">
                    Résultats de la recherche : "{{$searchInput}}"
                </h3>
            </div>
        </div>
    </div>
    <!-- List -->
    <div class="container ">
        <div class="row">

            <div class="col-md-12">
                <!-- Breadcrumb -->
                <nav class="py-3 border-top">
                    <div class="mb-4">
                        <a class="btn btn-soft-secondary btn-sm m-1" href="javascript:;"><i class="bi-briefcase me-1"></i> #Ordonnance</a>
                        <a class="btn btn-soft-secondary btn-sm m-1" href="javascript:;"><i class="bi-heart me-1"></i> #Décret</a>
                        <a class="btn btn-soft-secondary btn-sm m-1" href="javascript:;"><i class="bi-lightbulb me-1"></i> #Constitution</a>
                        <a class="btn btn-soft-secondary btn-sm m-1" href="javascript:;"><i class="bi-lightbulb me-1"></i> #Arrêté</a>
                    </div>
                </nav>
                <!-- End Breadcrumb -->

                <!-- List -->
                <ul class="list-unstyled list-py-2">

                    @if($lois)
                        @foreach($lois as $loi)
                            <li>
                                <!-- Media -->
                                <div class="d-sm-flex">
                                    <div class="flex-shrink-0 mb-3 mb-sm-0">
                                      <span class="me-2">
                                        <i class="bi-question-circle-fill text-primary fs-3"></i>
                                      </span>
                                    </div>

                                    <div class="flex-grow-1 ms-sm-3">
                                        <div class="mb-5">

                                            <h5>{{$loi->typeLoi}} n°{{$loi->numeroLoi}} portant sur {{ $loi->titre }}</h5>
                                            {{-- <h5>{!! highlightKeyword($loi->titre, $searchInput) !!}</h5> --}}
                                            <p>

                                                {{substr($loi->contenu,0,256)}}
                                            </p>
                                        </div>
                                        <a class="link-bordered link-secondary" href="{{route('lois.show', $loi->numeroLoi)}}">
                                            Consulter les details
                                        </a>
                                    </div>
                                </div>
                                <!-- End Media -->
                            </li>
                            <li class="border-top my-5"></li>
                        @endforeach
                    @endif

                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End List -->

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
                    <li class="list-inline-item">
                        <!-- Button Group -->
                        <div class="btn-group">
                            <a class="link link-light link-light-75" href="javascript:;" id="selectLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-flex align-items-center">
                    <img class="avatar avatar-xss avatar-circle me-2" src="/assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16" />
                    <span>English</span>
                  </span>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item d-flex align-items-center active" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="/assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16" />
                                    <span>English</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="/assets/vendor/flag-icon-css/flags/1x1/de.svg" alt="Image description" width="16" />
                                    <span>Deutsch</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="/assets/vendor/flag-icon-css/flags/1x1/es.svg" alt="Image description" width="16" />
                                    <span>Español</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Button Group -->
                    </li>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<script src="/assets/js/vendor.min.js"></script>

<!-- JS Unify -->
<script src="/assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>


    function highlightKeyword(content, keyword) {
        var pattern = new RegExp(keyword, 'gi'); // 'gi' signifie global (toutes les occurrences) et insensible à la casse
        var highlightedContent = content.replace(pattern, '<span class="highlighted">$&</span>'); // Le $& correspond au mot trouvé
        return highlightedContent;
    }

    (function() {

        // INITIALIZATION OF GO TO
        // =======================================================
        new HSGoTo('.js-go-to')


        // INITIALIZATION OF MEGA MENU
        // =======================================================
        const megaMenu = new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })


        // INITIALIZATION OF STICKY BLOCKS
        // =======================================================
        new HSStickyBlock('.js-sticky-block')
    })()
</script>
<script>
    $(document).ready(function(){
        $('#search').on('keyup', function(){
            var query = $(this).val();
            $.ajax({
                url: "{{ route('law.searchRequest') }}", // Utilisez la bonne route
                type: "POST", // Utilisez POST pour votre formulaire de recherche
                data: {'_token': '{{ csrf_token() }}', 'search': query}, // Assurez-vous d'envoyer le jeton CSRF
                dataType: 'json',
                success: function(data){
                    var output = data.output;
                    var highlightedOutput = highlightKeyword(output, query); // Fonction pour mettre en évidence le mot-clé
                    $('#search_list').html(highlightedOutput); // Mettez à jour les résultats dans la liste de recherche
                }
            });
        });

        function highlightKeyword(content, keyword) {
            var pattern = new RegExp(keyword, 'gi'); // 'gi' signifie global (toutes les occurrences) et insensible à la casse
            var highlightedContent = content.replace(pattern, '<span class="highlighted">$&</span>'); // Le $& correspond au mot trouvé
            return highlightedContent;
        }
    });
</script>

</body>
</html>
