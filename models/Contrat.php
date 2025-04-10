<?php
require_once __DIR__ .'/../lib/database.php';
require_once __DIR__ . '/Client.php';

class Contrat{

    private int $contrat_id;
    private string $type_contrat;
    private float $montant;
    private int $duree;
    private DateTime $contrat_createdAt;
    private DateTime $contrat_updatedAt;
    private int $client_id;
    private Client $client;


    public function getContrat_id(): int{
        return $this->contrat_id;
    }
    
    public function getType_contrat(): string{
        return $this->type_contrat;
    }
    public function getMontant(): float{
        return $this->montant;
    }
    public function getDuree(): int{
        return $this->duree;
    }

    public function getContrat_createdAt(): string{
        return $this->contrat_createdAt->format('Y-m-d H:i:s');
    }

    public function getContrat_updatedAt(): string{
        return $this->contrat_updatedAt->format('Y-m-d H:i:s');
    }
    public function getClient_id(): int{
        return $this->client_id;
    }
    
    public function getClient(): ?Client {
        return $this->client;
    }
    
    public function setContrat_id(int $contrat_id): void{
        $this->contrat_id = $contrat_id;
    }
    
    public function setType_contrat(string $type_contrat): void{
        $this->type_contrat = htmlspecialchars($type_contrat);
    }

    public function setMontant(float $montant): void{
        if (!is_numeric($montant)) {
            throw new InvalidArgumentException("Le solde initial doit être un nombre positif.");
        }
        $this->montant = $montant;
    }
    public function setDuree(int $duree): void{
        if (!is_numeric($duree) || $duree < 0) {
            throw new InvalidArgumentException("Le solde initial doit être un nombre positif.");
        }
        $this->duree = $duree;
    }

    public function setContrat_createdAt(DateTime $contrat_createdAt): void{
        $this->contrat_createdAt = $contrat_createdAt;
    }

    public function setContrat_updatedAt(DateTime $contrat_updatedAt): void{
        $this->contrat_updatedAt = $contrat_updatedAt;
    }
    public function setClient_id(int $client_id): void{
        $this->client_id = $client_id;
    }
    public function setClient(Client $client): void {
        $this->client = $client;
    }
}