<?php

require_once '../config/db.php';

class DAORez
{

	private $db;

	private $GETMECEVI  = "SELECT m.*, c.type, p1.name AS ime1, p1.surname AS prezime1, p2.name AS ime2, p2.surname AS prezime2, s.status, ct.name AS kat 
	FROM matches AS m INNER JOIN court AS c ON m.court_id = c.id 
	JOIN player AS p1 ON m.player1_id  = p1.id
    JOIN player AS p2 ON m.player2_id  = p2.id
	JOIN match_status AS s ON m.match_status = s.id
	JOIN category AS ct ON m.category = ct.id ORDER BY m.id;";
    private $GETBUDUCI  = "SELECT m.*, c.type, p1.name AS ime1, p1.surname AS prezime1, p2.name AS ime2, p2.surname AS prezime2, s.status, ct.name AS kat 
	FROM matches AS m INNER JOIN court AS c ON m.court_id = c.id 
	JOIN player AS p1 ON m.player1_id  = p1.id
    JOIN player AS p2 ON m.player2_id  = p2.id
	JOIN match_status AS s ON m.match_status = s.id
	JOIN category AS ct ON m.category = ct.id 
    WHERE s.status = 'Buduci' OR s.status = 'Budući' ORDER BY m.id;";
    private $GETZAVRSENI  = "SELECT m.*, c.type, p1.name AS ime1, p1.surname AS prezime1, p2.name AS ime2, p2.surname AS prezime2, s.status, ct.name AS kat 
	FROM matches AS m INNER JOIN court AS c ON m.court_id = c.id 
	JOIN player AS p1 ON m.player1_id  = p1.id
    JOIN player AS p2 ON m.player2_id  = p2.id
	JOIN match_status AS s ON m.match_status = s.id
	JOIN category AS ct ON m.category = ct.id 
    WHERE s.status = 'Zavrsen' OR s.status = 'Završen' ORDER BY m.id;";
	private $GETCOURT = "SELECT * FROM court";
	private $GETPLAYER = "SELECT * FROM player";
	private $GETMSTATUS = "SELECT * FROM match_status";
	private $GETCATEGORY = "SELECT * FROM category";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getMecevi()
	{
		$statement = $this->db->prepare($this->GETMECEVI);
		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}

    public function getMeceviBuduci()
	{
		$statement = $this->db->prepare($this->GETBUDUCI);
		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}

    public function getMeceviZavrseni()
	{
		$statement = $this->db->prepare($this->GETZAVRSENI);
		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}


	public function getTereni()
	{
		$statement = $this->db->prepare($this->GETCOURT);
		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}

	public function getIgraci()
	{
		$statement = $this->db->prepare($this->GETPLAYER);
		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}

	public function getStatus()
	{
		$statement = $this->db->prepare($this->GETMSTATUS);
		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}

	public function getKategorije()
	{
		$statement = $this->db->prepare($this->GETCATEGORY);
		$statement->execute();

		$result = $statement->fetchAll();
		return $result;
	}

}
