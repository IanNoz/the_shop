<?php

class product{

    private $id;
    private $category_id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $pruduct_date;
    private $image;
    
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
        $this->id = $this->db->real_escape_string($id);

        return $this;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $this->db->real_escape_string($category_id);

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $this->db->real_escape_string($name);

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
 
    public function setDescription($description)
    {
        $this->description = $this->db->real_escape_string($description);

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $this->db->real_escape_string($price);

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    public function getOffer()
    {
        return $this->offer;
    }

    public function setOffer($offer)
    {
        $this->offer = $this->db->real_escape_string($offer);

        return $this;
    }

    public function getPruduct_date()
    {
        return $this->pruduct_date;
    }

    public function setPruduct_date($pruduct_date)
    {
        $this->pruduct_date = $this->db->real_escape_string($pruduct_date);

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $this->db->real_escape_string($image);

        return $this;
    }

    public function getAll(){
        $products = $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $products;
    }

    public function getAllByCategory(){
        $sql = "SELECT p.*, c.name AS 'category_name' FROM products p "
                . "INNER JOIN categories c ON c.id = p.category_id "
                . "WHERE p.category_id = {$this->getCategory_id()} "
                . "ORDER BY id DESC;";
        $products = $this->db->query($sql);
        return $products;
    }
    
    public function getOne(){
        $product = $this->db->query("SELECT * FROM products WHERE id = {$this->getId()}");
        return $product->fetch_object();
    }

    public function getRandom($limit){
        $products = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit;");
        return $products;
    }

    public function save(){
        
        $sql = "INSERT INTO products VALUES(NULL, {$this->getCategory_id()}, '{$this->getName()}', '{$this->getDescription()}', {$this->getPrice()}, {$this->getStock()}, NULL, CURDATE(),'{$this->getImage()}')";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit(){
        
        $sql = "UPDATE products SET name='{$this->getName()}', description='{$this->getDescription()}', category_id={$this->getCategory_id()}, price={$this->getPrice()}, stock={$this->getStock()}";
        if ($this->getImage() != NULL){
            $sql .= ", image='{$this->getImage()}'";
        }
        $sql .= " WHERE id = {$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM products WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
}