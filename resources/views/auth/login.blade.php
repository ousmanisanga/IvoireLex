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
    <title>Connexion</title>
</head>
<body>
    <div class="container-fluid mt-4" style="height: 100vh">
        <div class="row mx-auto">
            <div class="col-lg-4 " style="margin-top: 5em; margin-left:30em">
                <div class="card card-default card-md-4" style="border: #fff solid 1px ; box-shadow: 14px 19px 15px -3px rgba(0,0,0,0.1);" >
                    <div class="card-header"  style="background:#fba407; color:#fff; padding-top:0.5px"><h3 style="margin-top: 1em; text-align:center;"> CONNEXION </h3><hr></div>
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body " style="margin-left: 2em; margin-right:2em">
                            <div class="form-group mb-0 mb-4">
                                <label for="lois_id">Email *</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" >
                            </div>
                            <div class="form-group mb-0">
                                <label for="code">Mot de passe *</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" >
                            </div>
                        </div>
                        <div class="modal-footer mb-2 ">
                            <a href="#" class="btn" style="background-color: #4fc031; color:#fff">Demande</a>
                            <button type="submit" class="btn mr-2" style="background: #fba407; color:#fff; margin-left:20px">Connexion</button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>


</body>
</html>
