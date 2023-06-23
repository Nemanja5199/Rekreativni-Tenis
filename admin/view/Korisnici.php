<?php

include_once '../partials/header.php';

require_once '../Korisnik/ControllerKorisnik.php';

$cs = new controllerKorisnik();



$page=isset($_REQUEST['page'])?$_REQUEST['page']:1;


$users = $cs->GetUsers($page);

$totalrecords= $cs->GetUsersCount();



  $totalPages= ceil($totalrecords/5);






?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
  <br><br>
  <h2 style="text-align: center;">Lista Korisnika</h2>
  <br><br>

  <a href="../Pocetna/?action=NoviKorisnik"><button class="btn btn-primary">Unesi novog korisnika</button></a><br><br>
  <table class="table table-bordered align-middle" style="text-align: center;">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Telefon</th>
        <th scope="col">Adresa</th>
        <th scope="col">Tip</th>
        <th scope="col">Akcije</th>
      </tr>
    </thead>
   
      <tbody>
        <?php foreach($users as $u){?>
          <tr>
          <td><?= $u['id']?></td>
          <td><?= $u['username']?></td>
          <td><?= $u['email']?></td>
          <td><?= $u['phone']?></td>
          <td><?= $u['adress']?></td>
          <td><?= $u['type_name']?></td>
          <td class="w-25">
          <a href="../Korisnik/?action=EDIT&id=<?= $u['id']?>"><button type="button" class="btn btn-primary">Edit</button></a>
          <a href="../Korisnik/?action=DeletUser&id=<?= $u['id']?>"><button type="button" class="btn btn-danger">Delete</button></a>
            <?php 
            if($u['Ban']==0){
            ?>
         <a href="../Korisnik/?action=Ban&id=<?= $u['id']?>"><button type="button" class="btn btn-dark">Ban</button></a>
         <?php } else if($u['Ban']==1){  ?>
        <a href="../Korisnik/?action=Unban&id=<?= $u['id']?>"><button type="button" class="btn btn-dark">Unban</button></a>
         <?php } ?>
        
        </td>

        
          </tr>
          <?php }?>
    

      </tbody>
    </table>
  </main>

  <ul class="pagination">
 
    <li class="page-item"><a class="page-link" href="../Pocetna/?action=Korisnici&page=<?= $page=$page-1==0?1:$page-1 ?>">Previous</a></li>
    <?php  for( $i=1;$i<=$totalPages ; $i++) {?>
    <li class="page-item"><a class="page-link" href="../Pocetna/?action=Korisnici&page=<?=$i?>"><?=$i?></a></li>
    <?php }?>
    <li class="page-item"><a class="page-link" href="../Pocetna/?action=Korisnici&page=<?= $page=$page==$totalPages?$totalPages:$page+1?>">Next</a></li>
  </ul>
  
  

  <?php

include_once '../partials/footer.php';

?>

 
