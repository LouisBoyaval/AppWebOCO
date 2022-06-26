<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Bootstrap demo</title>
</head>
<header>    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">E-Feeder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="configuration.php">Configuration </a>
            <a class="nav-item nav-link" href="stat.php">Statistiques</a>
            </div>
        </div>
    </nav>
<header>
  <body>

        <div class="row" style="margin: 20px;">
            <div class="col-sm-4">
                <div class="card" style="margin-bottom: 20px;">
                <div class="card-body">
                <form method="post" action="Animaux.php">
                    <fieldset enable>
                        <div class="form-group">
                            <label for="enabledTextInput"><b>Ajouter un animal</b></label>
                            <input name="nom" type="text" id="enabledTextInput" class="form-control" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <input name="poids" type="text" id="enabledTextInput" class="form-control" placeholder="Poids">
                        </div>
                        <div class="form-group">
                            <input name="age" type="text" id="enabledTextInput" class="form-control" placeholder="Age">
                        </div>
                        <button type="Envoyer" class="btn btn-primary">Envoyer</button>
                    </fieldset>
                    </form>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="margin-bottom: 20px;">
                <div class="card-body">
                <form method="post" action="Croquettes.php">
                    <fieldset enabled>
                        <div class="form-group">
                            <label for="enabledTextInput"><b>Aujouter un nouveau type de croquette</b></label>
                            <input name="nom" type="text" id="enabledTextInput" class="form-control" placeholder="Nom">
                        </div>
                        <button type="Envoyer" class="btn btn-primary">Envoyer</button>
                    </fieldset>
                    </form>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="margin-bottom: 20px;">
                <div class="card-body">
                <form method="post" action="Repas.php">
                <fieldset enabled>

                        <div class="form-group">
                            <label for="enabledTextInput"><b>Repas</b></label>
                            <input name="quantite" type="number" id="enabledTextInput" class="form-control" placeholder="Lundi">
                        </div>
                        <div class="form-group">
                            <input name="quantite" type="number" id="enabledTextInput" class="form-control" placeholder="Mardi">
                        </div>
                        <div class="form-group">
                            <input name="quantite" type="number" id="enabledTextInput" class="form-control" placeholder="Mercredi">
                        </div>
                        <div class="form-group">
                            <input name="quantite" type="number" id="enabledTextInput" class="form-control" placeholder="Jeudi">
                        </div>
                        <div class="form-group">
                            <input name="quantite" type="number" id="enabledTextInput" class="form-control" placeholder="Vendredi">
                        </div>
                        <div class="form-group">
                            <input name="quantite" type="number" id="enabledTextInput" class="form-control" placeholder="Samedi">
                        </div>
                        <div class="form-group">
                            <input name="quantite" type="number" id="enabledTextInput" class="form-control" placeholder="Dimanche">
                        </div>
                        <button type="Envoyer" class="btn btn-primary">Envoyer</button>
</fieldset>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <script src="bootstrap/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="bootstrap/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="bootstrap/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
