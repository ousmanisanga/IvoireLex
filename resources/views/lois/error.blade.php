<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Error</title>
</head>
<body>
    <div class="row">
        <div class="col-md-6 mx-auto" style="margin-top: 11em;">
            <div class="card mx-auto" style="box-shadow: 19px 30px 15px 0px rgba(0,0,0,0.1);">
                <h5 class="card-header">Erreur 404</h5>
                <div class="card-body">
                  <h5 class="card-title text-center">Ce texte n'existe pas dans notre base de donnée pour l'instant </h5>
                  <div class="mt-4" style="margin-left: 12em">
                    <a href="{{ route('index') }}" class="btn " style="background: #ff8333; color:#fff;">Accueil</a>
                    <a href="{{ route('law.create') }}" class="btn" style="background: #4fc031; color:#fff; margin-left:10px">Ajouter un texte</a>

                </div>

                </div>
            </div>
        </div>
    </div>


</body>
</html>
