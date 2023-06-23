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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

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

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 100%;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #f1f1f1
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>


<body>

<nav style="background-color:#4cb01e;" class="navbar navbar-expand-md py-4">
  <div class="container-fluid">
  <a style="margin-left:1.5%" class="navbar-brand fw-bold" href="../User/?action=Pocetna"><img style="height:48px;" src="https://i.imgur.com/B4h5YIc.png" alt="tennis ball logo"></a>
  <button style="color:#4cb01e" class="navbar-toggler navbar-dark" role="button" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-expanded="false" aria-controls="collapseExample">
      <span class="navbar-toggler-icon text-white"></span>
    </button> 
    <div class="collapse navbar-collapse text-center" id="mynavbar"> 
  <ul style="margin:0 auto !important" class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link text-white" href="../User/?action=Pocetna">Početna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../User/?action=Igraci">Lista Igrača</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../Igrac/login.php">Zakaži meč</a>
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
          <?php

          if (isset($_SESSION['username']) && $_SESSION['user_type'] == 2) {
            echo '<div class="dropdown">
          <button class="dropbtn">';
            echo '<i class="fa fa-user" aria-hidden="true"></i>' . $_SESSION['username'] . '</button>';
            echo '<div class="dropdown-content text-center">
            <a href="../User/?action=AdminP">Admin panel</a>
            <a href="../User/?action=Logout">Logout</a>
           
          </div>
        </div>';
          } else {
            echo '<li class="nav-item"><a class="nav-link text-white" href="../User/?action=LoginFrom">Login</a></li>';
            echo '<li class="nav-item"><a class="nav-link text-white" href="../User/?action=RegisterFrom">Register</a></li>';
          }

          ?>
        </ul>
      </div>
    </div>
    </div>
  </nav>

</body>

</html>