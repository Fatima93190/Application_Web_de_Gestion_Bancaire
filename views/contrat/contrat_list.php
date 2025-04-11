<?php require_once __DIR__ .'/../templates/header.php';?>

<hr>

<h2 class="page-title">Liste des contrats</h2>

<table class="table table-striped table-bordered table-hover">
    <thead class="table-header">
        <tr>
            <th>ID</th>
            <th>Type de contrat</th>
            <th>Montant</th>
            <th>Durée</th>
            <th>client</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($contrats as $contrat): ?>
        <tr>
            <td><?= $contrat->getContrat_id(); ?></td>
            <td><a href="?action=contrat_view&contrat_id=<?= $contrat->getContrat_id() ?>"><?= htmlspecialchars($contrat->getType_contrat()); ?></a></td>
            <td><?= htmlspecialchars($contrat->getMontant()); ?> €</td>
            <td><?= htmlspecialchars($contrat->getDuree()); ?> mois</td>
            <td><?= htmlspecialchars($contrat->getClient()->getNom()
) ?> <?= htmlspecialchars($contrat->getClient()->getPrenom()) ?></td>
            <td class="action-buttons">
                <a href="?action=contrat_view&contrat_id=<?= $contrat->getContrat_id() ?>" class="btn btn-primary btn-sm">Voir dossier</a>
                <a href="?action=contrat_edit&contrat_id=<?= $contrat->getContrat_id() ?>" class="btn btn-warning btn-sm">Modifier</a>
                <a onclick="return confirm('T’es sûr de vouloir supprimer le contrat?');" href="?action=contrat_delete&contrat_id=<?= $contrat->getContrat_id() ?>" class="btn btn-danger btn-sm">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>