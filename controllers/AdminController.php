<?php

require_once __DIR__ .'/../models/repositories/AdminRepository.php';
require_once __DIR__ .'/../models/Admin.php';

class AdminController{

    public AdminRepository $adminRepository;

    public function __construct(){
        $this->adminRepository = new AdminRepository();
    }

    public function login(){
        require_once __DIR__ .'/../views/admin/login.php';
    }

    public function doLogin() {
        // Vérifier si la requête est une soumission de formulaire (POST)
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // Si ce n'est pas une soumission de formulaire, on redirige ou on affiche un message
            header('Location: ?action=login&error=unauthorized_access');
            exit;
        }
    
        // Récupérer les valeurs du formulaire
        $admin_email = filter_input(INPUT_POST, 'admin_email');
        $admin_password = filter_input(INPUT_POST, 'admin_password');
    
        // Vérifier si l'email et le mot de passe ont été remplis
        if (empty($admin_email) || empty($admin_password)) {
            // Rediriger avec un message d'erreur si un des champs est vide
            header('Location: ?action=login&error=missing_fields');
            exit;
        }
    
        // Appeler la méthode pour obtenir l'administrateur par email
        $admin = $this->adminRepository->getAdminByEMAIL($admin_email);
    
        // Vérifier si l'admin existe
        if (!$admin) {
            // Rediriger si l'admin n'existe pas avec un message d'erreur
            header('Location: ?action=login&error=invalid_credentials');
            exit;
        }
    
        // Vérifier si le mot de passe est correct
        if ($admin && password_verify($admin_password, $admin->getAdmin_password())) {
            // Authentification réussie
            $_SESSION['admin_id'] = $admin->getAdmin_id();
    
            // Rediriger vers la page d'accueil
            header('Location: ?');
            exit;
        } else {
            // Mot de passe incorrect
            header('Location: ?action=login&error=invalid_credentials');
            exit;
        }
    }
    

    public function logout()  {
        session_destroy();
        header('Location: ?action=login');
        exit;
    }
}