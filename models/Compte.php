<?php
require_once __DIR__ .'/../lib/database.php';
require_once __DIR__ . '/Client.php';


class Compte{

    private int $compte_id;
    private string $RIB;
    private string $Type_compte;
    private float $Solde_initial;
    private DateTime $compte_createdAt;
    private DateTime $compte_updatedAt;
    private int $client_id;
    private Client $client;


    public function getCompte_id(): int{
        return $this->compte_id;
    }

    public function getRib(): string{
        return $this->RIB;
    }
    
    public function getType_compte(): string{
        return $this->Type_compte;
    }
    public function getSolde_initial(): float{
        return $this->Solde_initial;
    }

    public function getClient(): ?Client {
        return $this->client;
    }

    public function getCompte_createdAt(): string{
        return $this->compte_createdAt->format('Y-m-d H:i:s');
    }

    public function getCompte_updatedAt(): string{
        return $this->compte_updatedAt->format('Y-m-d H:i:s');
    }

    public function getClient_id(): int{
        return $this->client_id;
    }
    
    public function setCompte_id(int $compte_id): void{
        $this->compte_id = $compte_id;
    }

    public function setRib(string $RIB): void{
        $this->RIB = htmlspecialchars($RIB);
    }
    
    public function setType_compte(string $Type_compte): void{
        $this->Type_compte = htmlspecialchars($Type_compte);
    }

    public function setSolde_initial(float $Solde_initial): void{
        if (!is_numeric($Solde_initial) || $Solde_initial < 0) {
            throw new InvalidArgumentException("Le solde initial doit être un nombre positif.");
        }
        $this->Solde_initial = $Solde_initial;
    }

    public function setClient(Client $client): void {
        $this->client = $client;
    }

    public function setCompte_createdAt(DateTime $compte_createdAt): void{
        $this->compte_createdAt = $compte_createdAt;
    }

    public function setCompte_updatedAt(DateTime $compte_updatedAt): void{
        $this->compte_updatedAt = $compte_updatedAt;
    }
    public function setClient_id(int $client_id): void{
        $this->client_id = $client_id;
    }
}