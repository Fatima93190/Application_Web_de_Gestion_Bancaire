<?php require_once __DIR__ . '/../templates/header.php'; ?>
<?php
foreach ($clients as $c) {
    if ($c->getClient_id() === $contrat->getClient_id()) {
        $client = $c;
        break;
    }
}?>

<h2 class="mb-4">Modifier les information de contrat</h2>


<form action="?action=contrat_update" method="POST" id="contratForm">
    <input type="hidden" name="contrat_id" value="<?= $contrat->getContrat_id() ?>">
    <div class="mb-3">
        <label class="form-label">Client :</label>
        <p class="form-control-plaintext"><?= $client->getNom() ?> <?= $client->getPrenom() ?></p>
        <input type="hidden" name="client_id" value="<?= htmlspecialchars($client->getClient_id()) ?>">
    </div>
    <div class="mb-3">
        <label for="type_contrat" class="form-label">Type de contrat :</label>
        <input type="text" class="form-control" id="type_contrat" name="type_contrat" value="<?= $contrat->getType_contrat() ?>" readonly>
    </div>

    <div class="mb-3">
    <label for="montant" class="form-label">Montant :</label>
    <input type="text" class="form-control" id="montant" name="montant" value="<?= $contrat->getMontant() ?>" required>
    <div id="err_montant" style="color: red;"></div>
</div>

    <div class="mb-3">
        <label for="duree" class="form-label">Duree :</label>
        <input type="text" class="form-control" id="duree" name="duree" value="<?= $contrat->getDuree() ?>" required>
        <div id="err_duree" style="color: red;"></div>
    </div>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>


<a href="?action=contrat_list" class="btn btn-secondary">Retour à la liste</a>

<script src="/Application_Web_de_Gestion_Bancaire/views/source/client.js"></script>
<script>
    document.getElementById('contratForm').addEventListener('submit', (e) => {
        // e.preventDefault();
        if (validateForm('contratForm')) {
            e.target.submit(); // Soumet le formulaire si la validation est réussie
        }
    });
</script>

<?php require_once __DIR__ . '/../templates/footer.php'; 
