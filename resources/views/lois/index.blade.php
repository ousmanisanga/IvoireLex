<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <title>Document</title>






</head>
<body >



    <div class="s006">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="inner-form">
                    <div class="input-field">
                        <button class="btn-search" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                            </svg>
                        </button>
                        <label for="search"></label>
                        <input id="search" type="text" name="search" placeholder="taper une recherche" onfocus="this.value=''" />
                        <div id="search_list"></div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>

    </div>

    {{-- <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h3 class="text-center">Moteur de recherche des textes juridiques</h3><hr>
                    <div class="form-group">
                        <h4>Rechercher par date, numéro et titre !</h4>
                        <input type="text" name="search" id="search" placeholder="taper une recherche" class="form-control" onfocus="this.value=''">
                    </div>
                    <div id="search_list"></div>
                </div>
            <div class="col-lg-3"></div>
        </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#search').on('keyup', function(){
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('lois.search') }}", // Mettez à jour l'URL de la route
                    type: "GET",
                    data: {'search': query},
                    dataType: 'json', // Spécifiez le type de données attendu
                    success: function(data){
                        $('#search_list').html(data.output); // Utilisez data.output pour obtenir les résultats
                    }
                });
            });
        });
    </script>
</body>
</html>
