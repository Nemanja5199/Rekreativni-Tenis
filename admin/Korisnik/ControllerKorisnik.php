<?php


include_once '../partials/Zastita.php';
require_once 'DAO.php';




class controllerKorisnik{

    

    function GetUsersCount(){


        $dao=new DAO();
        
        if(!$users=$dao->getUserCount())
        {
            echo "<script>alert('Somethnig went wrong.')</script>";
        
        }

        return $users;
    }


    function getUserType(){


        $dao=new DAO();
        
        if(!$users=$dao->getUserType())
        {
            echo "<script>alert('Somethnig went wrong.')</script>";
        
        }

        return $users;
    }







function GetUsers($page){


$dao=new DAO();

if(!$users=$dao->getUsers($page))
{
    echo "<script>alert('Somethnig went wrong.')</script>";

}


return $users;

}


function GetUsersByid($id){


    $dao=new DAO();
    
    if(!$users=$dao->getUsersById($id))
    {
        echo "<script>alert('Somethnig went wrong.')</script>";
    
    }
    
    
    return $users;
    
    }
    

function InsertUser(){

   

    
    $username = isset($_POST['username'])?$_POST['username']:'';
	$email =isset($_POST['email'])?$_POST['email']:'';
	$password =isset($_POST['password'])?$_POST['password']:'';
	$cpassword = isset($_POST['cpassword'])?$_POST['cpassword']:'';
	$phone = isset($_POST['phone'])?$_POST['phone']:'';
	$adress = isset($_POST['adress'])?$_POST['adress']:'';

    $password =md5($password);
    $cpassword =md5($cpassword);
    $vkey= md5(time().$username);
    $usertype=1;

    if(!empty($username) && !empty($email) && !empty($password) && !empty($phone) && !empty($adress)){


        $dao= new DAO();
        $user= new User();
        $user->User($username,$email,$password,$usertype,$phone,$adress,$vkey);
    
        if(!$dao->InsertUser($user)){
            echo "<script>alert('Somethnig went wrong.')</script>";
        }
        
     
        echo "<script>alert('Uspesna Registracija.')</script>";
        include_once '../Pocetna/?action=Pocetna';

        
    }
    else{
        echo "<script>alert('Something Wrong Went.')</script>";
        include_once 'register.php';
    }

   



}




function UpdateUser($id){

    $username = isset($_POST['username'])?$_POST['username']:'';
	$email =isset($_POST['email'])?$_POST['email']:'';
	$password =isset($_POST['password'])?$_POST['password']:'';
	$phone = isset($_POST['phone'])?$_POST['phone']:'';
	$adress = isset($_POST['adress'])?$_POST['adress']:'';
    $usertype = isset($_POST['usertype'])?$_POST['usertype']:'';
    $vkey= md5(time().$username);



    $dao= new DAO();
    $user= new User();
    $user->User($username,$email,$password,$usertype,$phone,$adress,$vkey);
   if(!$dao->UpdateUser($user,$id)){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

}





function BanUser($id){

    $ban= 1;


    $dao = new DAO();
   if(!$dao->BanUser($ban,$id)){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

}



function UnbanUser($id){

    $ban= 0;


    $dao = new DAO();
   if(!$dao->BanUser($ban,$id)){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

}



function DeleteUser($id){

  


    $dao = new DAO();
   if(!$dao->DeleteUser($id)){

    echo "<script>alert('Somethnig went wrong.')</script>";

   }

}






}




?>