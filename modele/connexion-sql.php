<?php

//connexion to database

try {
    $myBase = new PDO('mysql:host=localhost;dbname=exercice;charset=utf8','dehondtmatthieu', 'mD120989');
}
catch (Exception $error) {
    die('Erreur: '.$error->getMessage());
}


