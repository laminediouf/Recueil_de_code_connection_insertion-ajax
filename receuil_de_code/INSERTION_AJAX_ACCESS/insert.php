<?php

require_once 'database.php';

$first_name = $_GET['prenom'];
$last_name = $_GET['nom'];
$address = $_GET['user_adresse'];

insert($first_name, $last_name, $address);

// echo $first_name . ' ' . $last_name . ' à ' . $address;