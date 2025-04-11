<?php

require_once __DIR__ .'/../models/repositories/CompteRepository.php';
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
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }

    public function compte_view(int $compte_id){
        if (isConnected()) {
            $compte = $this->compteRepository->getCompte($compte_id);
            $client = $this->clientRepository->getClient($compte->getClient_id());

            require_once __DIR__ .'/../views/compte/compte_view.php';
    }
        else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }

    }

    public function compte_create(){
        if (isConnected()) {
            $clients= $this->clientRepository->getClients();
            require_once __DIR__ .'/../views/compte/compte_create.php';
        }
        else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }

    public function compte_store(){
        if (isConnected()) {
            try {
                $compte = new Compte;
                $compte->setRib($_POST['RIB']);
                $compte->setType_compte($_POST['Type_compte']);
                $compte->setSolde_initial((float) $_POST['Solde_initial']);
                $compte->setClient_id((int) $_POST['client_id']);
                $this->compteRepository->create($compte);
                header('Location: ?action=compte_list');
                exit;
            } catch (InvalidArgumentException $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: ?action=compte_create');
                exit;
            }
        }
        else {
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            header('Location: ?action=login&error=need_login');
            exit;        
        }

    }

    public function compte_edit(int $compte_id){
        if (isConnected()) {
            $compte = $this->compteRepository->getCompte($compte_id);
            $clients= $this->clientRepository->getClients();
            require_once __DIR__ .'/../views/compte/compte_edit.php';
        }
        else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }

    public function compte_update(){
        if (isConnected()) {
            try {
                $compte = new Compte;
                $compte->setRib($_POST['RIB']);
                $compte->setType_compte($_POST['Type_compte']);
                $compte->setSolde_initial((float) $_POST['Solde_initial']);
                $compte->setClient_id((int) $_POST['client_id']);
                $this->compteRepository->create($compte);
                header('Location: ?action=compte_list');
                exit;
            } catch (InvalidArgumentException $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: ?action=compte_create');
                exit;
            }
        }
        else {
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }

    public function compte_delete(int $compte_id){
        if (isConnected()) {
            $this->compteRepository->delete($compte_id);
            header('Location: ?action=compte_list');
            exit;
        }
        else {
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }
}