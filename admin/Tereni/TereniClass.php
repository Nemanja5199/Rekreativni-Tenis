

<?php
 include_once '../partials/Zastita.php';

class Teren {
 
  
  function  Teren($tip,$url,$deskripcija,$klub)

 {
    $this->tip=$tip;
    $this->url=$url;
    $this->deskripcija=$deskripcija;
    $this->klub=$klub;
 }


 function  __construct()

 {
    $this->tip='';
    $this->url='';
    $this->deskripcija='';
    $this->klub='';
 }
 


}

?>