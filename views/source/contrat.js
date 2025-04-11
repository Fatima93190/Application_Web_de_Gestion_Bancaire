
function isValidFloat(value) {
    // Accepte les nombres comme 100, 100.50, 0.5, etc.
    return /^-?\d+(\.\d{1,2})?$/.test(value);
}

function validateForm(formId) {
    let form = document.getElementById(formId);
    let isValid = true;

    let montant = form.montant.value.trim();
    let duree = form.duree.value.trim();

    document.getElementById('err_montant').textContent = '';
    document.getElementById('err_duree').textContent = '';

    if (duree === '') {
        document.getElementById('err_duree').textContent = 'La duree est obligatoire';
        isValid = false;
    } else {
        let dureeInt = parseInt(duree);
        if (isNaN(dureeInt)) {
            document.getElementById('err_duree').textContent = 'La durée doit être un nombre entier';
            isValid = false;
        }
    }

    if (montant === '') {
        document.getElementById('err_montant').textContent = 'Le montant est obligatoire';
        isValid = false;
    } else if (!isValidFloat(montant)) {
        document.getElementById('err_montant').textContent = 'Le montant doit être un nombre décimal (ex: 100.00)';
        isValid = false;
    }

    return isValid;
}
