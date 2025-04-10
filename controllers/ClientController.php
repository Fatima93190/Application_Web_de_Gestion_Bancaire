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

    public function client_list(){
        if (isConnected()) {
        $clients = $this->clientRepository->getClients();
        require_once __DIR__ .'/../views/client/client_list.php';
        }else {
             // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }

    public function client_view(int $client_id){
        if (isConnected()) {
            $client = $this->clientRepository->getClient($client_id);
            // Exemple : deux méthodes dans ton modèle pour compter les types
            $comptesParType = $this->compteRepository->countComptesByType($client_id);
            $contratsParType = $this->contratRepository->countContratsByType($client_id);
            require_once __DIR__ .'/../views/client/client_view.php';
        }else{
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            require_once __DIR__ . '/../views/admin/login.php';
        }

    }

    public function client_create(){
        if (isConnected()) {
            require_once __DIR__ .'/../views/client/client_create.php';
        }else {
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }

    public function client_store(){
        $client = new Client;
        $client->setNom($_POST['nom']);
        $client->setPrenom($_POST['prenom']);
        $client->setEmail($_POST['email']);
        $client->setTelephone($_POST['telephone']);
        $client->setAdresse($_POST['adresse']);
        $this->clientRepository->create($client);


        header('Location: ?');
        exit;

    }

    public function client_edit(int $client_id){
        if (isConnected()) {
            $client = $this->clientRepository->getClient($client_id);
            require_once __DIR__ .'/../views/client/client_edit.php';
        }
        else {
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }

    public function client_update(){
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

    public function client_delete(int $client_id){
        if (isConnected()) {
            $result = $this->clientRepository->delete($client_id);
            if ($result) {
                header('Location: ?action=client_list&success=1');
                exit;
            } else {
                header('Location: ?action=client_list&error=1');
                exit;
            }
            exit;
        } else {
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }

    // public function forbidden(){

    //         require_once __DIR__ .'/../views/404.php';
    //         http_response_code(404);
    // }
}