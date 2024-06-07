<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <title>Reference</title>
</head>
<body>

    @if ($errors->any())


    <div class="alert alert-warning" role="alert" style="margin-left:15px; margin-right:15em">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>


    @endif

    <div class="container-fluid mt-4" style="height: 100vh">
        <div class="row mx-auto">
            <div class="col-lg-4 " style="margin-top: 5em; margin-left:30em">
                <div class="card card-default card-md-4" style="border: #fff solid 1px ; box-shadow: 14px 19px 15px -3px rgba(0,0,0,0.1);" >
                    <div class="card-header"  style="background:#fba407; color:#fff; padding-top:0.5px"><h3 style="margin-top: 1em; text-align:center;">Ajouter une nouvelle </h3><hr></div>
                    <form action="{{ route('references.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body " style="margin-left: 2em; margin-right:2em">
                            <div class="form-group mb-0 mb-4">
                                <label for="lois_id">Identifiant du texte *</label>
                                <input type="text" class="form-control form-control-lg" id="lois_id" name="lois_id" value="{{ $loi->id }}">
                            </div>
                            <div class="form-group mb-0 mb-4">
                                <label for="code">numéro du texte de la référence *</label>
                                <input type="text" class="form-control form-control-lg" id="code" name="code" >
                            </div>
                            <div class="form-group mb-0">
                                <label for="typeTexte">type du texte de la référence *</label><br>
                                <select name="typeTexte" id="typeTexte" class="form-select form-select-lg" aria-label="Type de texte" style="padding-top: 10px; padding-bottom: 10px; padding-right:5px">
                                    {{-- <label class="form-label visually-hidden" for="typeTexte">Budget</label> --}}
                                     <option selected>Selectionné le type de texte</option>
                                     <option value="Décret"> Décret</option>
                                     <option value="Ordonnance">Ordonnance</option>
                                     <option value="Constitution">Constitution</option>
                                     <option value="Loi">Loi</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer mb-2 ">
                            <a href="{{ route('index') }}" class="btn" style="background-color: #fba407; color:#fff">Retour</a>
                            <button type="submit" class="btn mr-2" style="background:  #4fc031; color:#fff; margin-left:20px">Actualiser</button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>

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
