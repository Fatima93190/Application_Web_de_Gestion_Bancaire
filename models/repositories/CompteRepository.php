<?php
require_once __DIR__ .'/../Compte.php';
require_once __DIR__ . '/../../lib/database.php';
class CompteRepository{

    public DatabaseConnection $connection;
    public ClientRepository $clientRepository;


    public function __construct(){
        $this->connection = new DatabaseConnection();
        $this->clientRepository = new ClientRepository();

    }

    public function getComptes(): array{
        $statement= $this->connection->getConnection()->prepare('SELECT * FROM compte_bancaire');
        $statement->execute();
        $comptes = [];

        foreach ($statement as $row) {
            $compte = new Compte;
            $compte->setCompte_Id($row['compte_id']);
            $compte->setRib($row['RIB']);
            $compte->setType_compte($row['Type_compte']);
            $compte->setSolde_initial($row['Solde_initial']);
            $compte->setClient_id($row['client_id']); 
            $compte->setCompte_CreatedAt(date_create_from_format('Y-m-d H:i:s', $row['compte_createdAt']));
            $compte->setCompte_UpdatedAt(date_create_from_format('Y-m-d H:i:s', $row['compte_updatedAt']));

            $client = $this->clientRepository->getClient($row['client_id']);
            if ($client) {
                $compte->setClient($client);
            }

            $comptes[] = $compte;
        }
        return $comptes;
    }

    public function getComptesByClientId(int $compte_id): array{
        $statement= $this->connection->getConnection()->prepare('SELECT * FROM compte_bancaire WHERE client_id=:compte_id');
        $statement->execute(['compte_id'=>$compte_id]);
        $comptes = [];

        foreach ($statement as $row) {
            $compte = new Compte;
            $compte->setCompte_Id($row['compte_id']);
            $compte->setRib($row['RIB']);
            $compte->setType_compte($row['Type_compte']);
            $compte->setSolde_initial($row['Solde_initial']);
            $compte->setClient_id($row['client_id']); 
            $compte->setCompte_CreatedAt(date_create_from_format('Y-m-d H:i:s', $row['compte_createdAt']));
            $compte->setCompte_UpdatedAt(date_create_from_format('Y-m-d H:i:s', $row['compte_updatedAt']));

            $comptes[] = $compte;
        }
        return $comptes;
    }

    public function clientHasCompte(int $compte_id): bool{
        $statement= $this->connection->getConnection()->prepare('SELECT * FROM compte_bancaire WHERE client_id=:compte_id LIMIT 1');
        $statement->execute(['compte_id'=>$compte_id]);

        return (bool) $statement->fetch();
    }

    public function getCompte(int $compte_id): ?Compte{
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM compte_bancaire WHERE compte_id =:compte_id');
        $statement->execute(['compte_id'=>$compte_id]);
        $res = $statement->fetch();

        if (!$res) {
            return null;
        }
        
            $compte = new Compte;
            $compte->setCompte_Id($res['compte_id']);
            $compte->setRib($res['RIB']);
            $compte->setType_compte($res['Type_compte']);
            $compte->setSolde_initial($res['Solde_initial']);
            $compte->setClient_id($res['client_id']); 
            $compte->setCompte_CreatedAt(date_create_from_format('Y-m-d H:i:s', $res['compte_createdAt']));
            $compte->setCompte_UpdatedAt(date_create_from_format('Y-m-d H:i:s', $res['compte_updatedAt']));

        return $compte;
    }

    public function create(Compte $compte): bool{
        $statement = $this->connection->getConnection()->prepare('INSERT INTO compte_bancaire (RIB, Type_compte, Solde_initial, client_id) VALUE (:RIB, :Type_compte, :Solde_initial, :client_id);');

        return $statement->execute([
         'RIB'=>$compte->getRib(),
         'Type_compte'=>$compte->getType_compte(), 
         'Solde_initial'=>$compte->getSolde_initial(),
         'client_id'=>$compte->getClient_id()
        ]);
    }

    public function update(Compte $compte): bool{
        $statement = $this->connection->getConnection()->prepare('UPDATE compte_bancaire SET RIB=:RIB, Type_compte=:Type_compte, Solde_initial=:Solde_initial, client_id=:client_id WHERE compte_id=:compte_id');
        return $statement->execute([
            'compte_id'=>$compte->getCompte_id(),
            'RIB'=>$compte->getRib(),
            'Type_compte'=>$compte->getType_compte(), 
            'Solde_initial'=>$compte->getSolde_initial(),
            'client_id'=>$compte->getClient_id()
           ]);
    }

    public function delete(int $compte_id): bool{
        $statement = $this->connection->getConnection()->prepare('DELETE FROM compte_bancaire WHERE compte_id=:compte_id');
        $statement->bindParam(':compte_id', $compte_id);

        return $statement->execute();
    }

    public function count_compte(){

        $statement= $this->connection->getConnection()->prepare('SELECT COUNT(*) as total FROM compte_bancaire');
        $statement->execute();
        $result = $statement->fetch();

        return $result['total'];

     }

     
    public function countComptesByType(int $compte_id): array{
        $statement= $this->connection->getConnection()->prepare('SELECT Type_compte, COUNT(*) as count FROM  compte_bancaire WHERE client_id=:compte_id GROUP BY Type_compte');
        $statement->execute(['compte_id'=>$compte_id]);
        return $statement->fetchAll();
    }
}