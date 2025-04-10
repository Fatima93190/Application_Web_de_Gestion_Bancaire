<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h2 class="mb-4">Modifier les informations du client</h2>

<form action="?action=client_update" method="POST" id="formul">
    <input type="hidden" name="client_id" value="<?= $client->getClient_id() ?>">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom :</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $client->getNom() ?>">
    </div>
    <div id="err_nom" style="color: red;"></div><br>
    
    <div class="mb-3">
        <label for="prenom" class="form-label">Prénom :</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $client->getPrenom() ?>">
    </div>
    <div id="err_prenom" style="color: red;"></div><br>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email :</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $client->getEmail() ?>">
    </div>
    <div id="err_email" style="color: red;"></div><br>
    
    <div class="mb-3">
        <label for="telephone" class="form-label">Téléphone :</label>
        <input type="text" class="form-control" id="telephone" name="telephone" value="<?= $client->getTelephone() ?>">
    </div>
    <div id="err_phone" style="color: red;"></div><br>
    
    <div class="mb-3">
        <label for="adresse" class="form-label">Adresse :</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $client->getAdresse() ?>">
    </div>
    
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<a href="?action=client_list" class="btn btn-secondary">Retour à la liste</a>

<script src="/Application_Web_de_Gestion_Bancaire/views/source/client.js"></script>
<script>
    document.getElementById('formul').addEventListener('submit', function(e) {
        if (!validateForm('formul')) {
            e.preventDefault(); // Bloque la soumission si validation échoue
            return false;
        }
        return true; // Autorise la soumission si tout est valide
    });
</script>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>