<?php require_once __DIR__ . '/../templates/header.php'; ?>

<link rel="stylesheet" href="/public/css/style.css">

<hr>

<h2 class="page-title">Liste des clients</h2>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
         Le client a été supprimé avec succès.
    </div>
<?php elseif (isset($_GET['error'])): ?>
    <div class="alert alert-danger">
         Impossible de supprimer ce client : il possède des comptes ou des contrats associés.
    </div>
<?php endif; ?>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-header">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clients as $client): ?>
        <tr>
            <td><?= $client->getClient_id(); ?></td>
            <td><a href="?action=client_view&client_id=<?= $client->getClient_id() ?>"><?= htmlspecialchars($client->getNom()); ?></a></td>
            <td><?= htmlspecialchars($client->getPrenom()); ?></td>
            <td><?= htmlspecialchars($client->getEmail()); ?></td>
            <td><?= htmlspecialchars($client->getTelephone()); ?></td>
            <td class="action-buttons">
                <a href="?action=client_view&client_id=<?= $client->getClient_id() ?>" class="btn btn-primary btn-sm">Voir</a>
                <a href="?action=client_edit&client_id=<?= $client->getClient_id() ?>" class="btn btn-warning btn-sm">Modifier</a>
                <a onclick="return confirm('Tu es sûr de vouloir supprimer ce client ?');" href="?action=client_delete&client_id=<?= $client->getClient_id() ?>" class="btn btn-danger btn-sm">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
