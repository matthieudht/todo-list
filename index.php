<?php


include_once('modele/connexion-sql.php');

// test what page to print
if ($_GET['liste'])
{
    $id = $_GET['liste'];
}
else $id = 1;

include_once('controleur/todo-list/index.php');

