<?php

include_once '../partials/Zastita.php';

?>



<?php


require_once '../../config/db.php';

class DAO {
	private $db;

	private $GETCLUB = "SELECT * FROM club LIMIT ?,?" ;
	private $INSERTCLUB = "INSERT INTO club(name,image_url,description) VALUES(?,?,?)";
    private $UPDATECLUB = "UPDATE club SET name=?, image_url=?, description=? WHERE id=?";
    private $DELETECLUB = "DELETE FROM club WHERE id=?";


	private $GETCLUBBYID = "SELECT * FROM club WHERE id=? LIMIT 1";
	private $GETCLUBNUMBER = "SELECT COUNT(*) FROM club";
	private $UPDATEBAN = "UPDATE club SET Ban=? WHERE id=?";


	

	public function __construct()
	{
		$this->db = DB::createInstance();
	}




	public function getClubCount(){

		$statement = $this->db->prepare($this->GETCLUBNUMBER);
		$statement->execute();
		$result=$statement->fetchColumn();
		return $result;
		
	}


	public function getClubs($page)
	{

		$numPage=5;
		$startpage=($page-1)*$numPage;
		
		$statement = $this->db->prepare($this->GETCLUB);
		$statement->bindValue(1,$startpage,PDO::PARAM_INT);
		$statement->bindValue(2,$numPage,PDO::PARAM_INT);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;

	}

	public function getClubById($id)
	{
		
		$statement = $this->db->prepare($this->GETCLUBBYID);
		$statement->bindValue(1,$id);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;

	}



    public function InsertClub($name,$image_url,$description)
	{
		
		$statement = $this->db->prepare($this->INSERTCLUB);
        $statement->bindValue(1,$name);
        $statement->bindValue(2,$image_url);
        $statement->bindValue(3,$description);

		return $statement->execute();

	}



    public function UpdateClub($name,$image_url,$description,$id)
	{
		
		$statement = $this->db->prepare($this->UPDATECLUB);
        $statement->bindValue(1,$name);
        $statement->bindValue(2,$image_url);
        $statement->bindValue(3,$description);
        $statement->bindValue(4,$id);

		return $statement->execute();
	}



    public function DeleteClub($id)
	{
		
		$statement = $this->db->prepare($this->DELETECLUB);
        $statement->bindValue(1,$id);

        return  $statement->execute();
	
	}




	public function BanClub($ban,$id)
	{
		
		$statement = $this->db->prepare($this->UPDATEBAN);
        $statement->bindValue(1,$ban);
        $statement->bindValue(2,$id);

        return  $statement->execute();
	
	}

}


	
?>
