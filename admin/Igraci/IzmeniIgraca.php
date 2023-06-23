

<?php


include_once '../partials/Zastita.php';


?>


<?php
require_once 'DAO.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$msg = isset($msg) ? $msg : "";
$dao = new DAO();
$player = $dao->getPlayerById($id);
?>
<?php include "../partials/header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br>
    <h2 style="text-align: center;">Forma za izmenu igrača</h2>
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
                        <input type="text" name="name" class="form-control" value="<?= $player['name'] ?>">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Broj izgubljenih mečeva</label>
                        <input type="number" name="matches_lost" class="form-control" value="<?= $player['matches_lost'] ?>">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Broj dobijenih mečeva</label>
                        <input type="number" name="matches_won" class="form-control" value="<?= $player['matches_won'] ?>">
                    </div>

                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Prezime igrača</label>
                        <input type="text" name="surname" class="form-control" value="<?= $player['surname'] ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Pol igrača</label>
                        <input type="text" name="gender" class="form-control" value="<?= $player['gender'] ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="formURL">Unesi sliku</label>
                        <input class="form-control" type="url" name="image_url" value="<?= $player['image_url'] ?>">
                    </div>
                    <div class="form-group">
                        <br>
                        <label for="formGroupInput">Id kluba</label>
                        <input type="number" name="club_id" class="form-control" value="<?= $player['club_id'] ?>">
                    </div>
                    <div class="form-group">
                        <br>
                        <input type="hidden" name="id" class="form-control" value="<?= $player['id'] ?>">
                    </div>
                </div>
            </div>

            <br>
            <input type="submit" class="btn btn-primary" name="action" value="Izmeni">
        </form><br>
        <a href="../view/Igraci.php"><button class="btn btn-primary">Nazad</button></a>
    </div>
</main>
<?php include "../partials/footer.php" ?>