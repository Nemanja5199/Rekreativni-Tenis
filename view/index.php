<?php
if(!session_id()) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rekreativni Tenis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <style>

 body{
  font-size:17.5px !important;
  background-color: rgba(0, 0, 0, 0.03) !important;
 }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      @media (max-width: 768px) {
      h1, h2, p{
        text-align:center;
        }

        @media (max-width: 768px) {
        #carousel-caption{
          margin-bottom:-5%;
        }
      }

      @media (max-width: 580px) {
        #carousel-caption{
          margin-bottom:-2% !important;
        }
      }

      @media (max-width: 444px) {
        #carousel-caption{
          margin-bottom:-7% !important;
        }
      }
    
    }
  </style>
</head>
<body>

<article>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div id="myCarousel" class="carousel-inner">
      <div id="myCarousel" class="carousel-item active">
        <img width="100%" height="100%" src="https://i.imgur.com/SCoKxv0.jpg">

        <div class="container">
          <div id="carousel-caption" class="carousel-caption text-start mb-5">
            <h1>Rezervacija terena</h1>
            
            <p>Rezervišite vaš omiljeni teren na određeno vreme.</p>
            <p><a class="btn btn-lg btn-success" href="../Igrac/login.php">Rezervacija</a></p>
          </div>
        </div>
      </div>
      <div id="myCarousel" class="carousel-item">
        <img width="100%" height="100%" src="https://i.imgur.com/O6IucNu.jpg">

        <div class="container">
          <div id="carousel-caption" class="carousel-caption text-start mb-5">
            <h1>Učlanite se u klub</h1>
            <p>Postanite član vašeg omiljenog kluba u samo par koraka</p>
            <p><a class="btn btn-lg btn-success" href="../User/?action=LoginFrom">Postani član</a></p>
          </div>
        </div>
      </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <?php

  if(isset($_SESSION['username']) && $_SESSION['user_type'] == 1)
  {
    include '../includes/header_player.php';
    echo "<br><br><br><br>";
  }
 

  else if(isset($_SESSION['username']) && $_SESSION['user_type'] == 2)
  {
  include '../includes/header_admin.php';
  echo "<br><br><br><br>";
  }
  else

  include '../includes/header.php';
  ?>

<?php  ?>

<main>

<br><br>
  <div id="container-marketing" class="container marketing">

    <div class="row">
      <div class="col-lg-4">

        <img class="w-50" src="https://i.imgur.com/NJXuPIW.png">
        <h2 class="mt-3">Besplatna registracija</h2>
        <p>Registracija je potpuno besplatna!</p>
        <p><a class="btn btn-success" alt="Registracija ikonica" href="../User/?action=RegisterFrom">Registruj se &raquo;</a></p>
      </div>

      <div class="col-lg-4">
      <img class="w-50" src="https://i.imgur.com/8WnDdVg.png">
        <h2 class="mt-3">Praćenje rezultata</h2>
        <p>Pratite rezultate mečeva</p>
        <p><a class="btn btn-success" alt="Rezultati ikonica" href="../User/?action=Rezultat">Rezultati &raquo;</a></p>

        
      </div>

      <div class="col-lg-4">
      <img class="w-50" src="https://i.imgur.com/2iV4DWO.png">
        <h2 class="mt-3">Spisak igrača</h2>
        <p>Uvid u spisak igrača po kategorijama</p>
        <p><a class="btn btn-success" alt="Igraci ikonica" href="../User/?action=Igraci">Igrači &raquo;</a></p>
      </div>
    </div>

    <div style="margin-top:10%" class="row featurette">
      <div class="col-md-7">
        <h2 style="margin-top:0%;" class="featurette-heading">Veliki broj terena na različitim podlogama</h2>
        <p class="lead mt-4">Izaberite jedan od 20+ dostupnih terena. Rezervišite teren za privatan meč ili za turnir.</p>
      </div>
      <div class="col-md-5">
        <img class="img-fluid" alt="Teren 1" src="https://i.imgur.com/MyNfnS0.jpg">

      </div>
    </div>


    <div style="margin-top:10%" class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 style="margin-left:5%;margin-top:0%" class="featurette-heading">Izaberite jednu od 4 podloge - trava, beton, šljaka ili sintetička podloga</h2>
        <p style="margin-left:5%" class="lead mt-4">Na raspolaganju su vam svi popularni tipovi podloga.</p>
      </div>
      <div class="col-md-5 order-md-1">
      <img class="img-fluid" alt="Teren 2" src="https://i.imgur.com/cxeEfjZ.jpg">

      </div>
    </div>


    <div style="margin-top:10%" class="row featurette">
      <div class="col-md-7">
        <h2 style="margin-top:0%" class="featurette-heading">Rezervacija do 15 dana unapred</h2>
        <p class="lead mt-4">Ovim garantujemo da svaki igrač dobije odgovarajući teren.</p>
      </div>
      <div class="col-md-5">
      <img class="img-fluid" alt="Teren 3" src="https://i.imgur.com/bDV7AEZ.jpg">

      </div>
    </div>


  </div>



<?php include "../includes/footer.php"?>


</body>
</html>
