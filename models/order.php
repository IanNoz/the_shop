<?php

class order{

    private $id;
    private $user_id;
    private $country;
    private $postcode;
    private $address;
    private $cost;
    private $status;
    private $odate;
    private $otime;
    
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $this->db->real_escape_string($country);

        return $this;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $this->db->real_escape_string($postcode);

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $this->db->real_escape_string($address);

        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getOdate()
    {
        return $this->odate;
    }

    public function setOdate($odate)
    {
        $this->odate = $odate;

        return $this;
    }

    public function getOtime()
    {
        return $this->otime;
    }

    public function setOtime($otime)
    {
        $this->otime = $otime;

        return $this;
    }

    public function getAll(){
        $products = $this->db->query("SELECT * FROM orders ORDER BY id DESC");
        return $products;
    }
    
    public function getOne(){
        $product = $this->db->query("SELECT * FROM orders WHERE id = {$this->getId()}");
        return $product->fetch_object();
    }

    public function save(){
        
        $sql = "INSERT INTO orders VALUES(NULL, {$this->getUser_id()}, '{$this->getCountry()}', '{$this->getPostcode()}', '{$this->getAddress()}', {$this->getCost()}, 'confirmed', CURDATE(),CURTIME());";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function save_row(){

        $sql = "SELECT LAST_INSERT_ID() AS 'order';";
        $query = $this->db->query($sql);
        $order_id = $query->fetch_object()->order;

        foreach($_SESSION['cart'] as $element){
            $product = $element['product'];

            $insert = "INSERT INTO orders_rows VALUES(NULL, {$order_id}, {$product->id}, {$element['units']});";
            $save = $this->db->query($insert);
        }

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}