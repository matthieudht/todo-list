<?php

//recover name of lists

function getNavigation()
{
    global $myBase;
    $allList = $myBase->query('SELECT * FROM ListeTask ORDER BY id LIMIT 10 OFFSET 0');
    return $allList;
}

