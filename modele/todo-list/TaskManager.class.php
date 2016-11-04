<?php


class TaskManager
{
    private $_myBase;

    //constructeur
    public function __construct($base)
    {
	$this->setDatabase($base);
    }


    //setters
    public function setDatabase(PDO $base)
    {
	$this->_myBase = $base;
    }

    //all method

    public function addTask(Task $task)
    {
	$insertion = $this->_myBase->prepare('INSERT INTO Task(contenu, id_list) VALUES(:contenu, :id_list)');
	$insertion->bindValue(':contenu', $task->contenu());
	$insertion->bindValue(':id_list', $task->id_list());

	$insertion->execute();
    }

    public function modifyTask($id, $status)
    {
	$modification = $this->_myBase->prepare('UPDATE Task SET status = :status WHERE id = :id');
	$modification->bindValue(':status', $status);
	$modification->bindValue(':id', $id, PDO::PARAM_INT);

	$modification->execute();
    }

    public function deleteTask($id)
    {
	$deletion = $this->_myBase->prepare('DELETE FROM Task WHERE id = :id');
	$deletion->bindValue(':id', $id, PDO::PARAM_INT);

	$deletion->execute();
    }

    
	
}
