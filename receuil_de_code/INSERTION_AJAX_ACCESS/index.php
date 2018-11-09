<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Also">
    <title>Découverte SQL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark" id="menu">
    <a class="navbar-brand" href="index.php" title="Aliou Sow" style="color: white">Découverte SQL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#1" style="color: white" title="Afficher tous les gens dont le nom est Palmer">Exercice 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#2" style="color: white" title="Afficher toutes les femmes">Exercice 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#3" style="color: white" title="Tous les Etat dont le nom commence par N">Exercice 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#4" style="color: white" title="Tous les emails qui contiennent google">Exercice 4</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#5" style="color: white" title="Repartition par Etat et nombre de personne par ordre croissant">Exercice 5</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#6" style="color: white" title="Nombre de femmes et d'homme">Exercice 6</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#7" style="color: white" title="Afficher l'age de chaque personne puis la moyenne d'age des hommes et des femmes">Exercice 7</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#8" style="color: white" title="Afficher l'age de chaque personne puis la moyenne d'age des hommes et des femmes">Exercice 8</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search" onkeyup="showSearch(this.value)">
            <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
        </form>
        <div id="autocomplete_div" style="position: absolute; right: 177px; top: 60px;"></div>
    </div>
    </nav>
    
    <div data-spy="scroll" data-target="#menu" data-offset="0" style="padding-top: 200px">

<?php

require_once 'database.php';

?>

<h1>Projet découverte SQL : </h1>
<br>
<br>

<!-- Les Palmer -->
<div id="1" style="padding-top: 100px">
<h2>1) Afficher tous les gens dont le nom est Palmer : </h2>
<br>
<?php

$query1 = 'SELECT first_name, last_name, NOW() AS date_now FROM table_1 WHERE last_name="Palmer"';
$request1 = select_request($query1);
while($resultat = $request1->fetch()) {
    echo $resultat['first_name'] . ' ' . $resultat['last_name'] . '<br>';
    
}
$request1->closeCursor();

?>
</div>
<br>



<!-- Toutes les femmes -->
<div id="2"  style="padding-top: 100px">
<h2>2) Afficher toutes les femmes : </h2>
<br>
<?php

$query1 = 'SELECT first_name, last_name FROM table_1 WHERE gender="Female"';
$request1 = select_request($query1);
while($resultat = $request1->fetch()) {
    echo $resultat['first_name'] . ' ' . $resultat['last_name'] . '<br>';
}
$request1->closeCursor();

?>
</div>
<br>


<!-- Tous les Etat dont la lettre commence par N -->
<div id="3" style="padding-top: 100px">
<h2>3) Tous les Etat dont le nom commence par N : </h2>
<br>
<?php

$query1 = 'SELECT country_code FROM table_1 WHERE country_code LIKE "N%"';
$request1 = select_request($query1);
while($resultat = $request1->fetch()) {
    echo $resultat['country_code'] . '<br>';
}
$request1->closeCursor();

?>
</div>
<br>


<!-- Tous les emails qui contiennent google -->
<div id="4" style="padding-top: 100px">
<h2>4) Tous les emails qui contiennent google : </h2>
<br>
<?php

$query1 = 'SELECT email FROM table_1 WHERE email like "%google%"';
$request1 = select_request($query1);
while($resultat = $request1->fetch()) {
    echo $resultat['email'] . '<br>';
}
$request1->closeCursor();

?>
</div>
<br>




<!-- Repartition par Etat -->
<div id="5" style="padding-top: 100px">
<h2>5) Repartition par Etat et nombre de personne par ordre croissant : </h2>
<br>
<?php


$query1 = 'SELECT country_code, COUNT(country_code) AS nbre FROM table_1 GROUP BY country_code ORDER BY nbre';
$request1 = select_request($query1);
while($resultat = $request1->fetch()) {
    echo $resultat['country_code'] . ' => ' . $resultat['nbre'] . '<br>';
}
$request1->closeCursor();

?>
</div>
<br>


<!-- Nombre de femmes et d'homme -->
<div id="6" style="padding-top: 100px">
<h2>6) Nombre de femmes et d'homme : </h2>
<br>
<?php

$query1 = 'SELECT COUNT("gender") AS nbr FROM table_1 WHERE gender="Male"';
$request1 = select_request($query1);
while($resultat = $request1->fetch()) {
    echo 'Nombre d\'hommes : ' . $resultat['nbr'] . '<br>';
}
$request1->closeCursor();

$query2 = 'SELECT COUNT("gender") AS nbr FROM table_1 WHERE gender="Female"';
$request2 = select_request($query2);
while($resultat = $request2->fetch()) {
    echo 'Nombre de femmes : ' . $resultat['nbr'] . '<br>';
}
$request2->closeCursor();

?>
</div>
<br>



<!-- Afficher l'age de chaque personne puis la moyenne d'age -->
<div id="7" style="padding-top: 100px">
<h2>7) Afficher l'age de chaque personne puis la moyenne d'age des hommes et des femmes : </h2>
<br>
<?php

$query1 = 'SELECT first_name, last_name, birth_date, gender FROM table_1';
$request = select_request($query1);
$i = 1;
$age_homme = array();
$age_femme = array();
while($resultat = $request->fetch()) {
    $date = new DateTime($resultat['birth_date']);
    $now = new DateTime();
    $interval = $now->diff($date);
    $age = $interval->y;

    echo $i . ' : ' . $resultat['first_name'] . ' ' . $resultat['last_name'] . ', ' . $age . ' ans.<br>';

    $i++;
    if($resultat['gender'] == 'Male') {
        array_push($age_homme, $age);
    }
    else if($resultat['gender'] == 'Female') {
        array_push($age_femme, $age);
    }
}
$request->closeCursor();
$moyenne_homme = array_sum($age_homme)/count($age_homme);
$moyenne_femme = array_sum($age_femme)/count($age_femme);
echo 'La moyenne d\'age des hommes : ' . round($moyenne_homme) . ' ans <br>';
echo 'La moyenne d\'age des femmes : ' . round($moyenne_femme) . ' ans <br>';

?>
</div>
<br>


<div id="8" class="div_form" style="padding-top: 100px">
    <h3>ACS register</h3>
    <div id="notification_div"></div>
    <form>
        <div>
            <label class="lab">Prénom : 
            <input type="text" name="prenom" class="textInput" id="idPrenom" required>
            </label>
            <div id="prenom_error"></div>
        </div>
        <div>
            <label class="lab">Nom : 
            <input type="text" name="nom" class="textInput" id="idNom" required>
            </label>
            <div id="nom_error"></div>
        </div>
        <div>
            <label style="width: 100%">Adresse :  
            <select id="idAdresse" class="lab" value="" style="width: 80%">
                <option value="">Dakar</option>
                <option value="">Pikine</option>
                <option value="">Guediawaye</option>
                <option value="">Keur Massar</option>
                <option value="">Parcelle</option>
                <option value="">Rufisque</option>
            </select>
            </label>
        </div>
        
        <div>
            <button name="register" class="btn" id="submit" onclick="insertUser()">Enregistrer</button>
        </div>
                
    </form>

</div>


<!--footer-->
<footer class="container-fluid bg-dark navbar-dark">
    <div class="socials_links">
        <ul>
            <li>
                <a href="https://www.facebook.com/aliou.sow.33483" target="_blank" title="facebook">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="https://twitter.com/sowalils1992" target="_blank" title="twitter">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/in/aliou-sow/" target="_blank" title="linkedin">
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
            <li>
                <a href="https://github.com/Also8292" target="_blank" title="github">
                    <i class="fa fa-github"></i>
                </a>
            </li>
        </ul>
    </div>
    <div>
        <p style="color: #ffffff;">Aliou Sow stagiaire AccessCode School Dakar / Kéloumak</p>
    </div>
</footer>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    //search function
    function showSearch(searchValue) {
        if(searchValue.length == 0) {
            document.getElementById("autocomplete_div").innerHTML="";
            document.getElementById("autocomplete_div").style.border="0px";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState==4 && this.status==200) {
            document.getElementById("autocomplete_div").innerHTML=this.responseText;
            document.getElementById("autocomplete_div").style.border="1px solid #A5ACB2";
            }
        }
        xmlhttp.open("GET","search.php?value=" + searchValue, true);
        xmlhttp.send();
    }

    //insert user function
    function insertUser() {
        
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        }
        else {  // for old version IE
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector('#notification_div').innerHTML = this.responseText;
            }
        }
        
        var prenom = document.querySelector('#idPrenom').value;
        var nom = document.querySelector('#idNom').value;
        var adresses = document.querySelector('#idAdresse');
        var adresse = adresses.options[adresses.selectedIndex].text;

        if(prenom.length != 0 && nom.length != 0) {
            xmlhttp.open("GET","insert.php?prenom=" + prenom + "&nom=" + nom + "&user_adresse=" + adresse + "", true);
            xmlhttp.send();
        }
    }

</script>
</body>
</html>



