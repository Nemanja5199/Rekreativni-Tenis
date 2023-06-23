<?php

include_once '../partials/Zastita.php';
require_once '../../config/db.php';

require_once 'TereniClass.php';

class DAO {
	private $db;



	private $GETCOURT = "SELECT c.id,c.type,c.image_url,u.name FROM court c JOIN club u  ON c.club_id = u.id ORDER BY c.id asc LIMIT ?,? ";
	private $INSERTCOURT = "INSERT INTO court(id,type,image_url,description,club_id) VALUES(?,?,?,?,?)";
    private $UPDATCOURT = "UPDATE court SET type=?,image_url=?,description=?,club_id=? WHERE id=?";
    private $DELETECOURT= "DELETE FROM court WHERE id=?";




    private $GETTCLUB = "SELECT * FROM club";

	private $GETCOURTBYID = "SELECT c.id,c.type,c.image_url,c.description,u.name FROM court c JOIN club u ON c.club_id = u.id WHERE c.id =? ";

	private $GETCOURTNUMBER = "SELECT COUNT(*) FROM court";


	public function __construct()
	{
		$this->db = DB::createInstance();
	}


	public function getCourtNumber()
	{
		

		$statement = $this->db->prepare($this->GETCOURTNUMBER);
		$statement->execute();
		$result=$statement->fetchColumn();
		return $result;

	}






	public function getCourt($page)
	{
		
		$numPage=5;
		$startpage=($page-1)*$numPage;

		$statement = $this->db->prepare($this->GETCOURT);
		$statement->bindValue(1, $startpage, PDO::PARAM_INT);
		$statement->bindValue(2, $numPage, PDO::PARAM_INT);
		$statement->execute();

		$result=$statement->fetchAll();
		return $result;

	}


	public function getCourtByID($id)
	{
		
		$statement = $this->db->prepare($this->GETCOURTBYID);
		$statement->bindValue(1, $id);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;

	}




	/*public function getUsersById($id)
	{
		
		$statement = $this->db->prepare($this->GETUSERSBYID);
		$statement->bindValue(1, $id);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;

	}*/



    public function InsertCourt(Teren $teren,$id)
	{
		
		$statement = $this->db->prepare($this->INSERTCOURT);
        $statement->bindValue(1, $id);
		$statement->bindValue(2, $teren->tip);
		$statement->bindValue(3, $teren->url);
		$statement->bindValue(4, $teren->deskripcija);
		$statement->bindValue(5, $teren->klub);
		return $statement->execute();

	}



    public function UpdateCourt(Teren $teren,$id)
	{
		
		$statement = $this->db->prepare($this->UPDATCOURT);
        $statement->bindValue(1, $teren->tip);
		$statement->bindValue(2, $teren->url);
		$statement->bindValue(3, $teren->deskripcija);
		$statement->bindValue(4, $teren->klub);
        $statement->bindValue(5, $id);
		return $statement->execute();
	}



    public function DeleteCourt($id)
	{
		
		$statement = $this->db->prepare($this->DELETECOURT);
        $statement->bindValue(1,$id);

        return  $statement->execute();
	
	}
    


    public function GetClubNames()
	{
		
		$statement = $this->db->prepare($this->GETTCLUB);
        $statement->execute();
        $result=$statement->fetchAll();
		return $result;

	
	}




  

    



}


	
?>
