
<?php

if(!session_id()) {
  session_start();
}

if($_SESSION['user_type']!= 2){

  header('Location:../');
  
}


?>


<!doctype html>
<html lang="en">
<?php

require_once '../Klubovi/controllerClub.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
$msg = isset($msg) ? $msg : "";

$cs = new controllerClub();

$clubs = $cs->GetClub($page);

$totalRecords = $cs->getClubCount();

$totalPages= ceil($totalRecords/5);

?>

<?php include "../partials/header.php" ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
  <br><br>
  <h2 style="text-align: center;">Lista klubova</h2>
  <br><br>
  <?php if (!empty($msg)) { ?>
    <div class="alert alert-success">
      <?= $msg; ?>
    </div>
  <?php } ?><br>

  <a href="../Klubovi/?action=NoviKlub"><button class="btn btn-primary">Unesi novi klub</button></a><br><br>
  <table class="table table-bordered align-middle" style="text-align: center;">
    <thead>
      <tr>
      <th scope="col">ID</th>
        <th scope="col">Naziv</th>
        <th scope="col">Opis</th>
        <th scope="col">Slika</th>
        <th scope="col">Akcije</th>
      </tr>
    </thead>
    <tbody <?php foreach ($clubs as $c) { ?> <tr>
      <th scope="row"><?= $c['id'] ?></th>
      <td><?= $c['name'] ?></td>
      <td><?= $c['description'] ?></td>
      <td class="w-25"><img src="<?= $c['image_url'] ?>" alt="slika" class="img-fluid img-thumbnail"></td>
      <td class="w-25">
        <a href="../Klubovi/index.php?action=Izmeni&id=<?=$c['id']?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="../Klubovi/index.php?action=Izbrisi&id=<?= $c['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
        <?php 
            if($c['Ban']==0){
            ?>
         <a href="../Klubovi/?action=Ban&id=<?= $c['id']?>"><button type="button" class="btn btn-dark">Ban</button></a>
         <?php } else if($c['Ban']==1){  ?>
        <a href="../Klubovi/?action=Unban&id=<?= $c['id']?>"><button type="button" class="btn btn-dark">Unban</button></a>
         <?php } ?>


      </tr>
    <?php }
    ?>

    </tbody>
  </table>
  </main>

  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="../Pocetna/?action=Klubovi&page=<?= $page=$page-1==0?1:$page-1 ?>">Previous</a></li>
    <?php  for( $i=1;$i<=$totalPages ; $i++) {?>   
    <li class="page-item"><a class="page-link" href="../Pocetna/?action=Klubovi&page=<?=$i?>"><?=$i?></a></li>
    <?php }?>
    <li class="page-item"><a class="page-link" href="../Pocetna/?action=Klubovi&page=<?= $page=$page==$totalPages?$totalPages:$page+1?>">Next</a></li>
  </ul>
<?php include "../partials/footer.php" ?>