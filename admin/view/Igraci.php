

<?php
require_once '../Igraci/controllerIgraci.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$msg = isset($msg) ? $msg : "";
$page=isset($_REQUEST['page'])?$_REQUEST['page']:1;



$cp = new controllerIgraci();
$players = $cp->GetPlayer($page);

$totalRecords = $cp->getPlayerCount();

$totalPages= ceil($totalRecords/5);
?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
  <br><br>
  <h2 style="text-align: center;">Lista igrača</h2>
  <br>
  <a href="../Igraci/DodajIgraca.php"><button class="btn btn-primary">Unesi novog igrača</button></a>
  <br><br>
  <?php if (!empty($msg)) { ?>
    <div class="alert alert-success">
      <?= $msg; ?>
    </div>
  <?php } ?><br>
  <table class="table table-bordered align-middle">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Ime</th>
        <th scope="col">Prezime</th>
        <th scope="col">Pobede</th>
        <th scope="col">Porazi</th>
        <th scope="col">Pol</th>
        <th scope="col">Slika</th>
        <th scope="col">Club</th>
        <th scope="col">Akcije</th>
      </tr>
    </thead>
      <tbody>
      <?php foreach ($players as $p) { ?>
        <tr>
          <th scope="row"><?= $p['id'] ?></th>
          <td><?= $p['ime'] ?></td>
          <td><?= $p['surname'] ?></td>
          <td><?= $p['matches_lost'] ?></td>
          <td><?= $p['matches_won'] ?></td>
          <td><?= $p['gender'] ?></td>
          <td class="w-25"><img src="<?= $p['image_url'] ?>" alt="slika" class="img-fluid img-thumbnail"></td>
          <td><?= $p['name'] ?></td>
          <td class="w-25">
            <a href="../Igraci/?action=Izmeni&id=<?= $p['id'] ?>"><button type="button" class="btn btn-primary">Edit</button></a>
            <a href="../Igraci/?action=Izbrisi&id=<?= $p['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
    

            <?php 
            if($p['Ban']==0){
            ?>
         <a href="../Igraci/?action=Ban&id=<?= $p['id']?>"><button type="button" class="btn btn-dark">Ban</button></a>
         <?php } else if($p['Ban']==1){  ?>
        <a href="../Igraci/?action=Unban&id=<?= $p['id']?>"><button type="button" class="btn btn-dark">Unban</button></a>
         <?php } ?>

          </td>
        </tr>
    <?php } ?>
    </tbody>
  </table>
</main>

<ul class="pagination">
 
 <li class="page-item"><a class="page-link" href="../Pocetna/?action=Igraci&page=<?= $page=$page-1==0?1:$page-1 ?>">Previous</a></li>
 <?php  for( $i=1;$i<=$totalPages ; $i++) {?>
 <li class="page-item"><a class="page-link" href="../Pocetna/?action=Igraci&page=<?=$i?>"><?=$i?></a></li>
 <?php }?>
 <li class="page-item"><a class="page-link" href="../Pocetna/?action=Igraci&page=<?= $page=$page==$totalPages?$totalPages:$page+1?>">Next</a></li>
</ul>


<?php include "../partials/footer.php" ?>