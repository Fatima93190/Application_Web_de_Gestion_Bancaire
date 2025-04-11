<?php
require_once __DIR__ .'/../Client.php';
require_once __DIR__ . '/../../lib/database.php';
class ClientRepository{

    public DatabaseConnection $connection;

    public function __construct(){
        $this->connection = new DatabaseConnection();
    }

    public function getClients(): array{
        $statement= $this->connection->getConnection()->prepare('SELECT * FROM clients');
        $statement->execute();
        $clients = [];

        foreach ($statement as $row) {
            $client = new Client;
            $client->setClient_Id($row['client_id']);
            $client->setNom($row['nom']);
            $client->setPrenom($row['prenom']);
            $client->setEmail($row['email']);
            $client->setTelephone($row['telephone']);
            if ($row['adresse'] !== null) {
                $client->setAdresse($row['adresse']);
            }
            $client->setClient_CreatedAt(date_create_from_format('Y-m-d H:i:s', $row['client_createdAt']));
            $client->setClient_UpdatedAt(date_create_from_format('Y-m-d H:i:s', $row['client_updatedAt']));

            $clients[] = $client;
        }
        return $clients;
    }

    public function getClient(int $client_id): ?Client{
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM clients WHERE client_id =:client_id');
        $statement->execute(['client_id' =>$client_id]);
        $res = $statement->fetch();

        if (!$res) {
            return null;
        }
        
        $client = new Client();
        $client->setClient_Id($res['client_id']);
        $client->setNom($res['nom']);
        $client->setPrenom($res['prenom']);
        $client->setEmail($res['email']);
        $client->setTelephone($res['telephone']);
        $client->setAdresse($res['adresse']);
        $client->setClient_CreatedAt(date_create_from_format('Y-m-d H:i:s', $res['client_createdAt']));
        $client->setClient_UpdatedAt(date_create_from_format('Y-m-d H:i:s', $res['client_updatedAt']));

        return $client;
    }

    public function create(Client $client): bool{
        $statement = $this->connection->getConnection()->prepare('INSERT INTO clients (nom, prenom, email, telephone, adresse) VALUE (:nom, :prenom, :email, :telephone, :adresse);');

        return $statement->execute([
         'nom'=>$client->getNom(),
         'prenom'=>$client->getPrenom(), 
         'email'=>$client->getEmail(),
         'telephone'=>$client->getTelephone(), 
         'adresse'=>$client->getAdresse()
        ]);
    }

    public function update(Client $client): bool{
        $statement = $this->connection->getConnection()->prepare('UPDATE clients SET nom=:nom, prenom=:prenom, email=:email, telephone=:telephone, adresse=:adresse WHERE client_id=:client_id');
        return $statement->execute([
            'client_id'=>$client->getClient_id(),
            'nom'=>$client->getNom(),
            'prenom'=>$client->getPrenom(), 
            'email'=>$client->getEmail(),
            'telephone'=>$client->getTelephone(), 
            'adresse'=>$client->getAdresse()
           ]);
    }

    public function delete(int $client_id): bool{
        $statement = $this->connection->getConnection()->prepare('DELETE FROM clients WHERE client_id=:client_id');
        $statement->bindParam(':client_id', $client_id);
        return $statement->execute();

    }
     public function count_client(){

        $statement= $this->connection->getConnection()->prepare('SELECT COUNT(*) as total FROM clients');
        $statement->execute();
        $result = $statement->fetch();

        return $result['total'];

     }
}