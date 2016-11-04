<?php

function chargerClass($classe)
{
    require $classe.'.class.php';
}

spl_autoload_register('chargerClass');

try
{
    $myBase = new PDO('mysql:host=localhost;dbname=exercice;charset=utf8', 'dehondtmatthieu', 'mD120989');
}
catch (Exception $error)
{
    die($error->getMessage());
}


$manager = new TaskManager($myBase);

if (isset($_POST['createList']) && !empty($_POST['createList']))
{
    $nom = htmlspecialchars($_POST['createList']);

    $insertion = $myBase->prepare('INSERT INTO ListeTask(nom) VALUES(:nom)');
    $insertion->bindValue(':nom', $nom);

    $insertion->execute();
}

if (isset($_POST['deleteList']) && !empty($_POST['deleteList']))
{
    $nom = htmlspecialchars($_POST['deleteList']);
    if (is_string($nom))
    {
	$deletion = $myBase->prepare('DELETE FROM ListeTask WHERE nom = :nom');
	$deletion->bindValue(':nom', $nom);

	$deletion->execute();
    }
}


if (isset($_POST['createTask']) && !empty($_POST['createTask']))
{
    $contenu = htmlspecialchars($_POST['createTask']);
    $id_list = (int) $_POST['id_list'];
    $task = new Task(["contenu" => $contenu,
		     "id_list" => $id_list,]);
    $manager->addTask($task);
}

if (isset($_POST['deleteTask']) && !empty($_POST['deleteTask']))
{
    $id = (int) $_POST['deleteTask'];
    $manager->deleteTask($id);
}


if (isset($_POST['statusTask']) && !empty($_POST['statusTask']))
{
    if ($_POST['statusTask'] == "fait")
    {
	$manager->modifyTask($_POST['idTask'], "pas fait");
    }
    else
    {
	$manager->modifyTask($_POST['idTask'], "fait");
    }

}


header('Location: ' . $_SERVER[HTTP_REFERER]);



	
