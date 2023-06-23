<?php
if (!session_id()) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <style>
    .dropbtn {
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      background-color: #4EB01E;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 100%;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

  </style>
</head>

<body>

<nav style="background-color:#4cb01e;" class="navbar navbar-expand-md py-4">
  <div class="container-fluid">
  <a style="margin-left:1.5%" class="navbar-brand fw-bold" href="../User/?action=Pocetna"><img style="height:48px;" src="https://i.imgur.com/B4h5YIc.png" alt="tennis ball logo"></a>
  <button style="color:#4cb01e" class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-expanded="true">
      <span class="navbar-toggler-icon text-white"></span>
    </button> 
    <div class="collapse navbar-collapse text-center" id="mynavbar" > 
  <ul style="margin:0 auto !important" class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link text-white" href="../User/?action=Pocetna">Početna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../User/?action=Igraci">Lista Igrača</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="http://tennis-clubs.epizy.com">Klubovi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../User/?action=Rezultat">Rezultati</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../view/onama.php">O nama</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../view/oautorima.php">Autori</a>
      </li>
      </ul>
      <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link text-white" href="../User/?action=LoginFrom">Login</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="../User/?action=RegisterFrom">Register</a></li>
      </ul>
  </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>