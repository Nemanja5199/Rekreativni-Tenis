

<?php


class User {
 
  
  function  User($username,$email,$pwd,$usertype,$phone,$adress,$vkey)

 {
    $this->username=$username;
    $this->email=$email;
    $this->pwd=$pwd;
    $this->usertype=$usertype;
    $this->phone=$phone;
    $this->adress=$adress;
    $this->vkey=$vkey;
 }


 function  __construct()

 {
    $this->username='';
    $this->email='';
    $this->pwd='';
    $this->usertype='';
    $this->phone='';
    $this->adress='';
    $this->vkey='';
 }
 


}

?>