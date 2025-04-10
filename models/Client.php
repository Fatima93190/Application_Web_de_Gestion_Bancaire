<?php
require_once __DIR__ .'/../lib/database.php';

class Client{

    private int $client_id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $telephone;
    private string $adresse;
    private DateTime $client_createdAt;
    private DateTime $client_updatedAt;

    public function getClient_id(): int{
        return $this->client_id;
    }

    public function getNom(): string{
        return $this->nom;
    }
    
    public function getPrenom(): string{
        return $this->prenom;
    }
    public function getEmail(): string{
        return $this->email;
    }
    
    public function getTelephone(): string{
        return $this->telephone;
    }
    public function getAdresse(): string{
        return $this->adresse;
    }

    public function getClient_createdAt(): string{
        return $this->client_createdAt->format('Y-m-d H:i:s');
    }
    
    public function getClient_updatedAt(): string{
        return $this->client_updatedAt->format('Y-m-d H:i:s');
    }
    
    public function setClient_id(int $client_id): void{
        $this->client_id = $client_id;
    }

    public function setNom(string $nom): void{
        $this->nom = htmlspecialchars($nom);
    }
    
    public function setPrenom(string $prenom): void{
        $this->prenom = htmlspecialchars($prenom);
    }
    public function setEmail(string $email): void{
        $this->email = htmlspecialchars($email);
    }
    
    public function setTelephone(string $telephone): void{
        $this->telephone = htmlspecialchars($telephone);
    }
    public function setAdresse(?string $adresse): void{
        $this->adresse = htmlspecialchars($adresse);
    }

    public function setClient_createdAt(DateTime $client_createdAt): void{
        $this->client_createdAt = $client_createdAt;
    }
    
    public function setClient_updatedAt(DateTime $client_updatedAt): void{
        $this->client_updatedAt = $client_updatedAt;
    }
}