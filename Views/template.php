<!-- Ici on retrouvera tous les éléments communs aux views //CSS //Navigation //Header //Footer -->

<?php require_once 'Models/Interventions.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La boite à outils du concierge</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <a class="navbar-brand" href="/">
            <img src="public/img/setting.png" width="30" height="30" class="d-inline-block align-top" alt=""
                loading="lazy">
            The janitor's toolbox
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                <button type='button' class='btnAddModal btn btn-primary ' data-toggle='modal'
                    data-target='#exampleModal'>
                    Ajouter
                </button>
                </li>



               

            </ul>
            <form class="form-inline">

                <input type="date" name="date" class="form-control">
                <select name="etage" class="form-control">
                    <option value="" disabled selected>Etage</option>
                    <?php
              $step = new Intervention;
              $steps = $step->listOfStep();
              foreach ($steps as $step){
                  echo "<option value='".$step['step_int']."'>".$step['step_int']."</option>";
              }
        ?>
                </select>
                <input class="form-control mr-sm-2" type="search" placeholder="Intervention" aria-label="Search"
                    name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>

        </div>
    </nav>

    <div class="container">

        <?php echo $contenuAafficher; ?>

    </div>


    <script type="text/javascript">
        var logElem = document.getElementById("formulaire");
        var titreModal = document.getElementById("exampleModalLabel");
        var msgInfo = document.getElementById("msgInfo");





        logElem.innerHTML = "";
        var closeModal = document.getElementById("closeModal");
        closeModal.addEventListener("click", function () {
            logElem.innerHTML = "";
        });





        logElem.innerHTML = "";
        $(".btnModal").click(function () {
            var id = $(this).data('id_int');
            var date = $(this).data('date_int');
            var etage = $(this).data('step_int');
            var intervention = $(this).data('name_int');
            titreModal.innerHTML = "Modifier une Intervention";
            msgInfo.innerHTML =
                " <div class='alert alert-warning' role='alert' >Attention vous êtes sur le point de modifier cette intervention</div>"
            logElem.innerHTML += "<form method='GET'><input type='hidden' name='id' value='" + id +
                "'><div class='form-group'> <label for='labelforDate'>Date</label> <input type='date' class='form-control' name='date' aria-describedby='dateHelp' value='" +
                date +
                "'> <small id='dateHelp' class='form-text text-muted'>Saisir la date de l'intervention</small> </div><div class='form-group'> <label for='labelforEtage'>Etage</label> <input type='number' class='form-control' name='etage' aria-describedby='dateHelp' value='" +
                etage +
                "'> <small id='dateHelp' class='form-text text-muted'>Saisir l'étage auquel s'est passé l'intervention</small> </div><div class='form-group'> <label for='labelforIntervention'>Intervention</label> <input type='text' name='intervention' class='form-control' value='" +
                intervention +
                "'> <small id='dateHelp' class='form-text text-muted'>Saisir l'intervention</small> </div><input type='submit' name='action' value='valider' class='btn btn-primary'> </form>";



        });

        $(".btnSupModal").click(function () {
            var id = $(this).data('id_int');
            var date = $(this).data('date_int');
            var etage = $(this).data('step_int');
            var intervention = $(this).data('name_int');
            titreModal.innerHTML = "Supprimer une Intervention";
            msgInfo.innerHTML =
                " <div class='alert alert-danger' role='alert' >Attention vous êtes sur le point de supprimer cette intervention</div>"
            logElem.innerHTML += "<form method='GET'><input type='hidden' name='id' value='" + id +
                "'><div class='form-group'> <label for='labelforDate'>Date</label> <input disabled type='date' class='form-control' name='date' aria-describedby='dateHelp' value='" +
                date +
                "'> <small id='dateHelp' class='form-text text-muted'>Saisir la date de l'intervention</small> </div><div class='form-group'> <label for='labelforEtage'>Etage</label> <input disabled type='number' class='form-control' name='etage' aria-describedby='dateHelp' value='" +
                etage +
                "'> <small id='dateHelp' class='form-text text-muted'>Saisir l'étage auquel s'est passé l'intervention</small> </div><div class='form-group'> <label for='labelforIntervention'>Intervention</label> <input disabled type='text' name='intervention' class='form-control' value='" +
                intervention +
                "'> <small id='dateHelp' class='form-text text-muted'>Saisir l'intervention</small> </div><input type='submit' name='action' value='supprimer' class='btn btn-danger'> </form>";



        });

        $(".btnAddModal").click(function () {
        
            titreModal.innerHTML = "Ajouter une Intervention";

            logElem.innerHTML +=
                "<form method='GET'><div class='form-group'> <label for='labelforDate'>Date</label> <input type='date' class='form-control' name='date' aria-describedby='dateHelp'> <small id='dateHelp' class='form-text text-muted'>Saisir la date de l'intervention</small> </div><div class='form-group'> <label for='labelforEtage'>Etage</label> <input type='number' class='form-control' name='etage' aria-describedby='dateHelp' min='0' max='10'> <small id='dateHelp' class='form-text text-muted'>Saisir l'étage auquel s'est passé l'intervention</small> </div><div class='form-group'> <label for='labelforIntervention'>Intervention</label> <input type='text' name='intervention' class='form-control' > <small id='dateHelp' class='form-text text-muted'>Saisir l'intervention</small> </div><input type='submit' name='action' value='ajouter' class='btn btn-primary'> </form>";



        });
    </script>


</body>

</html>