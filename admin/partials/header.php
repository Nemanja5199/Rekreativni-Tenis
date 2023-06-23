

<?php

include_once 'Zastita.php';

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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

        .igraci {
            text-anchor: middle;
            margin-right: auto;
            margin-left: 22%;
            margin-top: 5%;
            text-align: center;
            height: 70%;
            width: 70%;


        }


        th,
        td {
            width: 150px;
            text-align: center;
            padding: 15px
        }


        a {
            text-decoration: none !important;
        }


        .buttons {

            margin-left: 20%;
            margin-right: auto;
            margin-top: 5%;
            width: 10%;
            height: 10%;
            padding: 1px;
            text-align: center;


        }

        .pagination{


            margin-left: 45%;
            margin-right: auto;
            margin-top: 5%;
            width: 15%;
            height: 15%;
            padding: 1px;
            text-align: center;



        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

</head>


<?php 

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

?>
<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../Pocetna/?action=Pocetna"> Admin panel</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../../User/?action=Pocetna">Back</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">


                            <a class="nav-link <?php if($action=='Pocetna') echo 'active'?>" aria-current="page" href="../Pocetna/?action=Pocetna">
                                Početna
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($action=='Klubovi') echo 'active'?> " href="../Pocetna/?action=Klubovi">
                                Klubovi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php if($action=='Korisnici') echo 'active'?>" href="../Pocetna/?action=Korisnici">
                                Korisnici
                            </a>
                        </li>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($action=='Mecevi') echo 'active'?> " href="../Pocetna/?action=Mecevi">
                                Mečevi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($action=='Igraci') echo 'active'?> " href="../Pocetna/?action=Igraci">
                            
                                Igrači
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($action=='Teren') echo 'active'?> " href="../Pocetna/?action=Teren">
                            
                                Tereni
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>