<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">information du contrat</h2>

<h3>le contrat est signée par : <?= $client->getNom() ?> <?= $client->getPrenom() ?></h3>

<a href="?action=client_view&client_id=<?= $client->getClient_id() ?>">Voir le client</a>

<p><strong>Type de contrat : </strong> <?= $contrat->getType_contrat() ?></p>
<p><strong>le montant : </strong> <?= $contrat->getMontant() ?></p>
<p><strong>le duree : </strong> <?= $contrat->getDuree() ?></p>
<p><strong>Crée le : </strong> <?= $contrat->getContrat_createdAt() ?></p>
<p><strong>Dernière mise à jour : </strong> <?= $contrat->getContrat_updatedAt() ?></p>

<a href="?action=contrat_edit&contrat_id=<?= $contrat->getContrat_id() ?>" class="btn btn-warning">Modifier les information</a>
<a href="?" class="btn btn-secondary">Retour à l'accueil</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 