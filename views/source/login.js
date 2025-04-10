document.getElementById('form').addEventListener('submit', (e) => {
    e.preventDefault();
    validateForm();
});

function validateForm() {
    let email = document.getElementById('mail').value;
    let password = document.getElementById('pass').value;

    let errorMail = document.getElementById('err_mail');
    let errorPass = document.getElementById('err_pass');

    let isValid = true;
    errorMail.innerHTML = "";
    errorPass.innerHTML = "";

    // Vérification de l'email
    if (email === "") {
        errorMail.innerHTML = "You forgot to fill in your email.";
        isValid = false;
    } else if (!isValidEmail(email)) {
        errorMail.innerHTML = "Your email is not valid.";
        isValid = false;
    }

    // Vérification du mot de passe
    if (password === "") {
        errorPass.innerText = "You forgot to fill in your password.";
        isValid = false;
    }

    // Si tout est valide, soumettre le formulaire
    if (isValid) {
        document.getElementById('form').submit();
    }
}

// Fonction de validation de l'email
function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}