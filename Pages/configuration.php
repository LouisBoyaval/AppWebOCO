<?php
function showName(){
    $servername = "localhost";
    $username = "serverWeb";
    $password = "password";
    $dbname = "datadistributeur";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT idAnimal, nom FROM Animaux;";
    $result = $conn->query($sql);

    while ($row = $result -> fetch_row()) {
        echo ("<option value=\"". $row[0]. "\">". $row[1] . "</option>");
    }

    $conn->close();
}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/4.0.0/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <a class="nav-item nav-link" href="informations.php">Informations</a>
            </div>
        </div>
    </nav>
<header>
  <body>
        <div class="row" style="margin: 20px;">
            <div class="col-sm-4">
                <div class="card" style="margin-bottom: 20px;">
                <div class="card-body">
                <form  action="../DatabaseCom/Animaux.php" method="post">
                    <fieldset enable>
                        <label for="enabledTextInput"><b>Informations animaux</b></label>
                        <div class="form-group">
                            <select name="id" class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <?php 
                                    showName();
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
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


                <form method="post" action="../DatabaseCom/test.php">
                <div class="form-group">
                    <label for="enabledTextInput"><b>Faites tourner la vis</b></label>
                </div>
                <div class="form-group">
                    <button type="Envoyer" class="btn btn-primary">Etalonnage</button>
                </div>
                </form>

                <form method="post" action="../DatabaseCom/Croquettes.php">
                    <fieldset enabled>
                        <label for="enabledTextInput"><b>Aujouter un nouveau type de croquette</b></label>
                        <div class="form-group">
                            <input name="nom" type="text" id="enabledTextInput" class="form-control" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <input name="qte" type="number" step="0.01" id="enabledTextInput" class="form-control" placeholder="Quantit?? totale distribu??e (g)">
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
                
                
                <form method="post" action="../DatabaseCom/Repas.php">
                <fieldset enabled>
                    <label for="enabledTextInput"><b>Repas</b></label>
                    <div class="form-group">
                        <select name="id" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php 
                                showName();
                            ?>
                        </select>
                    </div>
                    
                                <label>Heure du repas</label>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker3'>
                                        <input name='heure' type='text' class="form-control" />
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="quantite"  type="number" step="0.01" id="enabledTextInput" class="form-control" placeholder="Quantit?? (g)">
                                </div>

                    <button type="Envoyer" class="btn btn-primary">Envoyer</button>
                </fieldset>
                </form>
                </div>
                </div>
            </div>
        </div>


        
        

        <script src="../bootstrap/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="../bootstrap/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="../bootstrap/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <link href= "../bootstrap/3.3.6/bootstrap.min.css" rel="stylesheet"> 
        <script src= "../bootstrap/jquery.js"></script> 


        <script type= "text/javascript" src= "../bootstrap/moment.min.js"></script>
        <link href= "../bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <script src= "../bootstrap/bootstrap-datetimepicker.min.js"> </script>

        <script type="text/javascript">

            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'HH:mm:ss'
                });
            });
        </script>
    
    </body>
</html>
