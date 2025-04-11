<?php
require_once __DIR__ .'/../models/repositories/ClientRepository.php';
require_once __DIR__ .'/../models/Client.php';

class ClientController{
    public ClientRepository $clientRepository;
    public CompteRepository $compteRepository;
    public ContratRepository $contratRepository;


    public function __construct(){
        $this->clientRepository = new ClientRepository();
        $this->compteRepository = new CompteRepository();
        $this->contratRepository = new ContratRepository();
    }

    public function client_list() {
        if (isConnected()) {
            $clients = $this->clientRepository->getClients();
    
            // Pour chaque client, on vérifie s’il a des comptes ou des contrats
            foreach ($clients as $client) {
                $client->hasComptes = $this->compteRepository->clientHasCompte($client->getClient_id());
                $client->hasContrats = $this->contratRepository->clientHasContrat($client->getClient_id());
            }
    
            require_once __DIR__ .'/../views/client/client_list.php';
        } else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }
    

    public function client_view(int $client_id){
        if (isConnected()) {
            $client = $this->clientRepository->getClient($client_id);
            $comptesParType = $this->compteRepository->countComptesByType($client_id);
            $contratsParType = $this->contratRepository->countContratsByType($client_id);
            require_once __DIR__ .'/../views/client/client_view.php';
        }else{
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            header('Location: ?action=login&error=need_login');
            exit;        
        }

    }

    public function client_create(){
        if (isConnected()) {
            require_once __DIR__ .'/../views/client/client_create.php';
        }else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }

    public function client_store(){
        if (isConnected()) {
            $client = new Client;
            $client->setNom($_POST['nom']);
            $client->setPrenom($_POST['prenom']);
            $client->setEmail($_POST['email']);
            $client->setTelephone($_POST['telephone']);
            $client->setAdresse($_POST['adresse']);
            $this->clientRepository->create($client);


            header('Location: ?action=client_list');
            exit;
        }else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }

    }

    public function client_edit(int $client_id){
        if (isConnected()) {
            $client = $this->clientRepository->getClient($client_id);
            require_once __DIR__ .'/../views/client/client_edit.php';
        }
        else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }

    public function client_update(){
        if (isConnected()) {
            $client = new Client;
            $client->setClient_id($_POST['client_id']);
            $client->setNom($_POST['nom']);
            $client->setPrenom($_POST['prenom']);
            $client->setEmail($_POST['email']);
            $client->setTelephone($_POST['telephone']);
            $client->setAdresse($_POST['adresse']);
            $this->clientRepository->update($client);

            header('Location: ?action=client_list');
            exit;
        }
        else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }

    public function client_delete(int $client_id){
        if (isConnected()) {
            $result = $this->clientRepository->delete($client_id);
            header('Location: ?action=client_list');
            exit;
        }
        else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }
}