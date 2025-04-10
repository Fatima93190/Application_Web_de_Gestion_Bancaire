<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des comptes bancaires</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Application_Web_de_Gestion_Bancaire/views/source/style.css">
</head>
<body>
    <div class="sidebar" role="navigation" aria-label="Menu principal">
        <h1>
            <a href="?">Gestions des comptes</a>
        </h1>
        <nav class="mt-4">
            <ul class="nav flex-column">
                <li class="nav-item"><a href="?action=index" class="nav-link" aria-current="page">Accueil</a></li>
                <li class="nav-item"><a href="?action=client_list" class="nav-link">gestion des clients</a></li>
                <li class="nav-item"><a href="?action=compte_list" class="nav-link">gestion de comptes</a></li>
                <li class="nav-item"><a href="?action=contrat_list" class="nav-link">gestion de contrats</a></li>
                <li class="nav-item"><a href="?action=client_create" class="nav-link">Nouveau Client</a></li>
                <li class="nav-item"><a href="?action=compte_create" class="nav-link">Nouveau Compte</a></li>
                <li class="nav-item"><a href="?action=contrat_create" class="nav-link">Nouveau Contrat</a></li>
                <?php if(isset($_SESSION['admin_id'])): ?>
                    <li class="nav-item"><a href="?action=logout" class="nav-link">Se déconnecter</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="?action=login" class="nav-link">Se connecter</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <div class="main-content">
