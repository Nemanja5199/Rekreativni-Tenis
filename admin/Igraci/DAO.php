

<?php


include_once '../partials/Zastita.php';


?>


<?php


require_once '../../config/db.php';

class DAO {

	private $db;

	private $GETPLAYER = "SELECT p.id, p.name AS ime, p.matches_lost, p.matches_won, p.surname, p.gender, p.image_url, c.name,p.Ban FROM player AS p JOIN club AS c ON p.club_id = c.id ORDER BY p.id LIMIT ?,?";
	private $GETPLAYERBYID = "SELECT * FROM player WHERE id=?";
	private $INSERTPLAYER = "INSERT INTO player(name, matches_lost, matches_won, surname, gender, image_url, club_id) VALUES(?,?,?,?,?,?,?)";
    private $UPDATEPLAYER = "UPDATE player SET name=?, matches_lost=?, matches_won=?, surname=?, gender=?, image_url=?, club_id=? WHERE id=?";    
    private $DELETEPLAYER = "DELETE FROM player WHERE id=?";
	private $GETCLUB = "SELECT * FROM club";



	private $GETPLAYERNUMBER = "SELECT COUNT(*) FROM player";
	private $UPDATEBAN = "UPDATE player SET Ban=? WHERE id=?";

	public function __construct()
	{
		$this->db = DB::createInstance();
	}



	public function getPlayerCount(){

		$statement = $this->db->prepare($this->GETPLAYERNUMBER);
		$statement->execute();
		$result=$statement->fetchColumn();
		return $result;
		
	}

	public function getPlayers($page)
	{
		$numPage=5;
		$startpage=($page-1)*$numPage;
		$statement = $this->db->prepare($this->GETPLAYER);
		$statement->bindValue(1,$startpage,PDO::PARAM_INT);
		$statement->bindValue(2,$numPage,PDO::PARAM_INT);
		 $statement->execute();

		$result=$statement->fetchAll();
		return $result;
	}

	public function getClubs()
	{
		$statement = $this->db->prepare($this->GETCLUB);
		 $statement->execute();

		$result=$statement->fetchAll();
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

    public function InsertPlayer($name, $matches_lost, $matches_won, $surname, $gender, $image_url, $club_id)
	{
		
		$statement = $this->db->prepare($this->INSERTPLAYER);
        $statement->bindValue(1,$name);
        $statement->bindValue(2,$matches_lost);
        $statement->bindValue(3,$matches_won);
        $statement->bindValue(4,$surname);
        $statement->bindValue(5,$gender);
        $statement->bindValue(6,$image_url);
        $statement->bindValue(7,$club_id);

		return $statement->execute();

	}

    public function UpdatePlayer($name, $matches_lost, $matches_won, $surname, $gender, $image_url, $club_id, $id)
	{
		
		$statement = $this->db->prepare($this->UPDATEPLAYER);
        $statement->bindValue(1,$name);
        $statement->bindValue(2,$matches_lost);
        $statement->bindValue(3,$matches_won);
        $statement->bindValue(4,$surname);
        $statement->bindValue(5,$gender);
        $statement->bindValue(6,$image_url);
        $statement->bindValue(7,$club_id);
		$statement->bindValue(8,$id);

		return $statement->execute();

	}

    public function DeletePlayer($id)
	{
		
		$statement = $this->db->prepare($this->DELETEPLAYER);
        $statement->bindValue(1,$id);

        return  $statement->execute();
	
	}



	public function BanPlayer($ban,$id)
	{
		
		$statement = $this->db->prepare($this->UPDATEBAN);
        $statement->bindValue(1,$ban);
        $statement->bindValue(2,$id);

        return  $statement->execute();
	
	}

}
	
?>
