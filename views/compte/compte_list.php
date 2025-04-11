<?php require_once __DIR__ . '/../templates/header.php'; ?>

<link rel="stylesheet" href="/public/css/style.css">
<hr>

<h2 class="page-title">Liste des comptes</h2>

<table class="table table-striped table-bordered table-hover">
    <thead class="table-header">
        <tr>
            <th>ID</th>
            <th>RIB</th>
            <th>Type de compte</th>
            <th>Solde</th>
            <th>client</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comptes as $compte): ?>
        <tr>
            <td><?= $compte->getCompte_id(); ?></td>
            <td><a href="?action=compte_view&compte_id=<?= $compte->getCompte_id() ?>"><?= htmlspecialchars($compte->getRib()); ?></a></td>
            <td><?= htmlspecialchars($compte->getType_compte()); ?></td>
            <td><?= htmlspecialchars($compte->getSolde_initial()); ?> €</td>
            <td><?= htmlspecialchars($compte->getClient()->getNom()
) ?> <?= htmlspecialchars($compte->getClient()->getPrenom()) ?></td>

            <td class="action-buttons">
                <a href="?action=compte_view&compte_id=<?= $compte->getCompte_id() ?>" class="btn btn-primary btn-sm">Voir dossier</a>
                <a href="?action=compte_edit&compte_id=<?= $compte->getCompte_id() ?>" class="btn btn-warning btn-sm">Modifier</a>
                <a onclick="return confirm('T’es sûr de vouloir supprimer ce compte ?');" href="?action=compte_delete&compte_id=<?= $compte->getCompte_id() ?>" class="btn btn-danger btn-sm">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
