<?php

require_once '../config/db.php';

class DAOPlayer {

	private $db;

	private $GETPLAYERS = "SELECT * FROM player ORDER BY matches_won DESC;";
    private $GETPLAYERSMALE = "SELECT * FROM player WHERE gender='muski' OR gender='muški' ORDER BY matches_won DESC;";
    private $GETPLAYERSFEMALE = "SELECT * FROM player WHERE gender='zenski' OR gender='ženski' ORDER BY matches_won DESC;";
	private $GETPLAYERS5 = "SELECT * FROM player ORDER BY matches_won LIMIT 5;";
    private $GETPLAYERSMALE5 = "SELECT * FROM player WHERE gender='muski' OR gender='muški' ORDER BY matches_won DESC LIMIT 5;";
    private $GETPLAYERSFEMALE5 = "SELECT * FROM player WHERE gender='zenski' OR gender='ženski' ORDER BY matches_won DESC LIMIT 5;";


	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getPlayers()
	{
		$statement = $this->db->prepare($this->GETPLAYERS);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;
	}

	public function getPlayersMale()
	{
		$statement = $this->db->prepare($this->GETPLAYERSMALE);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;
	}

	public function getPlayersFemale()
	{
		$statement = $this->db->prepare($this->GETPLAYERSFEMALE);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;
	}
     
    public function getPlayers5()
	{
		$statement = $this->db->prepare($this->GETPLAYERS5);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;
	}

    public function getPlayersMale5()
	{
		$statement = $this->db->prepare($this->GETPLAYERSMALE5);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;
	}

	public function getPlayersFemale5()
	{
		$statement = $this->db->prepare($this->GETPLAYERSFEMALE5);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;
	}

}
?>