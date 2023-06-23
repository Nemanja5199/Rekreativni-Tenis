<?php

require_once '../Klubovi/controllerClub.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$msg = isset($msg) ? $msg : "";

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';


$cs = new controllerClub();

$clubs = $cs->GetClubByid($id);



?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br>
    <h2 style="text-align: center;">Forma za editovanje Kluba</h2>
    <br>
    <div class="container">
        <form action="../Klubovi/" method="post">
            <div class="row">
                <?php if (!empty($msg)) { ?>
                    <div class="alert alert-success">
                        <?= $msg; ?>
                    </div>
                <?php } ?>
                <div class="col">
                    <?php foreach ($clubs as $c) { ?>
                        <div class="form-group">
                            <br>
                            <label for="formGroupInput">ID</label>
                            <input type="text" name="id" class="form-control" value="<?= $c['id'] ?> " readonly="readonly">
                        </div>


                        <div class="form-group">
                            <br>
                            <label for="formGroupInput">Naziv</label>
                            <input type="text" name="name" class="form-control" value="<?= $c['name'] ?>">
                        </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Slika</label>
                        <input type="text" name="image_url" class="form-control" value="<?= $c['image_url'] ?>">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Deskripcija</label>
                        <input type="textarea" name="description" class="form-control" value="<?= $c['description'] ?>">
                    </div>
                </div>
            </div>
        <?php } ?>
        <br>
        <input type="submit" class="btn btn-primary" name="action" value="Edit">
        </form> <br><a href="../Pocetna/?action=Klubovi"><button class="btn btn-primary">Nazad</button></a>
    </div>

</main>
<?php include "../partials/footer.php" ?>