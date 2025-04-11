
function isValidFloat(value) {
    // Accepte les nombres comme 100, 100.50, 0.5, etc.
    return /^-?\d+(\.\d{1,2})?$/.test(value);
}

function validateForm(formId) {
    let form = document.getElementById(formId);
    let isValid = true;
    console.log("world");

    let solde = form.Solde_initial.value.trim();
    let rib = form.RIB.value.trim();


    document.getElementById('err_solde').textContent = '';
    document.getElementById('err_rib').textContent = '';

    if (rib === '') {
        document.getElementById('err_rib').textContent = 'Le rib est obligatoire';
        isValid = false;
    } 

    if (solde === '') {
        document.getElementById('err_solde').textContent = 'Le solde est obligatoire';
        isValid = false;
    } else if (!isValidFloat(solde)) {
        document.getElementById('err_solde').textContent = 'Le solde doit être un nombre décimal (ex: 100.00)';
        isValid = false;
    }

    return isValid;
}
