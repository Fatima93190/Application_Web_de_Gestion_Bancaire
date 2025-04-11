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
                <?php if(isset($_SESSION['admin_id'])): ?>
                    <li class="nav-item"><a href="?action=logout" class="nav-link">Se déconnecter</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="?action=login" class="nav-link">Se connecter</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <div class="main-content">
        <!-- Affichage des erreurs si elles existent -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?php
                switch ($_GET['error']) {
                    case 'missing_fields':
                        echo "Tous les champs sont requis.";
                        break;
                    case 'invalid_credentials':
                        echo "Identifiants invalides. Veuillez vérifier votre email et mot de passe.";
                        break;
                    case 'need_login':
                        echo "Vous devez être connecté pour accéder à cette page.";
                        break;
                    default:
                        echo "Erreur inconnue.";
                        break;
                }
                ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire de connexion -->
        <form action="?action=doLogin" method="POST" id="form">
            <div class="form-group">
                <label>Email d'administrateur :</label>
                <input class="form-control" type="text" name="admin_email" id="mail">
            </div>
            <div id="err_mail"></div><br>
            <div class="form-group">
                <label>Mot de passe :</label>
                <input class="form-control" type="password" name="admin_password" id="pass">
            </div>
            <div id="err_pass"></div><br>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Se connecter</button>
            </div>
        </form>

        <script src="/Application_Web_de_Gestion_Bancaire/views/source/login.js"></script>
    </div>

    <script src="/Application_Web_de_Gestion_Bancaire/views/source/login.js"></script>

<?php require_once __DIR__ . '/../templates/footer.php'; 