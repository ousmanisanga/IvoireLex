<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Reference</title>
</head>
<body>
    <div class="container-fluid mt-4" style="height: 100vh">
        <div class="row">
            <div class="col-lg-6 mx-auto" style="margin-top: 5em">
                <div class="card card-default card-md-4" style="border: #fff solid 1px ; box-shadow: 14px 19px 15px -3px rgba(0,0,0,0.1);" >
                    <div class="card-header" style="background:#fba407; color:#fff;"><h5>Actualisation du retour à la normal</h5><hr></div>
                    <form action="{{ route('references.update', ['id' => $loi->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group mb-0 mb-4">
                                <label for="lois_id">Identifiant du texte *</label>
                                <input type="text" class="form-control form-control-lg" id="lois_id" name="lois_id" value="{{ $loi->id }}">
                            </div>
                            <div class="form-group mb-0">
                                <label for="code">code *</label>
                                <input type="text" class="form-control form-control-lg" id="code" name="code" >
                            </div>
                        </div>
                        <div class="modal-footer mb-2 ">
                            <a href="{{ route('index') }}" class="btn" style="background-color: #4fc031; color:#fff">Retour</a>
                            <button type="submit" class="btn mr-2" style="background: #fba407; color:#fff; margin-left:20px">Actualiser</button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</body>
</html>
