<?php

class Order
{

    private $id;
    private $status;
    private $date;
    private $idUser;
    private $idCart;


    public function __construct($id, $status, $date, $idUser, $idCart)
    {
        $this->id = $id;
        $this->status = $status;
        $this->date = $date;
        $this->idUser = $idUser;
        $this->idCart = $idCart;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getIdUser()
    {
        return $this->idUser;
    }
    public function getIdCart()
    {
        return $this->idCart;
    }
}
