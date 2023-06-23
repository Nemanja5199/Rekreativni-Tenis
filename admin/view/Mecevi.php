<?php
$msg = isset($msg) ? $msg : "";
?>





<?php

require_once '../mecevi/controllerMecevi.php';
$action = isset($_GET['action']) ? $_GET['action'] : '';

$cm = new controllerMecevi();

$mecevi = $cm->GetMecevi();

?>


<?php include_once '../partials/header.php' ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-1">
    <br><br>
    <h2 style="text-align: center;">Lista mečeva</h2>

    <br><br>
    <a href="../mecevi/InsertMec.php"><button class="btn btn-primary">Unesi novi meč</button></a><br><br>

    <?php if (!empty($msg)) { ?>
        <div class="alert alert-success">
            <?= $msg; ?>
        </div>
    <?php } ?><br>
    <table style="text-align: center;" class="table table-bordered align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Datum</th>
                <th scope="col">Vreme</th>
                <th scope="col">Tip meca</th>
                <th scope="col">Pobednik</th>
                <th scope="col">Teren</th>
                <th scope="col">Igrac 1</th>
                <th scope="col">Igrac 2</th>
                <th scope="col">Status meca</th>
                <th scope="col">Rezultat</th>
                <th scope="col">Kategorija</th>
                <th scope="col">OPCIJE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mecevi as $m) { ?>
                <tr>
                    <th scope="row"><?= $m['id'] ?></th>
                    <td><?= $m['match_date'] ?></td>
                    <td><?= $m['match_time'] ?></td>
                    <td><?= $m['match_type'] ?></td>
                    <td><?= $m['winner'] ?></td>
                    <td><?= $m['type'] ?></td>
                    <td><?= $m['ime1'] . ' ' . $m['prezime1'] ?></td>
                    <td><?= $m['ime2'] . ' ' . $m['prezime2']  ?></td>
                    <td><?= $m['status'] ?></td>
                    <td><?= $m['rezultat'] ?></td>
                    <td><?= $m['kat'] ?></td>

                    <td class="w-25">
                        <a href="../mecevi/indexMec.php?action=Izmeni&id=<?= $m['id'] ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                        <a href="../mecevi/indexMec.php?action=Izbrisi&id=<?= $m['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>


<?php include_once '../partials/footer.php' ?>