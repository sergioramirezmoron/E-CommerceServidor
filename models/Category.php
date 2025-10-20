<?php

class User
{

    private $id;
    private $name;
    private $description;
    


    public function __construct($id, $name, $description)
    {
        $this->id = $id;
        $this->username = $name;
        $this->password = $description;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
}
