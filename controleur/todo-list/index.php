<?php
//recover lists
include_once('modele/todo-list/getNavigation.php');
$lists = getNavigation();

//recover tasks
include_once('modele/todo-list/getTaskList.php');
$tasks = getTaskList($id);


//print the vue
include_once('vue/todo-list/index.php');
