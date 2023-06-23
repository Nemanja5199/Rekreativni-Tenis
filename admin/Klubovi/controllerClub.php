
<?php

include_once '../partials/Zastita.php';

?>



<?php

require_once 'DAO.php';

if (!session_id()) {
  session_start();
}

class controllerClub
{

  


  




  function BanClub($id){

    $ban= 1;


    $dao = new DAO();
   if(!$dao->BanClub($ban,$id)){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

}



function UnbanClub($id){

    $ban= 0;


    $dao = new DAO();
   if(!$dao->BanClub($ban,$id)){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

}


  function getClubCount()
  {

    $dao = new DAO();

    $clubs = $dao->getClubCount();

    return $clubs;
  }

  function GetClub($page)
  {

    $dao = new DAO();

    $clubs = $dao->getClubs($page);

    return $clubs;
  }


  function GetClubByid($id)
  {

    $dao = new DAO();

    $clubs = $dao->getClubById($id);

    return $clubs;
  }


  function InsertClub()
  {

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    $dao = new DAO();

    $dao->InsertClub($name, $image_url, $description);
  }


  function UpdateClub()
  {
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $image_url = isset($_POST['image_url']) ? $_POST['image_url'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';

  

    $dao = new DAO();
    $dao->UpdateClub($name, $image_url, $description, $id);
  }


  function DeleteClub()
  {

    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    $msg = isset($msg) ? $msg : "";

    if (!empty($id)) {
      $dao = new DAO();
      $dao->DeleteClub($id);
      $msg = "Uspešno izbrisan klub!";
      include '../view/Klubovi.php';
    } else {
      $msg = "Greška!";
      include '../view/Klubovi.php';
    }
  }
}


?>