

<?php

$action = isset($_GET['action']) ? $_GET['action'] : '';
$msg = isset($msg) ? $msg : "";


?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br>
    <h2 style="text-align: center;">Forma za unos Kluba</h2>
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
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Naziv</label>
                        <input type="text" name="name" class="form-control" placeholder="Unesi naziv kluba">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Slika</label>
                        <input type="text" name="image_url" class="form-control" placeholder="Unesi sliku kluba">
                    </div>

            
                </div>
                
                <div class="col">
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Deskripcija</label>
                        <input type="textarea" name="description" class="form-control" placeholder="Unesi Deskripciju">
                    </div>
                </div>
            </div>

            <br>
            <input type="submit" class="btn btn-primary" name="action" value="Unesi">
        </form> <br><a href="../Pocetna/?action=Klubovi"><button class="btn btn-primary">Nazad</button></a>
    </div>
</main>
<?php include "../partials/footer.php" ?>