<?php

if (!session_id()) {
    session_start();
}

require_once '../Korisnik/ControllerKorisnik.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$msg = isset($msg) ? $msg : "";
$cp = new controllerKorisnik();
$type = $cp->GetUserType();
$user = $cp->GetUsersByid($id);




?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br>
    <h2 style="text-align: center;">Forma za izmenu Korisnika</h2>
    <br>
    <div class="container">
        <form action="../Korisnik/" method="post">
            <div class="row">
                <?php if (!empty($msg)) { ?>
                    <div class="alert alert-success">
                        <?= $msg; ?>
                    </div>
                <?php } ?>


                <?php foreach ($user as $u) { ?>



                    <div class="col">

                        <div class="form-group">
                            <br>
                            <label for="formGroupInput">ID</label>
                            <input type="text" name="id" class="form-control" value="<?= $u['id'] ?> " readonly="readonly">
                        </div>

                        <div class="form-group">
                            <br>
                            <label for="formGroupInput">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $u['username'] ?>">
                        </div>

                        <div class="form-group">
                            <br>
                            <label for="formGroupInput">Email</label>
                            <input type="text" name="email" class="form-control" value="<?= $u['email'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <br>
                            <label for="formGroupInput">Telefon</label>
                            <input type="text" name="phone" class="form-control" value="<?= $u['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <br>
                            <label for="formGroupInput">Adresa</label>
                            <input type="text" name="adress" class="form-control" value="<?= $u['adress'] ?>">
                        </div>
                        <div class="form-group">
                            <br>
                            <label for="NazivKluba">Izaberi tip korisnika</label><br>
                            <select id="NazivKluba" name="usertype" class="form-control">
                                <?php foreach ($type as $c) { ?>
                                    <option value="<?= $c['type_id'] ?>" <?php if ($c['type_name'] == $u['type_name']) echo 'selected' ?>><?= $c['type_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
            </div>
        <?php } ?>
        <br>
        <input type="submit" class="btn btn-primary" name="action" value="Update">
        </form> <br><a href="../Pocetna/?action=Korisnici"><button class="btn btn-primary">Nazad</button></a>
    </div>
</main>
<?php include "../partials/footer.php" ?>