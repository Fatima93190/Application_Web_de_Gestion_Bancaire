<?php

require_once __DIR__ .'/../models/repositories/CompteRepository.php';
// require_once __DIR__ .'/../models/repositories/ClientRepository.php';
require_once __DIR__ .'/../models/Compte.php';

class CompteController{
    public CompteRepository $compteRepository;
    public ClientRepository $clientRepository;


    public function __construct(){
        $this->compteRepository = new CompteRepository();
        $this->clientRepository = new ClientRepository();

    }

    public function compte_list(){
        if (isConnected()) {
            $comptes = $this->compteRepository->getComptes();
            require_once __DIR__ .'/../views/compte/compte_list.php';
        }
        else {
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }

    public function compte_view(int $compte_id){
        if (isConnected()) {
            $compte = $this->compteRepository->getCompte($compte_id);
            $client = $this->clientRepository->getClient($compte->getClient_id());

            require_once __DIR__ .'/../views/compte/compte_view.php';
    }
        else {
            require_once __DIR__ . '/../views/admin/login.php';
        }

    }

    public function compte_create(){
        if (isConnected()) {
            $clients= $this->clientRepository->getClients();
            require_once __DIR__ .'/../views/compte/compte_create.php';
        }
        else {
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }

    public function compte_store(){
        $compte = new Compte;
        $compte->setRib($_POST['RIB']);
        $compte->setType_compte($_POST['Type_compte']);
        $compte->setSolde_initial((float) $_POST['Solde_initial']);
        $compte->setClient_id((int) $_POST['client_id']);
        $this->compteRepository->create($compte);

        header('Location: ?');

    }

    public function compte_edit(int $compte_id){
        if (isConnected()) {
            $compte = $this->compteRepository->getCompte($compte_id);
            $clients= $this->clientRepository->getClients();
            require_once __DIR__ .'/../views/compte/compte_edit.php';
        }
        else {
            require_once __DIR__ . '/../views/admin/login.php';
        }
    }

    public function compte_update(){
        $compte = new Compte;
        $compte->setCompte_id($_POST['compte_id']);
        $compte->setRib($_POST['RIB']);
        $compte->setType_compte($_POST['Type_compte']);
        $compte->setSolde_initial((float) $_POST['Solde_initial']);
        $compte->setClient_id((int) $_POST['client_id']);
        $this->compteRepository->update($compte);

        header('Location: ?action=compte_list');
        exit;
    }

    public function compte_delete(int $compte_id){
        $this->compteRepository->delete($compte_id);
        header('Location: ?');
        exit;
    }
}