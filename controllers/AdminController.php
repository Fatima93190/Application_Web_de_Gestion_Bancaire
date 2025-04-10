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

    public function doLogin(){
        $admin_email = filter_input(INPUT_POST, 'admin_email');
        $admin_password = filter_input(INPUT_POST, 'admin_password');

        $admin = $this->adminRepository->getAdminByEMAIL($admin_email);

        if(!$admin){
        header('Location: ?');
        exit;
        }

        if($admin && password_verify($admin_password, $admin->getAdmin_password())){
            $_SESSION['admin_id'] = $admin->getAdmin_id();
 
            header('Location: ?');
            exit;
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function logout()  {
        session_destroy();
        header('Location: ?');
        exit;
    }
}