

<?php


$msg = isset($msg) ? $msg : "";+

require_once '../Tereni/ControllerTeren.php';

$cs = new ControllerTeren();
$clubs=$cs->GetClubNames();



?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br>
    <h2 style="text-align: center;">Forma za unos terena</h2>
    <br>
    <div class="container">
        <form action="../Tereni/" method="post">
            <div class="row">
                <?php if (!empty($msg)) { ?>
                    <div class="alert alert-success">
                        <?= $msg; ?>
                    </div>
                <?php } ?>
                <div class="col">

                <div class="form-group">
                        <br>
                        <label for="formGroupInput">ID</label>
                        <input type="text" name="idTerena" class="form-control" placeholder="Unesi ID">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Tip</label>
                        <input type="text" name="tip" class="form-control" placeholder="Unesi tip terena">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Slika</label>
                        <input type="text" name="image_url" class="form-control" placeholder="Unesi sliku terena">
                    </div>

            
                </div>
                
                <div class="col">
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Deskripcija</label>
                        <input type="textarea" name="description" class="form-control" placeholder="Unesi Deskripciju">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="NazivKluba">Izaberi naziv kluba</label><br>
                        <select id="NazivKluba" name="clubVal" class="form-control ">
                            <?php foreach ($clubs as $c) { ?>
                                <option value="<?= $c['id']?>"><?= $c['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <br>
            <input type="submit" class="btn btn-primary" name="action" value="Unesi">
        </form> <br><a href="../Pocetna/?action=Teren"><button class="btn btn-primary">Nazad</button></a>
    </div>
</main>
<?php include "../partials/footer.php" ?>