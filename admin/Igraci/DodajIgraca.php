


<?php


include_once '../partials/Zastita.php';

?>


<?php
require_once 'controllerIgraci.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$msg = isset($msg) ? $msg : "";
$cp = new controllerIgraci();
$clubs = $cp->GetClub();
?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br>
    <h2 style="text-align: center;">Forma za unos igrača</h2>
    <br>
    <div class="container">
        <form action="index.php" method="post">
            <div class="row">
                <?php if (!empty($msg)) { ?>
                    <div class="alert alert-success">
                        <?= $msg; ?>
                    </div>
                <?php } ?>
                <div class="col">

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Ime igrača</label>
                        <input type="text" name="name" class="form-control" placeholder="Unesi ime igrača">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Broj izgubljenih mečeva</label>
                        <input type="number" name="matches_lost" class="form-control" placeholder="Unesi br. izgubljenih mečeva">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Broj dobijenih mečeva</label>
                        <input type="number" name="matches_won" class="form-control" placeholder="Unesi br. dobijenih mečeva">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Prezime igrača</label>
                        <input type="text" name="surname" class="form-control" placeholder="Unesi prezime igrača">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Pol igrača</label>
                        <input type="text" name="gender" class="form-control" placeholder="Unesi pol igrača">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="formURL">Unesi sliku</label>
                        <input class="form-control" type="url" name="image_url" placeholder="Unesi URL slike">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="NazivKluba">Izaberi naziv kluba</label><br>
                        <select id="NazivKluba" name="club_id" class="form-control ">
                            <?php foreach ($clubs as $c) { ?>
                                <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <br>
            <input type="submit" class="btn btn-primary" name="action" value="Unesi">
        </form> <br><a href="../view/Igraci.php"><button class="btn btn-primary">Nazad</button></a>
    </div>
</main>
<?php include "../partials/footer.php" ?>