<?php
require_once __DIR__ .'/../Contrat.php';
require_once __DIR__ . '/../../lib/database.php';
class ContratRepository{

    public DatabaseConnection $connection;
    public ClientRepository $clientRepository;


    public function __construct(){
        $this->connection = new DatabaseConnection();
        $this->clientRepository = new ClientRepository();
    }

    public function getContrats(): array{
        $statement= $this->connection->getConnection()->prepare('SELECT * FROM contrats');
        $statement->execute();
        $contrats = [];

        foreach ($statement as $row) {
            $contrat = new Contrat;
            $contrat->setContrat_Id($row['contrat_id']);
            $contrat->setType_contrat($row['type_contrat']);
            $contrat->setMontant($row['montant']);
            $contrat->setDuree($row['duree']);
            $contrat->setClient_id($row['client_id']); 
            $contrat->setContrat_CreatedAt(date_create_from_format('Y-m-d H:i:s', $row['contrat_createdAt']));
            $contrat->setContrat_UpdatedAt(date_create_from_format('Y-m-d H:i:s', $row['contrat_updatedAt']));

            $client = $this->clientRepository->getClient($row['client_id']);
            if ($client) {
                $contrat->setClient($client);
            }

            $contrats[] = $contrat;
        }
        return $contrats;
    }

    public function getContratsByClientId(int $contrat_id): array{
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM contrats WHERE client_id =:contrat_id');
        $statement->execute(['contrat_id'=>$contrat_id]);
        $contrats = [];

        foreach ($statement as $row) {
            $contrat = new Contrat;
            $contrat->setContrat_Id($row['contrat_id']);
            $contrat->setType_contrat($row['type_contrat']);
            $contrat->setMontant($row['montant']);
            $contrat->setDuree($row['duree']);
            $contrat->setClient_id($row['client_id']); 
            $contrat->setContrat_CreatedAt(date_create_from_format('Y-m-d H:i:s', $row['contrat_createdAt']));
            $contrat->setContrat_UpdatedAt(date_create_from_format('Y-m-d H:i:s', $row['contrat_updatedAt']));

            $contrats[] = $contrat;
        }
        return $contrats;
    }

    public function getContrat(int $contrat_id): ?Contrat{
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM contrats WHERE contrat_id =:contrat_id');
        $statement->execute(['contrat_id'=>$contrat_id]);
        $res = $statement->fetch();

        if (!$res) {
            return null;
        }
        
        $contrat = new Contrat;
        $contrat->setContrat_Id($res['contrat_id']);
        $contrat->setType_contrat($res['type_contrat']);
        $contrat->setMontant($res['montant']);
        $contrat->setDuree($res['duree']);
        $contrat->setClient_id($res['client_id']); 
        $contrat->setContrat_CreatedAt(date_create_from_format('Y-m-d H:i:s', $res['contrat_createdAt']));
        $contrat->setContrat_UpdatedAt(date_create_from_format('Y-m-d H:i:s', $res['contrat_updatedAt']));


        return $contrat;
    }

    public function create(Contrat $contrat): bool{
        $statement = $this->connection->getConnection()->prepare('INSERT INTO contrats (type_contrat, montant, duree, client_id) VALUE (:type_contrat, :montant, :duree, :client_id);');

        return $statement->execute([
        'type_contrat'=>$contrat->getType_contrat(),
        'montant'=>$contrat->getMontant(), 
        'duree'=>$contrat->getDuree(),
        'client_id'=>$contrat->getClient_id()
        ]);
    }

    public function update(Contrat $contrat): bool{
        $statement = $this->connection->getConnection()->prepare('UPDATE contrats SET type_contrat=:type_contrat, montant=:montant, duree=:duree, client_id=:client_id WHERE contrat_id=:contrat_id');
        return $statement->execute([
            'contrat_id'=>$contrat->getContrat_id(),
            'type_contrat'=>$contrat->getType_contrat(),
            'montant'=>$contrat->getMontant(), 
            'duree'=>$contrat->getDuree(),
            'client_id'=>$contrat->getClient_id()
           ]);
    }

    public function delete(int $contrat_id): bool{
        $statement = $this->connection->getConnection()->prepare('DELETE FROM contrats WHERE contrat_id=:contrat_id');
        $statement->bindParam(':contrat_id', $contrat_id);

        return $statement->execute();
    }
    public function count_contrat(){

        $statement= $this->connection->getConnection()->prepare('SELECT COUNT(*) as total FROM contrats');
        $statement->execute();
        $result = $statement->fetch();

        return $result['total'];

     }

     public function countContratsByType(int $contrat_id): array{
        $statement= $this->connection->getConnection()->prepare('SELECT type_contrat, COUNT(*) as count FROM contrats WHERE client_id=:contrat_id GROUP BY type_contrat');
        $statement->execute(['contrat_id'=>$contrat_id]);
        return $statement->fetchAll();
    }
}