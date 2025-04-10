function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}

function isValidPhone(phone) {
    // Validation pour numéro français (ex: 0612345678 ou +33612345678)
    const phonePattern = /^(?:(?:\+|00)33|0)[1-9]\d{8}$/;
    return phonePattern.test(phone);
}

function validateForm(formId) {
    let form = document.getElementById(formId);
    let isValid = true;

    // Récupérer les champs et les messages d'erreur
    let nom = form.nom.value.trim();
    let prenom = form.prenom.value.trim();
    let email = form.email.value.trim();
    let phone = form.telephone.value.trim();

    // Réinitialiser les messages d'erreur
    document.getElementById('err_nom').textContent = '';
    document.getElementById('err_prenom').textContent = '';
    document.getElementById('err_email').textContent = '';
    document.getElementById('err_phone').textContent = '';

    // Validation du nom (obligatoire)
    if (nom === '') {
        document.getElementById('err_nom').textContent = 'Le nom est obligatoire';
        isValid = false;
    }

    // Validation du prénom (obligatoire)
    if (prenom === '') {
        document.getElementById('err_prenom').textContent = 'Le prénom est obligatoire';
        isValid = false;
    }

    // Validation de l'email
    if (email === '') {
        document.getElementById('err_email').textContent = 'L\'email est obligatoire';
        isValid = false;
    } else if (!isValidEmail(email)) {
        document.getElementById('err_email').textContent = 'Format d\'email invalide';
        isValid = false;
    }

    // Validation du téléphone
    if (phone === '') {
        document.getElementById('err_phone').textContent = 'Le téléphone est obligatoire';
        isValid = false;
    } else if (!isValidPhone(phone)) {
        document.getElementById('err_phone').textContent = 'Format de téléphone invalide (ex: 0612345678)';
        isValid = false;
    }

    return isValid;
}