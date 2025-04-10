<?php
session_start();

require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/AccueilController.php';
require_once __DIR__ . '/controllers/ClientController.php';
require_once __DIR__ . '/controllers/CompteController.php';
require_once __DIR__ . '/controllers/ContratController.php';
require_once __DIR__ . '/lib/utils.php';




$clientController = new ClientController();
$compteController = new CompteController();
$contratController = new ContratController();
$accueilController = new AccueilController();
$adminController = new AdminController();

$action = $_GET['action'] ?? 'index';
$admin_id = $_GET['admin_id'] ?? null;
$client_id = $_GET['client_id'] ?? null;
$compte_id = $_GET['compte_id'] ?? null;
$contrat_id = $_GET['contrat_id'] ?? null;
switch ($action) {
    case 'login':
        $adminController->login();
        break;
    case 'doLogin':
        $adminController->doLogin();
        break;
    case 'logout':
        $adminController->logout();
        break;
    case 'client_list':
        $clientController->client_list();
        break;
    case 'compte_list':
        $compteController->compte_list();
        break;
    case 'contrat_list':
        $contratController->contrat_list();
        break;
    case 'client_view':
        if ($client_id !== null) {
            $clientController->client_view((int) $client_id);
        } else {
            echo "Erreur : identifiant client manquant.";
        }        break;
    case 'client_create':
        $clientController->client_create();
        break;
    case 'compte_view':
        $compteController->compte_view($compte_id);
        break;
    case 'compte_create':
        $compteController->compte_create();
        break;
    case 'contrat_view':
        $contratController->contrat_view($contrat_id);
        break;
    case 'contrat_create':
        $contratController->contrat_create();
        break;
    case 'index':
        $accueilController->home();
        break;
    case 'client_store':
        $clientController->client_store();
        break;
    case 'client_edit':
        $clientController->client_edit($client_id);
        break;
    case 'client_update':
        $clientController->client_update();
        break;
    case 'client_delete':
        $clientController->client_delete($client_id);
        break;
    case 'compte_store':
        $compteController->compte_store();
        break;
    case 'compte_edit':
        $compteController->compte_edit($compte_id);
        break;
    case 'compte_update':
        $compteController->compte_update();
        break;
    case 'compte_delete':
        $compteController->compte_delete($compte_id);
        break;
    case 'contrat_store':
        $contratController->contrat_store();
        break;
    case 'contrat_edit':
        $contratController->contrat_edit($contrat_id);
        break;
    case 'contrat_update':
        $contratController->contrat_update();
        break;
    case 'contrat_delete':
        $contratController->contrat_delete($contrat_id);
        break;
    default:
        $accueilController->forbidden();
        break;
}



// var_dump($clients);

