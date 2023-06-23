<?php

if(!session_id()) {
  session_start();
}

if($_SESSION['user_type']!= 2){

 
  header('Location:../../');

}


?>