<?php

class user{

	private $id;
	private $name;
	private $surname;
	private $email;
	private $password;
	private $rol;
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
		$this->id = $id;

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

	public function getSurname()
	{
		return $this->surname;
	}

	public function setSurname($surname)
	{
		$this->surname = $this->db->real_escape_string($surname);

		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $this->db->real_escape_string($email);

		return $this;
	}

	public function getPassword()
	{
		return password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 4]);
	}

	public function setPassword($password)
	{
		$this->password = $this->db->real_escape_string($password);

		return $this;
	}

	public function getRol()
	{
		return $this->rol;
	}

	public function setRol($rol)
	{
		$this->rol = $rol;

		return $this;
	}

    public function getImage()
	{
		return $this->image;
	}

	public function setImage($image)
	{
		$this->image = $image;

		return $this;
	}

    public function save(){
		
        $sql = "INSERT INTO users VALUES(NULL, '{$this->getName()}', '{$this->getSurname()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL)";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

	public function login(){

		$result = false;
		$email = $this->email;
		$password = $this->password;

		var_dump($password);
		
		// check if user exists
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$login = $this->db->query($sql);

		if($login && $login->num_rows == 1){
			$user = $login->fetch_object();
			
			$verifytest = password_verify('b','$2y$04$Y1jiHE5.eFsRUvrNFVwGnePYpn0lzGABURekOTlTACfH2AaNIpSmG');
			
			// Verify password
			$verify = password_verify($password, $user->password);

			if($verify){
				$result = $user;

			}
		}
		return $result;

	}
}

