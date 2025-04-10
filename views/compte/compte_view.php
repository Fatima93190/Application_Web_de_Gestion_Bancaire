<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">information du compte</h2>

<h3>Le compte appartient à : <?= $client->getNom() ?> <?= $client->getPrenom() ?></h3>

<a href="?action=client_view&client_id=<?= $client->getClient_id() ?>">Voir le client</a>

<p><strong>RIB : </strong> <?= $compte->getRib() ?></p>
<p><strong>Type de compte : </strong> <?= $compte->getType_compte() ?></p>
<p><strong>le solde : </strong> <?= $compte->getSolde_initial() ?></p>
<p><strong>Crée le : </strong> <?= $compte->getCompte_createdAt() ?></p>
<p><strong>Dernière mise à jour : </strong> <?= $compte->getCompte_updatedAt() ?></p>

<a href="?action=compte_edit&compte_id=<?= $compte->getCompte_id() ?>" class="btn btn-warning">Modifier les information</a>
<a href="?" class="btn btn-secondary">Retour à l'accueil</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 