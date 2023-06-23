<?php
if (!session_id()) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Rekreativni tenis | Igrači</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href='fullcalendar/main.css'>
  <script src="fullcalendar/main.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <style>
    body {
      font-size: 17.5px !important;
      background-color: rgba(0, 0, 0, 0.03) !important;
    }
  </style>
</head>

<body>

  <article>

    <?php

    if (isset($_SESSION['username']) && $_SESSION['user_type'] == 1)
      include '../includes/header_player.php';

    else if (isset($_SESSION['username']) && $_SESSION['user_type'] == 2)

      include '../includes/header_admin.php';

    else

      include '../includes/header.php';
    ?>

    <?php
    require_once 'Controller.php';
    $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
    $cp = new controller();
    $players = $cp->GetPlayers5();
    ?>

    <h1 class="text-center">Igrači</h1>

    <div class="container w-50 mt-5">

      <a href="index.php?search=Svi"> <button class="btn btn-success">Svi</button></a>
      <a href="index.php?search=Muski"> <button class="btn btn-success">Muski</button></a>
      <a href="index.php?search=Zenski"> <button class="btn btn-success">Zenski</button></a>
      <a href="index.php?search=TOP5"> <button class="btn btn-success">Top 5</button></a>
      <a href="index.php?search=TOP5M"> <button class="btn btn-success">Top 5 Muskih</button></a>
      <a href="index.php?search=TOP5Z"> <button class="btn btn-success">Top 5 Zenskih</button></a>

      <br> <br>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Slika</th>
            <th scope="col">Ime</th>
            <th scope="col">Prezime</th>
            <th scope="col">Broj pobeda</th>
            <th scope="col">Broj poraza</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($players as $p) { ?>
            <tr>
              <th scope="row" class="w-25"><img src="<?= $p['image_url'] ?>" alt="slika" class="img-fluid img-thumbnail" style="max-width: 70%"></th>
              <td><?= $p['name'] ?></td>
              <td><?= $p['surname'] ?></td>
              <td><?= $p['matches_won'] ?></td>
              <td><?= $p['matches_lost'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>

    <?php include "../includes/footer.php" ?>

  </article>

</body>

</html>