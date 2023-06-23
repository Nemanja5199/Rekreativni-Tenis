<?php
require_once 'db.php';

class DAO {
	private $db;

	// za 2. nacin resenja
	private $PLAYERLOGIN = "SELECT * FROM `player` WHERE username = ? AND password = ?;";
	private $LOGINID = "SELECT `id` FROM `player` WHERE username = ? AND password = ?;";
	private $GETPLAYERBYID = "SELECT * FROM `player` WHERE id = ?";
	
	private $GETCLUBBYID = "SELECT * FROM `club` WHERE id = ?;";
	private $GETALLCLUBS = "SELECT * FROM `club`";	
	private $GETALLPLAYERS = "SELECT * FROM player";
	private $GETALLPLAYERSBYGENDER = "SELECT * FROM player WHERE gender = ?";
	private $CREATEPLAYERACCOUNT = "INSERT INTO `player`(`name`, `surname`, `gender`, `username`, `password`,`club_id`) VALUES (?,?,?,?,?,?)";

	private $UPDATEPLAYER = "UPDATE `player` SET `name`=?,`surname`=?,`image_url`=?,`club_id`=?,`username`=?,`password`=? WHERE id = ?";

	public function updatePlayer($name,$surname,$image_url,$clubID,$username,$password,$id){
		
		$statement = $this->db->prepare($this->UPDATEPLAYER);
		$statement->bindValue(1, $name);
		$statement->bindValue(2, $surname);
		$statement->bindValue(3, $image_url);
		$statement->bindValue(4, $clubID);
		$statement->bindValue(5, $username);
		$statement->bindValue(6, $password);
		$statement->bindValue(7, $id);
		
		$statement->execute();
	}

	private $GETALLMATCHES = "SELECT * from `matches`";
	public function getAllMatches()
	{
			
		$statement = $this->db->prepare($this->GETALLMATCHES);
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}

	private $GETALLMATCHSTATUS = "SELECT * FROM `match_status`";
	public function getAllMatchStatus()
	{
		
		
		$statement = $this->db->prepare($this->GETALLMATCHSTATUS);
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}

	private $GETALLCATEGORY = "SELECT * FROM `category`";
	public function getAllCategorty()
	{
		
		
		$statement = $this->db->prepare($this->GETALLCATEGORY);
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}

	private $INSERTMATCH = "INSERT INTO `matches` (`match_date`, `match_time`, `match_type`, `winner`, `court_id`, `player1_id`, `player2_id`, `match_status`, `category`) VALUES (?, ?, '/', '/', ?, ?, ?, ?, ?);";

	public function createMatch($matchDate, $matchTime, $winer, $courtID, $player1ID, $player2ID, $matchStatus, $category)
	{
		
		$statement = $this->db->prepare($this->INSERTMATCH);
		$statement->bindValue(1, $matchDate);
		$statement->bindValue(2, $matchTime);
		$statement->bindValue(3, $courtID);
		$statement->bindValue(4, $player1ID);
		$statement->bindValue(5, $player2ID);
		$statement->bindValue(6, $matchStatus);
		$statement->bindValue(7, $category);
		
		$statement->execute();
	}

	private $GETALLCOURTS = "SELECT * FROM court";
	public function getAllCourts()
	{
		
		
		$statement = $this->db->prepare($this->GETALLCOURTS);
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}

	public function __construct()
	{
		$this->db = DB::createInstance();
	}
	public function createPlayer($name, $lastname, $gender, $username, $password, $clubid)
	{
		
		$statement = $this->db->prepare($this->CREATEPLAYERACCOUNT);
		$statement->bindValue(1, $name);
		$statement->bindValue(2, $lastname);
		$statement->bindValue(3, $gender);

		$statement->bindValue(4, $username);
		$statement->bindValue(5, $password);
		$statement->bindValue(6, $clubid);
		
		$statement->execute();
	}
	public function getAllPlayers()
	{
		
		
		$statement = $this->db->prepare($this->GETALLPLAYERS);
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}
	public function getPlayerById($id)
	{
		$statement = $this->db->prepare($this->GETPLAYERBYID);
		$statement->bindValue(1, $id);

		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}

	public function getAllPlayersByGender($gender)
	{
		
		
		$statement = $this->db->prepare($this->GETALLPLAYERSBYGENDER);
		$statement->bindValue(1, $gender);

		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}

	public function getAllClubs()
	{
				
		$statement = $this->db->prepare($this->GETALLCLUBS);
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}

	public function playerLogin($username, $password)
	{
	
		$statement = $this->db->prepare($this->PLAYERLOGIN);
		$statement->bindValue(1, $username);
		$statement->bindValue(2, $password);

		$statement->execute();

		
		$result = $statement->fetch();
		return $result;
	}

	public function LoginID($username, $password)
	{
	
		$statement = $this->db->prepare($this->LOGINID);
		$statement->bindValue(1, $username);
		$statement->bindValue(2, $password);

		$statement->execute();

		
		$result = $statement->fetch();
		return $result;
	}

	public function deleteOsoba($idosoba)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("DELETE  FROM osoba WHERE idosoba = :idosoba");
		$statement->execute(array(':idosoba' => $idosoba));
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->DELETEOSOBA);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
	}

	public function getClubById($id)
	{
		
		$statement = $this->db->prepare($this->GETCLUBBYID);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
}
?>
