<?php

if (!session_id()) {
    session_start();
}

if ($_SESSION['user_type'] != 2) {

    header('Location:../');
}


?>


<?php
require_once 'controllerMecevi.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$msg = isset($msg) ? $msg : "";
$cm = new controllerMecevi();
$tereni = $cm->getTereni();
$igraci = $cm->getIgraci();
$status = $cm->GetStatus();
$kategorija = $cm->GetKategorija();
?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br>
    <h2 style="text-align: center;">Forma za unos meča</h2>
    <br>
    <div class="container">
        <form action="indexMec.php" method="post">
            <div class="row">
                <?php if (!empty($msg)) { ?>
                    <div class="alert alert-success">
                        <?= $msg; ?>
                    </div>
                <?php } ?>
                <div class="col">

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Datum</label>
                        <input type="text" name="match_date" class="form-control" placeholder="Datum meča u formatu YYYY-MM-DD">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Vreme</label>
                        <input type="text" name="match_time" class="form-control" placeholder="Unesi vreme meča">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Tip</label>
                        <input type="text" name="match_type" class="form-control" placeholder="Unesi tip meča">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Pobednik</label>
                        <input type="text" name="winner" class="form-control" placeholder="Unesi pobednika na meču">
                    </div>
                    <div class="form-group">
                        <br>
                        <label for="ImeTerena">Izaberi teren</label><br>
                        <select id="ImeTerena" name="court_id" class="form-control ">
                            <?php foreach ($tereni as $t) { ?>
                                <option value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                            <?php } ?>
                        </select>
                    </div><br>
                </div>
                <div class="col">


                    <div class="form-group">
                        <br>
                        <label for="ImeIgraca1">Izaberi prvog igrača</label><br>
                        <select id="ImeIgraca1" name="player1_id" class="form-control ">
                            <?php foreach ($igraci as $i) { ?>
                                <option value="<?= $i['id'] ?>"><?= $i['name'] . ' ' . $i['surname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <br>

                    <div class="form-group">
                        <br>
                        <label for="ImeIgraca2">Izaberi drugog igrača</label><br>
                        <select id="ImeIgraca2" name="player2_id" class="form-control ">
                            <?php foreach ($igraci as $i) { ?>
                                <option value="<?= $i['id'] ?>"><?= $i['name'] . ' ' . $i['surname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="statusM">Status meča</label>
                        <select id="statusM" name="match_status" class="form-control ">
                            <?php foreach ($status as $s) { ?>
                                <option value="<?= $s['id'] ?>"><?= $s['status'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="formGroupInput">Rezultat</label>
                        <input type="text" name="rezultat" class="form-control" placeholder="Unesi rezultat ako je meč odigran">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="categoryM">Kategorija</label>
                        <select id="categoryM" name="category" class="form-control ">
                            <?php foreach ($kategorija as $k) { ?>
                                <option value="<?= $k['id'] ?>"><?= $k['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <br>
                </div>

                <br>
                <input type="submit" class="btn btn-primary" name="action" value="Unesi">
        </form>
    </div>
</main>
<?php include "../partials/footer.php" ?>