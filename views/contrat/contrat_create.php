<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">Ajouter un nouveau contrat</h2>

<form action="?action=contrat_store" method="POST">
    <div class="mb-3">
        <label for="client_id" class="form-label">Client :</label>
        <select class="form-control" name="client_id" id="client_id">
            <option value="" disabled selected hidden>- Sélectionnez le client</option>
        <?php foreach ($clients as $client): ?>
            <option value="<?= $client->getClient_id() ?>"><?= $client->getNom() ?> <?= $client->getPrenom() ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="type_contrat" class="form-label">Type de contrat :</label>
        <select class="form-control" name="type_contrat" id="type_contrat">
            <option value="Assurance_Vie">Assurance Vie</option>
            <option value="Assurance_Habitation">Assurance Habitation</option>
            <option value="Crédit_Immobilier">Crédit Immobilier</option>
            <option value="Crédit_à_la_Consommation">Crédit à la Consommation</option>
            <option value="Compte_Épargne_Logement_(CEL)">Compte Épargne Logement (CEL)</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="montant" class="form-label">Montant :</label>
        <input type="text" class="form-control" id="montant" name="montant" required>
    </div>
    <div class="mb-3">
        <label for="duree" class="form-label">Duree :</label>
        <input type="text" class="form-control" id="duree" name="duree" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?action=contrat_list" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 