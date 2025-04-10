<?php
require_once __DIR__ .'/../Admin.php';

class AdminRepository{
    public DatabaseConnection $connection;

    public function __construct(){
        $this->connection = new DatabaseConnection();
    }
    public function getAdminByEMAIL(string $admin_email): ?Admin{
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM administrateur WHERE admin_email=:admin_email');
        $statement->execute(['admin_email'=>$admin_email]);
        $result = $statement->fetch();
        if(!$result){
            return null;
        }
        $admin = new Admin;

        $admin->setAdmin_id($result['admin_id']);
        $admin->setAdmin_email($result['admin_email']);
        $admin->setAdmin_password($result['admin_password']);
        return $admin;
    }
}