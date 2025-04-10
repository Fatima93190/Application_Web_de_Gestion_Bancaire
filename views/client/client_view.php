<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">information de client</h2>

<p><strong>Nom : </strong> <?= $client->getNom() ?></p>
<p><strong>Prenom : </strong> <?= $client->getPrenom() ?></p>
<p><strong>Email : </strong> <?= $client->getEmail() ?></p>
<p><strong>Telephone : </strong> <?= $client->getTelephone() ?></p>
<p><strong>Adresse : </strong> <?= $client->getAdresse() ?></p>
<p><strong>Créée le : </strong> <?= $client->getClient_createdAt() ?></p>
<p><strong>Dernière mise à jour : </strong> <?= $client->getClient_updatedAt() ?></p>

<p><strong>Résumé des comptes</strong></p>
    <?php if (!empty($comptesParType)): ?>
        <ul>
            <?php foreach ($comptesParType as $compte): ?>
                <li><?= $compte['count'] ?> compte(s) de type <?= htmlspecialchars($compte['Type_compte']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Ce client n’a aucun compte enregistré.</p>
    <?php endif; ?>

<p><strong>Résumé des contrats</strong></p>
    <?php if (!empty($contratsParType)): ?>
        <ul>
            <?php foreach ($contratsParType as $contrat): ?>
                <li><?= $contrat['count'] ?> contrat(s) de type <?= htmlspecialchars($contrat['type_contrat']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Ce client n’a aucun contrat enregistré.</p>
    <?php endif; ?>
<a href="?action=client_edit&client_id=<?= $client->getClient_id() ?>" class="btn btn-warning">Modifier les information</a>
<a href="?" class="btn btn-secondary">Retour à l'accueil</a>

<?php require_once __DIR__ . '/../templates/footer.php'; 