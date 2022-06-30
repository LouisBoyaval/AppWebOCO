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
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Liste des chats</h2>
                        </div>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Tag</th>
                            <th scope="col">Poids</th>
                            <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include '../DatabaseCom/retrieve-animaux.php'; ?>
                            <?php if ($result->num_rows > 0): ?>
                            <?php while($array=mysqli_fetch_row($result)): ?>
                            <tr>
                                <th scope="row"><?php echo $array[0];?></th>
                                <td><?php echo $array[1];?></td>
                                <td><?php echo $array[2];?></td>
                                <td><?php echo $array[3];?></td>
                                <td><?php echo $array[4];?></td>
                            </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <tr>
                            <td colspan="3" rowspan="1" headers="">No Data Found</td>
                            </tr>
                            <?php endif; ?>
                            <?php mysqli_free_result($result); ?>
                        </tbody>
                        </table>
                    </div>
                </div>        
            </div>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Programmes</h2>
                        </div>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">idAnimal</th>
                            <th scope="col">idCroquette</th>
                            <th scope="col">Heure</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Distribué</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include '../DatabaseCom/retrieve-programmes.php'; ?>
                            <?php if ($result_prog->num_rows > 0): ?>
                            <?php while($array=mysqli_fetch_row($result_prog)): ?>
                            <tr>
                                <th scope="row"><?php echo $array[0];?></th>
                                <td><?php echo $array[1];?></td>
                                <td><?php echo $array[2];?></td>
                                <td><?php echo $array[3];?></td>
                                <td><?php echo $array[4];?></td>
                                <td><?php echo $array[5];?></td>
                            </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <tr>
                            <td colspan="3" rowspan="1" headers="">No Data Found</td>
                            </tr>
                            <?php endif; ?>
                            <?php mysqli_free_result($result); ?>
                        </tbody>
                        </table>
                    </div>
                </div>        
            </div>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Repas</h2>
                        </div>
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">idAnimal</th>
                            <th scope="col">idCroquette</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include '../DatabaseCom/retrieve-repas.php'; ?>
                            <?php if ($result_repas->num_rows > 0): ?>
                            <?php while($array=mysqli_fetch_row($result_repas)): ?>
                            <tr>
                                <th scope="row"><?php echo $array[0];?></th>
                                <td><?php echo $array[1];?></td>
                                <td><?php echo $array[2];?></td>
                                <td><?php echo $array[3];?></td>
                                <td><?php echo $array[4];?></td>
                            </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <tr>
                            <td colspan="3" rowspan="1" headers="">No Data Found</td>
                            </tr>
                            <?php endif; ?>
                            <?php mysqli_free_result($result); ?>
                        </tbody>
                        </table>
                    </div>
                </div>        
            </div>
        </div>


            
    <script src="bootstrap/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="bootstrap/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    </body>
</html>
