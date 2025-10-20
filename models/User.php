<?php

class User
{

    private $id;
    private $username;
    private $password;
    private $email;
    private $phone;
    private $avatar;
    private $rol;


    public function __construct($id, $username, $password, $email, $phone, $avatar, $rol)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->avatar = $avatar;
        $this->rol = $rol;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }
    public function getRol()
    {
        return $this->rol;
    }
}
