<?php

class Cart
{

    private $id;
    private $userId;


    public function __construct($id, $userId)
    {
        $this->id = $id;
        $this->userId = $userId;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUserId()
    {
        return $this->userId;
    }
}
