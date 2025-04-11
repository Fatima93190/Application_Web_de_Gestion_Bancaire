<?php
require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../models/repositories/CompteRepository.php';
require_once __DIR__ . '/../models/repositories/ContratRepository.php';

class AccueilController{

    private ClientRepository $clientRepository;
    private CompteRepository $compteRepository;
    private ContratRepository $contratRepository;

    public function __construct(){
        $this->clientRepository = new ClientRepository();
        $this->compteRepository = new CompteRepository();
        $this->contratRepository = new ContratRepository();
    }

    
    public function home()
    {
        if (isConnected()) {
            $clientRepository = new ClientRepository();
            $nbrTotalClients = $clientRepository->count_client();
            $compteRepository = new CompteRepository();
            $nbrTotalComptes = $compteRepository->count_compte();
            $contratRepository = new ContratRepository();
            $nbrTotalContrats = $contratRepository->count_contrat();


            require_once __DIR__ . '/../views/home.php';
        }else {
            // Redirige vers la vue de login si l'utilisateur n'est pas connecté
            header('Location: ?action=login&error=need_login');
        }
    } 
    
    public function forbidden(){
        require_once __DIR__ .'/../views/404.php';
        http_response_code(404);
    }
}
