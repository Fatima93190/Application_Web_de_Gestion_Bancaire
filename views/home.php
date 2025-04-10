<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container_cartes">
    <div class="carte">
        <h2>Nombre de clients :</h2>
        <p><?= $nbrTotalClients ?></p>
    </div>
    <div class="carte">
        <h2>Nombre de comptes :</h2>
        <p> <?= $nbrTotalComptes ?></p>
    </div>
    <div class="carte">
        <h2>Nombre de contrats :</h2>
        <p><?= $nbrTotalContrats ?></p>
    </div>
</div>


<?php require_once __DIR__ . '/templates/footer.php';
