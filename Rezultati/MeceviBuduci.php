<?php
if(!session_id()) {
  session_start();
}
?>

<?php

require_once 'ControllerRez.php';
$cm = new controllerRez();
$bmecevi = $cm->GetMBuduci();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rekreativni tenis | Rezultati</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href='fullcalendar/main.css'>
  <script src="fullcalendar/main.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <style>

 body{
  font-size:17.5px !important;
  background-color: rgba(0, 0, 0, 0.03) !important;
 }

  </style>
</head>
<body>

<article>

<?php

if(isset($_SESSION['username']) && $_SESSION['user_type'] == 1)
include '../includes/header_player.php';

else if(isset($_SESSION['username']) && $_SESSION['user_type'] == 2)

include '../includes/header_admin.php';

else

include '../includes/header.php';
?>

<h1 class="text-center">Rezultati</h1>

<div class="container w-50 mt-5">
<a href="../Rezultati/index.php?search=Svi"> <button class="btn btn-success">Svi</button></a>
<a href="../Rezultati/index.php?search=Završeni"> <button class="btn btn-success">Završeni</button></a>
<a href="../Rezultati/index.php?search=Budući"> <button class="btn btn-success">Budući</button></a>
 <br>  <br>
      
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
                <th scope="col">Datum</th>
                <th scope="col">Vreme</th>
                <th scope="col">Tip meca</th>
                <th scope="col">Pobednik</th>
                <th scope="col">Teren</th>
                <th scope="col">Igrac 1</th>
                <th scope="col">Igrac 2</th>
                <th scope="col">Status meca</th>
                <th scope="col">Rezultat</th>
                <th scope="col">Kategorija</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($bmecevi as $m) { ?>
                <tr>
                    <th scope="row"><?= $m['id'] ?></th>
                    <td><?= $m['match_date'] ?></td>
                    <td><?= $m['match_time'] ?></td>
                    <td><?= $m['match_type'] ?></td>
                    <td><?= $m['winner'] ?></td>
                    <td><?= $m['type'] ?></td>
                    <td><?= $m['ime1'] . ' ' . $m['prezime1'] ?></td>
                    <td><?= $m['ime2'] . ' ' . $m['prezime2']  ?></td>
                    <td><?= $m['status'] ?></td>
                    <td><?= $m['rezultat'] ?></td>
                    <td><?= $m['kat'] ?></td>
                </tr>
            <?php } ?>
  </tbody>
</table>
    </div>

<?php include "../includes/footer.php"?>

</article>

</body>
</html>