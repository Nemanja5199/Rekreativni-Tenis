<?php

include_once '../partials/Zastita.php';
require_once '../../config/db.php';

require_once '../../User/UserClass.php';



class DAO {

	
	
	private $db;




	private $GETUSERS = "SELECT * FROM users u JOIN user_type ut ON u.user_type = ut.type_id  LIMIT ?,?";
	private $INSERTUSER = "INSERT INTO users(username,email,pwd,user_type,phone,adress) VALUES(?,?,?,?,?,?)";
    private $UPDATUSER = "UPDATE users SET username=?,email=?,user_type=?,phone=?,adress=? WHERE id=?";
    private $DELETEUSER = "DELETE FROM users WHERE id=?";

	


    private $UPDATEBAN = "UPDATE users SET Ban=? WHERE id=?";
    private $GETTYPE = "SELECT* FROM user_type";
	private $GETUSERSBYID = "SELECT * FROM users u JOIN user_type ut ON u.user_type = ut.type_id where id =? ";

	private $GETUSERSNUMBER = "SELECT COUNT(*) FROM users";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getUsers($page)
	{
		$numPage=5;
		$startpage=($page-1)*$numPage;
		

		$statement = $this->db->prepare($this->GETUSERS);
		$statement->bindValue(1, $startpage, PDO::PARAM_INT);
		$statement->bindValue(2, $numPage, PDO::PARAM_INT);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;

	}


	public function getUserCount(){

		$statement = $this->db->prepare($this->GETUSERSNUMBER);
		$statement->execute();
		$result=$statement->fetchColumn();
		return $result;
		
	}


	public function getUserType(){

		$statement = $this->db->prepare($this->GETTYPE);
		$statement->execute();
		$result=$statement->fetchAll();
		return $result;
		
	}



	public function getUsersById($id)
	{
		
		$statement = $this->db->prepare($this->GETUSERSBYID);
		$statement->bindValue(1, $id);
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
		return $statement->execute();

	}



    public function UpdateUser(User $user,$id)
	{
		
		$statement = $this->db->prepare($this->UPDATUSER);
        $statement->bindValue(1, $user->username);
		$statement->bindValue(2, $user->email);
		$statement->bindValue(3, $user->usertype);
		$statement->bindValue(4, $user->phone);
		$statement->bindValue(5, $user->adress);
        $statement->bindValue(6, $id);
		return $statement->execute();
	}



    public function DeleteUser($id)
	{
		
		$statement = $this->db->prepare($this->DELETEUSER);
        $statement->bindValue(1,$id);

        return  $statement->execute();
	
	}
    

    public function BanUser($ban,$id)
	{
		
		$statement = $this->db->prepare($this->UPDATEBAN);
        $statement->bindValue(1,$ban);
        $statement->bindValue(2,$id);

        return  $statement->execute();
	
	}


  

}


	
?>
