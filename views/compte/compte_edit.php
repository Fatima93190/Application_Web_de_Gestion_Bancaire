<?php require_once __DIR__ . '/../templates/header.php'; ?>
<?php
foreach ($clients as $c) {
    if ($c->getClient_id() === $compte->getClient_id()) {
        $client = $c;
        break;
    }
}?>

<h2 class="mb-4">Modifier les informations</h2>

<form action="?action=compte_update" method="POST">
    <input type="hidden" name="compte_id" value="<?= $compte->getCompte_id() ?>">
    <div class="mb-3">
        <label class="form-label">Client :</label>
        <p class="form-control-plaintext"><?= $client->getNom() ?> <?= $client->getPrenom() ?></p>
        <input type="hidden" name="client_id" value="<?= htmlspecialchars($client->getClient_id()) ?>">
    </div>
    <div class="mb-3">
        <label for="RIB" class="form-label">RIB :</label>
        <input type="text" class="form-control" id="RIB" name="RIB" value="<?= htmlspecialchars($compte->getRib()) ?>" readonly>
        </div>
    <div class="mb-3">
        <label for="Type_compte" class="form-label">Type de compte :</label>
        <select class="form-control" name="Type_compte" id="Type_compte">
            <option value="Compte_courant" <?= $compte->getType_compte() === 'Compte_courant' ? 'selected' : '' ?>>Compte courant</option>
            <option value="Compte_épargne" <?= $compte->getType_compte() === 'Compte_épargne' ? 'selected' : '' ?>>Compte épargne</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="Solde_initial" class="form-label">Solde :</label>
        <input type="text" class="form-control" id="Solde_initial" name="Solde_initial" value="<?= htmlspecialchars($compte->getSolde_initial()) ?>" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>


<a href="?action=compte_list" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 
