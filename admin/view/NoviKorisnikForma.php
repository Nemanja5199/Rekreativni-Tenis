

<?php

require_once '../Korisnik/ControllerKorisnik.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$msg = isset($msg) ? $msg : "";
$cp = new controllerKorisnik();
$type = $cp->GetUserType();

?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br>
    <h2 style="text-align: center;">Forma za unos Korisnika</h2>
    <br>
    <div class="container">
        <form action="../Korisnik/" method="post">
            <div class="row">
                <?php if (!empty($msg)) { ?>
                    <div class="alert alert-success">
                        <?= $msg; ?>
                    </div>
                <?php } ?>
                <div class="col">
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Unesi Username">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Unesi email">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Unesi password">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Telefon</label>
                        <input type="text" name="phone" class="form-control" placeholder="Unesi telefon">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Adresa</label>
                        <input type="text" name="adress" class="form-control" placeholder="Unesi adresu">
                    </div>
                  
                    <div class="form-group">
                        <br>
                        <label for="NazivKluba">Izaberi tip korisnika</label><br>
                        <select id="NazivKluba" name="usertype" class="form-control ">
                            <?php foreach ($type as $c) { ?>
                                <option value="<?= $c['type_id'] ?>"><?= $c['type_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <br>
            <input type="submit" class="btn btn-primary" name="action" value="Unesi">
        </form> <br><a href="../Pocetna/?action=Korisnici"><button class="btn btn-primary">Nazad</button></a>
    </div>
</main>
<?php include "../partials/footer.php" ?>