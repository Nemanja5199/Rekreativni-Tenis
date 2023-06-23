<?php
     class player{
        public $id;
        public $name;
        public $matches_lost;
        public $matches_won;
        public $surname;
        public $gender;
        public $image_url;
        public $club_id;
        public $username;
        public $password;
    }
    require_once 'DAO.php';
    if(!isset($_SESSION)) session_start();
    if($_SESSION["player"] != "")
    {        
        $dao = new DAO();
        $id = $_SESSION["player"];
        $player = new player();
        $player = $dao->getPlayerById($id["id"]);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c733186886.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Player Panel</title>
</head>
<body>


    <?php 
        require_once 'DAO.php';
        $dao = new DAO();
        require 'partials/navbar.html';
        $loginstatus = isset($loginstatus)?($loginstatus):true  ;
        $alert = '<div class="alert mt-2 alert-danger" role="alert">
        Login Failed - Please Check your Credentials      </div>';

    ?>


    <div class="container mt-4">
        <?php
        if($player["image_url"] == ""){
            $player["image_url"] = 'https://labottegadibrunellagcc.com/cmsadmin/upload/deels/mid/noimage.gif';
        }
        ?>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row flex-lg-nowrap">

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <img class="img-fluid" src="<?php echo $player["image_url"] ?>" alt="">
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $player["name"] ?> <?php echo $player["surname"] ?></h4>
                    <p class="mb-0">@<?php echo $player["username"] ?></p>
                    <div class="text-muted"><small>Zadnji put viđen pre 2 sata</small></div>
                    <div class="mt-2">
                      <button class="btn btn-primary" type="button">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Promeni fotografiju</span>
                      </button>
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-primary p-2">Igrač</span>
                    <div class="text-muted"><small>Registrovan 09 Dec 2017</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Izmenite lične podatke</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" action="controllerTemplate-basic.php"method="POST">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Ime</label>
                              <input class="form-control" type="text" name="firstname">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Prezime</label>
                              <input class="form-control" type="text" name="lastname">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Korisničko ime</label>
                              <input class="form-control" name="username" type="text" placeholder="username123">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Adresa fotografije</label>
                              <textarea class="form-control" name="image_url" rows="5" placeholder="https://www...."></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Promenite lozinku</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Trenutna lozinka</label>
                              <input class="form-control" name="passwordOLD" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nova lozinka</label>
                              <input class="form-control" name="password1" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Potvrdite<span class="d-none d-xl-inline"> lozinku</span></label>
                              <input class="form-control" name="passwordNEW" type="password" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="mb-2"><b>Ostanimo u kontaktu</b></div>
                        <div class="row">
                          <div class="col">
                            <label>Email notifikacije</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                <label class="custom-control-label" for="notifications-blog">Blog postovi</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                <label class="custom-control-label" for="notifications-news">Pošta</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                <label class="custom-control-label" for="notifications-offers">Lične ponude</label>
                              </div>
                              <select name="clubid" class="form-select mx-auto d-block my-3" aria-label="Default select example">
                            <option disabled selected>Izaberite svoj klub.</option>
                            <?php 
                                $dao = new DAO();
                                $clubList = $dao->getAllClubs();
                                var_dump($clubList);
                                foreach($clubList as $value){
                                    var_dump($value["name"]);
                                    echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
                                }
                                ?>
                                 <?php if(!$loginstatus){
                                    echo $alert;
                                    } ?>
                            </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit" name="action" value="update">Sačuvaj promene</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
                
              <a class="btn btn-block btn-danger" href="controllerTemplate-basic.php?logout=true"> <i class="fa fa-sign-out"></i><span>Odjava</span></a>

            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Podrška</h6>
            <p class="card-text">Dobijte brzu, besplatnu pomoć od naših ljubaznih pomoćnika.</p>
            <button type="button" class="btn btn-primary">Kontaktirajte nas</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
    </div>
</body>
</html>
<?php }
    else{
        header('location:login.php');
    }
    ?>