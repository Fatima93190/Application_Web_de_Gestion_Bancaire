<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">Ajouter un nouveau compte</h2>

<form action="?action=compte_store" method="POST">
    <div class="mb-3">
        <label for="client_id" class="form-label">Client :</label>
        <select class="form-control" name="client_id" id="client_id">
            <option value="-">- Sélectionnez le client</option>
        <?php foreach ($clients as $client): ?>
            <option value="<?= $client->getClient_id() ?>"><?= $client->getNom() ?> <?= $client->getPrenom() ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="RIB" class="form-label">RIB :</label>
        <input type="text" class="form-control" id="RIB" name="RIB" required>
    </div>
    <div class="mb-3">
        <label for="Type_compte" class="form-label">Type de compte :</label>
        <select class="form-control" name="Type_compte" id="Type_compte">
            <option value="Compte_courant">Compte courant</option>
            <option value="Compte_épargne">Compte épargne</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="Solde_initial" class="form-label">Solde :</label>
        <input type="text" class="form-control" id="Solde_initial" name="Solde_initial" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?action=compte_list" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 