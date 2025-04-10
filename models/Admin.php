<?php
require_once __DIR__ .'/../lib/database.php';
class Admin{

    private int $admin_id;
    private string $admin_email;
    private string $admin_password;
    private DateTime $admin_createdAt;
    private DateTime $admin_updatedAt;

    // public function __construct($admin_id, $admin_email, $admin_password,){
    //     $this->setAdmin_id($admin_id);
    //     $this->setAdmin_email($admin_email);
    //     $this->setAdmin_password($admin_password);
    // }

    public function getAdmin_id(): int{
        return $this->admin_id;
    }

    public function getAdmin_email(): string{
        return $this->admin_email;
    }
    
    public function getAdmin_password(): string{
        return $this->admin_password;
    }

    public function getAdmin_createdAt(): DateTime{
        return $this->admin_createdAt;
    }

    public function getAdmin_updatedAt(): DateTime{
        return $this->admin_updatedAt;
    }
    
    public function setAdmin_id(int $admin_id): void{
        $this->admin_id = $admin_id;
    }

    public function setAdmin_email(string $admin_email): void{
        $this->admin_email = htmlspecialchars($admin_email);
    }
    
    public function setAdmin_password(string $admin_password): void{
        $this->admin_password = htmlspecialchars($admin_password);
    }

    public function setAdmin_createdAt(DateTime $admin_createdAt): void{
        $this->admin_createdAt = $admin_createdAt;
    }

    public function setAdmin_updatedAt(DateTime $admin_updatedAt): void{
        $this->admin_updatedAt = $admin_updatedAt;
    }
}