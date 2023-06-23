<?php

require_once '../../config/db.php';

class DAO
{

	private $db;

	private $GETMECEVI  = "SELECT m.*, c.type, p1.name AS ime1, p1.surname AS prezime1, p2.name AS ime2, p2.surname AS prezime2, s.status, ct.name AS kat 
	FROM matches AS m INNER JOIN court AS c ON m.court_id = c.id 
	JOIN player AS p1 ON m.player1_id  = p1.id
    JOIN player AS p2 ON m.player2_id  = p2.id
	JOIN match_status AS s ON m.match_status = s.id
	JOIN category AS ct ON m.category = ct.id ORDER BY m.id;";
	private $GETMECBYID  = "SELECT * FROM matches WHERE id = ?";
	private $DELETEMEC  = "DELETE FROM matches WHERE id = ?";
	private $GETCOURT = "SELECT * FROM court";
	private $GETPLAYER = "SELECT * FROM player";
	private $GETMSTATUS = "SELECT * FROM match_status";
	private $GETCATEGORY = "SELECT * FROM category";
	private $INSERTMECEVI = "INSERT INTO matches (match_date, match_time, match_type, winner, court_id, player1_id, player2_id, match_status, rezultat, category) VALUES(?,?,?,?,?,?,?,?,?,?)";
	private $UPDATEMEC = "UPDATE matches SET match_date=?, match_time=?, match_type=?, winner=?, court_id=?, player1_id=?, player2_id=?, match_status=?, rezultat=?, category=? WHERE id=?";

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

	public function getMecById($id)
	{
		$statement = $this->db->prepare($this->GETMECBYID);
		$statement->bindValue(1, $id);

		$statement->execute();
		$result = $statement->fetch();
		return $result;
	}

	public function deleteMec($id)
	{
		$statement = $this->db->prepare($this->DELETEMEC);
		$statement->bindValue(1, $id);

		return  $statement->execute();
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

	public function InsertMec($match_date, $match_time, $match_type, $winner, $court_id, $player1_id, $player2_id, $match_status, $rezultat, $category)
	{

		$statement = $this->db->prepare($this->INSERTMECEVI);
		$statement->bindValue(1, $match_date);
		$statement->bindValue(2, $match_time);
		$statement->bindValue(3, $match_type);
		$statement->bindValue(4, $winner);
		$statement->bindValue(5, $court_id);
		$statement->bindValue(6, $player1_id);
		$statement->bindValue(7, $player2_id);
		$statement->bindValue(8, $match_status);
		$statement->bindValue(9, $rezultat);
		$statement->bindValue(10, $category);

		return $statement->execute();
	}

	public function UpdateMec($match_date, $match_time, $match_type, $winner, $court_id, $player1_id, $player2_id, $match_status, $rezultat, $category,  $id)
	{

		$statement = $this->db->prepare($this->UPDATEMEC);
		$statement->bindValue(1, $match_date);
		$statement->bindValue(2, $match_time);
		$statement->bindValue(3, $match_type);
		$statement->bindValue(4, $winner);
		$statement->bindValue(5, $court_id);
		$statement->bindValue(6, $player1_id);
		$statement->bindValue(7, $player2_id);
		$statement->bindValue(8, $match_status);
		$statement->bindValue(9, $rezultat);
		$statement->bindValue(10, $category);
		$statement->bindValue(11, $id);

		return $statement->execute();
	}
}
