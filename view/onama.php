<?php
if(!session_id()) {
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rekreativni tenis | O nama</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href='fullcalendar/main.css' rel='stylesheet' />
  <script src="fullcalendar/main.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">

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
<br><br>
<h1 class="text-center">O nama</h1>
<br>
<div class="container mt-5">
<div class="row">
    <div class="col-sm-5">
    <p>
        
        Zdravo i dobrodošli na našu stranicu. Ova stranica je osmišljena kako bi njeni posetioci mogli zakazati trening, meč i turnir.
    
        Korisnici naše stranice se mogu registrovati i zajedno sa ostalim članovima formirati klubove.
    
        Na stranici će biti dostupan izveštaj o zauzetosti terena, rezultati svih mečeva, nedeljne, mesečne i godišnje rang liste.
    
        Na našem sajtu će se redovno ažurirati rezultati, tako da će posetioci sajta biti upućeni u trenutna dešavanja.
        
        </p>
        
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
        <img class="img-fluid" src="https://i.imgur.com/g5fLg7Y.jpg">
    </div>
</div>
  
</div>

<?php include "../includes/footer.php"?>

</article>

</body>
</html>
