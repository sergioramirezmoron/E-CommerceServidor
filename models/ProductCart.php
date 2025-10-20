<?php

class ProductCart
{

    private $id;
    private $quantity;
    private $idCart;
    private $idProduct;


    public function __construct($id, $quantity, $idCart, $idProduct)
    {
        $this->id = $id;
        $this->quantity = $quantity;
        $this->idCart = $idCart;
        $this->idProduct = $idProduct;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getIdCart()
    {
        return $this->idCart;
    }
    public function getIdProduct()
    {
        return $this->idProduct;
    }
}
