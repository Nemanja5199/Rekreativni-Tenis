<?php
 include_once '../partials/Zastita.php';
require_once 'DAO.php';


class ControllerTeren{




    



    function getCourtNumber(){


        $dao=new DAO();
        
        if(!$court=$dao->getCourtNumber())
        {
            echo "<script>alert('Somethnig went wrong.')</script>";
        
        }
    
        return $court;
    
    }



function GetCourt($page){


    $dao=new DAO();
    
    if(!$court=$dao->GetCourt($page))
    {
        echo "<script>alert('Somethnig went wrong.')</script>";
    
    }

    return $court;

}





function InsertCourt(){

   

    
    $tip = isset($_POST['tip'])?$_POST['tip']:'';
	$image_url =isset($_POST['image_url'])?$_POST['image_url']:'';
	$description =isset($_POST['description'])?$_POST['description']:'';
	$clubVal = isset($_POST['clubVal'])?$_POST['clubVal']:'';
    $idTerena = isset($_POST['idTerena'])?$_POST['idTerena']:'';

    


    


    if(!empty($tip) && !empty($image_url) && !empty($description) && !empty($clubVal)){


        $dao= new DAO();
        $teren= new Teren();

        $teren->Teren($tip,$image_url,$description,$clubVal);
      
    
        if(!$dao->InsertCourt($teren,$idTerena)){
            echo "<script>alert('Somethnig went wrong.')</script>";
        }
        
     
        echo "<script>alert('Uspesna Unos.')</script>";
      header('Location: ../Pocetna/?action=Teren');

        
    }
    else{
        echo "<script>alert('Something Wrong Went.')</script>";
        include_once '../Pocetna/?action=Teren';
    }

   



}






function UpdateCourt(){

   

    
    $tip = isset($_POST['tip'])?$_POST['tip']:'';
	$image_url =isset($_POST['image_url'])?$_POST['image_url']:'';
	$description =isset($_POST['description'])?$_POST['description']:'';
	$clubVal = isset($_POST['clubVal'])?$_POST['clubVal']:'';
    $idTerena = isset($_POST['idTerena'])?$_POST['idTerena']:'';

    


    


    if(!empty($tip) && !empty($image_url) && !empty($description) && !empty($clubVal)){


        $dao= new DAO();
        $teren= new Teren();

        $teren->Teren($tip,$image_url,$description,$clubVal);
      
    
        if(!$dao->UpdateCourt($teren,$idTerena)){
            echo "<script>alert('Somethnig went wrong.')</script>";
        }
        
     
        echo "<script>alert('Uspesna Unos.')</script>";
      header('Location: ../Pocetna/?action=Teren');

        
    }
    else{
        echo "<script>alert('Something Wrong Went.')</script>";
        header('Location: ../Pocetna/?action=Teren');
    }

   



}







function DeleteCourt($id){

  


    $dao = new DAO();
   if(!$dao->DeleteCourt($id)){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

}



function GetClubNames(){

  


    $dao = new DAO();
   if(!$clubs=$dao->GetClubNames()){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

   return $clubs;

}


function GetCourtById($id){

  


    $dao = new DAO();
   if(!$clubs=$dao->getCourtByID($id)){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

   return $clubs;

}




}


?>