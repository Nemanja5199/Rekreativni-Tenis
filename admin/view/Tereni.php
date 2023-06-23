

<!doctype html>
<html lang="en">
<?php

require_once '../Tereni/ControllerTeren.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$msg = isset($msg) ? $msg : "";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$cs = new ControllerTeren();
$court = $cs->GetCourt($page);


$totalRecords = $cs->getCourtNumber();

$totalPages= ceil($totalRecords/5);




?>

<?php include "../partials/header.php" ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
  <br><br>
  <h2 style="text-align: center;">Lista terena</h2>
  <br><br>
  <?php if (!empty($msg)) { ?>
    <div class="alert alert-success">
      <?= $msg; ?>
    </div>
  <?php } ?><br>

  <a href="../Tereni/?action=NoviTeren"><button class="btn btn-primary">Unesi novi teren</button></a><br><br>
  <table class="table table-bordered align-middle" style="text-align: center;">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tip</th>
        <th scope="col">Slika</th>
        <th scope="col">Klub</th>
        <th scope="col">Akcije</th>
      </tr>
    </thead>
    <tbody <?php foreach ($court as $c) { ?> <tr>
      <th scope="row"><?= $c['id']?></th>
      <td><?= $c['type']?></td>
      <td class="w-25"><img src="<?= $c['image_url']?>" alt="slika" class="img-fluid img-thumbnail"></td>
      <td><?= $c['name']?></td>
      <td class="w-25">
        <a href="../Tereni/?action=Izmeni&id=<?= $c['id']?>"><button type="button" class="btn btn-primary">Edit</button></a>
        <a href="../Tereni/?action=Izbrisi&id=<?= $c['id']?>"><button type="button" class="btn btn-danger">Delete</button></a>
      </td>

      </tr>
    <?php }
    ?>

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




<?php include "../partials/footer.php" ?>