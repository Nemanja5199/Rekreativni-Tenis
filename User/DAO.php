<?php
require_once '../config/db.php';
require_once 'UserClass.php';




class DAO {
	private $db;



	/*private $STUDENTEXIST = "SELECT * FROM student WHERE id=?";
	private $STUDENTUPDATE = "UPDATE student SET ime=?, prezime=? ,brindeksa=? WHERE id=? ";
	private $INSERTSTUDENT= "INSERT INTO student VALUES(?,?,?,?)";
	private $GETALLSTUDENTS = "SELECT * FROM student ";
	private $DELETESTUDENT = "DELETE FROM student WHERE id=?";*/

	private $GETUSERS = "SELECT * FROM Users  ORDER BY id";
    private $INSERTUSER= "INSERT INTO Users(username,email,pwd,user_type,phone,adress,vkey) VALUES(?,?,?,?,?,?,?) ";
	private $USERUPDATE = "UPDATE Users SET username=?, email=? ,pwd=?,user_type=?,phone=?,adress=? WHERE ID=? ";
	private $DELETEUSER = "DELETE FROM Users WHERE id=?";


	private $LOGINUSER = "SELECT * FROM users WHERE email=? AND pwd=?";
	
	

	

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getLogin($email,$pwd)
	{
		
		$statement = $this->db->prepare($this->LOGINUSER);

		$statement->bindValue(1,$email);
		$statement->bindValue(2,$pwd);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;

	
	}


	public function getALLUsers()
	{
		
		$statement = $this->db->prepare($this->GETUSERS);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;

	
	}

	public function InsertUser(User $user)
	{
		
		$statement = $this->db->prepare($this->INSERTUSER);
		$statement->bindValue(1, $user->username);
		$statement->bindValue(2, $user->email);
		$statement->bindValue(3, $user->pwd);
		$statement->bindValue(4, $user->usertype);
		$statement->bindValue(5, $user->phone);
		$statement->bindValue(6, $user->adress);
		$statement->bindValue(7, $user->vkey);
		return $statement->execute();

	}



	public function UpdateUser(User $user,$id)
	{
		
		$statement = $this->db->prepare($this->USERUPDATE);
		$statement->bindValue(1, $user->username);
		$statement->bindValue(2, $user->email);
		$statement->bindValue(3, $user->pwd);
		$statement->bindValue(4, $user->usertype);
		$statement->bindValue(5, $user->phone);
		$statement->bindValue(6, $user->adress);
		$statement->bindValue(7, $id);
		return $statement->execute();

	}


	public function DeleteUser($id)
	{
		
		$statement = $this->db->prepare($this->DELETEUSER);
		$statement->bindValue(1, $id);
		return $statement->execute();

	}

	
	
}
?>
