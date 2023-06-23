
<?php

require_once 'DAO.php';
require_once 'UserClass.php';


class controllerUser{

    

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

        if($password==$cpassword){

        $dao= new DAO();
        $user= new User();
        $user->User($username,$email,$password,$usertype,$phone,$adress,$vkey);
    
        if(!$dao->InsertUser($user)){
            echo "<script>alert('Somethnig went wrong.')</script>";
        }
        
     
        echo "<script>alert('Uspesna Registracija.')</script>";
        include_once '../view/UspesnaReg.php';
        

      

        }else{
            echo "<script>alert('Password Not Matched.')</script>";
            include_once '../view/register.php';
        }

        
    }
    else{
        echo "<script>alert('Something Wrong Went.')</script>";
        include_once 'register.php';
    }

   



}






function Login(){


	$email =isset($_POST['email'])?$_POST['email']:'';
	$password =isset($_POST['password'])?$_POST['password']:'';
    
    $password = md5($password);



$dao= new DAO();

if(!session_id()) {
    session_start();
}


if($user=$dao->getLogin($email,$password)){
    foreach($user as $u){
        $_SESSION['username'] = $u['username'];
        $_SESSION['email'] = $u['email'];
        $_SESSION['user_type'] = $u['user_type'];
        $_SESSION['phone'] = $u['phone'];
        $_SESSION['adress'] = $u['adress'];

    }

}else{
    echo "<script>alert('Email or Password is Wrong.')</script>";
}
   



}




function Logout(){

    if(!session_id()) {
        session_start();
    }

    session_unset();
    session_destroy();
 

}

}



?>