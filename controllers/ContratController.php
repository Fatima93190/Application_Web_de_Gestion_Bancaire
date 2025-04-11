<?php

require_once __DIR__ .'/../models/repositories/ContratRepository.php';
require_once __DIR__ .'/../models/Contrat.php';

class ContratController{
    public ContratRepository $contratRepository;
    public ClientRepository $clientRepository;


    public function __construct(){
        $this->contratRepository = new ContratRepository();
        $this->clientRepository = new ClientRepository();

    }

    public function contrat_list(){
        if (isConnected()) {
        $contrats = $this->contratRepository->getContrats();
        require_once __DIR__ .'/../views/contrat/contrat_list.php';
        }
        else {
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            header('Location: ?action=login&error=need_login');
            exit;
        }
    }

    public function contrat_view(int $contrat_id){
        if (isConnected()) {
        $contrat = $this->contratRepository->getContrat($contrat_id);
        $client = $this->clientRepository->getClient($contrat->getClient_id());

        require_once __DIR__ .'/../views/contrat/contrat_view.php';
        }
        else {
            header('Location: ?action=login&error=need_login');
            exit;
        }
    }

    public function contrat_create(){
        if (isConnected()) {
            $clients= $this->clientRepository->getClients();
        require_once __DIR__ .'/../views/contrat/contrat_create.php';
    }
        else {
            header('Location: ?action=login&error=need_login');
            exit;
        }
    }

    public function contrat_store(){
        if (isConnected()) {
            $contrat = new Contrat;
            $contrat->setType_contrat($_POST['type_contrat']);
            $contrat->setMontant((float) $_POST['montant']);
            $contrat->setDuree((int) $_POST['duree']);
            $contrat->setClient_id((int) $_POST['client_id']);
            $this->contratRepository->create($contrat);

            header('Location: ?action=contrat_list');
        }else {
            header('Location: ?action=login&error=need_login');
            exit;
        }

    }

    public function contrat_edit(int $contrat_id){
        if (isConnected()) {
            $contrat = $this->contratRepository->getContrat($contrat_id);
            $clients= $this->clientRepository->getClients();
            require_once __DIR__ .'/../views/contrat/contrat_edit.php';
        }
        else {
            header('Location: ?action=login&error=need_login');
            exit;
        }
    }

    public function contrat_update(){
        if (isConnected()) {
            $contrat = new Contrat;
            $contrat->setContrat_id($_POST['contrat_id']);
            $contrat->setType_contrat($_POST['type_contrat']);
            $contrat->setMontant((float) $_POST['montant']);
            $contrat->setDuree((int) $_POST['duree']);
            $contrat->setClient_id((int) $_POST['client_id']);
            $this->contratRepository->update($contrat);

            header('Location: ?action=contrat_list');
            exit;
        }else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }

    public function contrat_delete(int $contrat_id){
        if (isConnected()) {
            $this->contratRepository->delete($contrat_id);
            header('Location: ?action=contrat_list');
            exit;
        }else {
            header('Location: ?action=login&error=need_login');
            exit;        
        }
    }
}