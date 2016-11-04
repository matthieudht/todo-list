<?php


// recover all task from list choose
function getTaskList($id)
{
    global $myBase;
    $taskFromList = $myBase->prepare('SELECT * FROM Task WHERE id_list = :id');
    $taskFromList->bindValue(':id', $id, PDO::PARAM_INT);
    $taskFromList->execute();

    return $taskFromList;
}
