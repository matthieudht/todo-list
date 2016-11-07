<?php


class Task
{
    private $_id;
    private $_status;
    private $_contenu;
    private $_id_list;

    //constructor for Task

    public function __construct(array $donnees)
    {
	$this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
	foreach ($donnees as $key => $value)
	{
	    $method = 'set'.ucfirst($key);
	    if (method_exists($this, $method))
	    {
		$this->$method($value);
	    }
	}
    }

    //getters

    public function id()
    {
	return $this->_id;
    }

    public function status()
    {
	return $this->_status;
    }

    public function contenu()
    {
	return $this->_contenu;
    }

    public function id_list()
    {
	return $this->_id_list;
    }

    
    //setters

    
    public function setId($id)
    {
	$id = (int) $id;
	if ($id > 0)
	{
	    $this->_id = $id;
	}
    }

    public function setStatus($status)
    {
	if (is_string($status))
	{
	    $this->_status = $status;
	}
    }

    public function setContenu($contenu)
    {
	if (is_string($contenu))
	{
	    $this->_contenu = $contenu;
	}
    }

    public function setId_list($id_list)
    {
	$id_list = (int) $id_list;
	if ($id_list > 0)
	{
	    $this->_id_list = $id_list;
	}
    }

}
