<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital@0;1&family=Lora:ital@1&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <title>Document</title>

    <style>


        div.dataTables_wrapper div.dataTables_filter input {
            width: 300px;
            margin: 0 auto;

            background-color: #fff;

            box-shadow: 19px 19px 15px -3px rgba(0,0,0,0.1);
            border: #fff 1px solid;
            border-radius: 5px;
            margin-left: 15px;
        }

        .dataTables_length {
            background-color: #fff; /* Remplacez cette couleur par celle de votre choix */
            padding: 10px; /* Ajoutez un peu d'espace autour de la div */
            border-radius: 5px; /* Ajoutez des coins arrondis à la div */
        }

        div.dataTables_wrapper div.dataTables_filter {
            background-color: #f8f9fa; /* Remplacez cette couleur par celle de votre choix */
            padding: 10px; /* Ajoutez un peu d'espace autour de la div */
            border-radius: 5px; /* Ajoutez des coins arrondis à la div */
        }
    </style>
</head>
<body style="background-color : #f5f6fa">
        @if ($errors->any())
        <div class="alert alert-warning" role="alert" style="margin-left:15px; margin-right:15em">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif

        <div class="container-fluid mt-5 mb-5">
            <div class="row">
                <div class="col-2">
                    <a class="navbar-brand" href="{{ route('index') }}" aria-label="Unify">
                        <img class="navbar-brand-logo"  src="{{ asset('images/logoivoirlexgreen.png') }}" alt="Image Description" style="width: 230px; height:40px">
                    </a>
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center">
                </div>
                <div class="col-4 d-sm-flex justify-content-sm-end">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: #ff8333; color:#fff">
                        Ajouter un utilisateur
                    </button>

                </div>
            </div>


            <div class="row pt-3" style="margin-top: 2em">

                <div class="col-6 mx-auto">
                    <table id="myTable" class="mx-auto" style="font-family: 'Jost', sans-serif; background:#fff; box-shadow: 9px 10px 15px -3px rgba(0,0,0,0.1); border: 1px solid  #fff" >
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)

                            <tr>
                                <td>


                                    {{ $user->nom }}  {{ $user->prenom }}




                                </td>

                                <td>
                                    {{ $user->email }}

                                </td>

                            </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>



        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Création d'un nouveau compte</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body " style="margin-left: 2em; margin-right:2em">

                            <div class="row">

                                <div class=" col-6 form-group mb-0 mb-4">
                                    <label for="nom">Nom *</label>
                                    <input type="text" class="form-control form-control-lg" id="nom" name="nom" >
                                </div>
                                <div class=" col-6 form-group mb-0">
                                    <label for="code">Prenom *</label>
                                    <input type="text" class="form-control form-control-lg" id="prenom" name="prenom" >
                                </div>
                                <div class=" col-6 form-group mb-0 mb-4">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" >
                                </div>
                                <div class=" col-6 form-group mb-0">
                                    <label for="password">Mot de passe *</label>
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" >
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer mb-2 ">
                            <a href="{{ route('users.index') }}" class="btn" style="background-color: #4fc031; color:#fff">Retour</a>
                            <button type="submit" class="btn mr-2" style="background: #fba407; color:#fff; margin-left:20px">Actualiser</button>
                        </div>

                    </form>
                </div>

              </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

        <script>
            // $(document).ready(function () {

            //     $('#myTable').DataTable({
            //         "searching": true,
            //         "responsive": true,
            //         "lengthChange": true,
            //         "language": {
            //             "emptyTable": "Aucun élément trouvé ",
            //             "info": "",
            //             "infoEmpty": "Aucune donnée disponible",
            //             "searchPlaceholder": "Recherche...",
            //             "search": "Rechercher:",
            //             "zeroRecords": "Aucun enregistrements correspondants trouvés, veuillez verifier l'orthographe",
            //             "paginate":{
            //                 "first": "Premier",
            //                 "last": "Dernier",
            //                 "next":"Suivant",
            //                 "previous" : "Précédent"
            //             }

            //         }


            //     });
            // });

            $(document).ready(function () {

    $('#myTable').DataTable({
        "searching": true,
        "responsive": true,
        "lengthChange": true,
         // Afficher les boutons "Premier", "Dernier", "Suivant", "Précédent"
        "pagingType": "full_numbers",
        "language": {
            "emptyTable": "Aucun élément trouvé",
            "info": "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            "infoEmpty": "Aucune donnée disponible",
            "searchPlaceholder": "Recherche...",
            "search": "Rechercher:",
            "zeroRecords": "Aucun enregistrement correspondant trouvé, veuillez vérifier l'orthographe",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent"
            }


        }



    });

            // Changer le texte "Entries" en "par page" après l'initialisation de DataTables
            $('.dataTables_length').find('label').html($('.dataTables_length').find('label').html().replace('entries', 'par page'));
         // Changer les textes "Show" et "Entries" en français après l'initialisation de DataTables
            $('.dataTables_length').find('label').html('Affichage <select class="custom-select custom-select-sm">' + $('.dataTables_length').find('label').html().split('<select')[1]);
            $('.dataTables_length').find('option[value="10"]').text('10 ');
            $('.dataTables_length').find('option[value="25"]').text('25 ');
            $('.dataTables_length').find('option[value="50"]').text('50 ');
            $('.dataTables_length').find('option[value="100"]').text('100');
    });



        </script>

</body>
</html>
