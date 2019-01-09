<?php

session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'welcome') {
            welcome();
        }
        elseif ($_GET['action'] == 'menu') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                welcome();
            }
            else {
                throw new Exception('Aucun identifiant de menu envoyé');
            }
        }
        elseif ($_GET['action'] == 'profilPage') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
              profilPage();
            }
            else {
              throw new Exception('Accèes profil refusé');
            }
        }
        elseif ($_GET['action'] == 'updateProfil') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
              updateProfil($_GET['id'], $_POST['steam_id'], $_POST['battle_tag'], $_POST['switch_id'], $_POST['psn_id'], $_POST['xbox_id']);
            }
            else {
              throw new Exception('Modification profil refusé');
            }
        }
        elseif ($_GET['action'] == 'modifyGamelist') {
              modifyGamelist();
        }
        elseif ($_GET['action'] == 'addGameToList') {
            if (!empty($_POST['game_name']) && !empty($_FILES['game_image'])){
                addGameToList($_POST['game_name'], $_FILES['game_image']);
            }
            else{
              throw new Exception('Tous les champs ne sont pas remplis ! Gamelist non mis à jour');
            }
        }
        elseif ($_GET['action'] == 'signUp'){
              signUp();
        }
        elseif ($_GET['action'] == 'newUser') {
              if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                  newUser($_POST['pseudo'], $_POST['email'], $_POST['password']);
              }
              else {
                      throw new Exception('Tous les champs ne sont pas remplis ! Inscription refusé');
              }
        }
        elseif ($_GET['action'] == 'connexion') {
          if (!empty($_POST['pseudo']) && !empty($_POST['password'])){
            connexion($_POST['pseudo'], $_POST['password']);
          }
          else{
            header('Location: index.php');
          }
        }
        elseif ($_GET['action'] == 'disconnect') {
          $_SESSION = array();
          session_destroy();
          header('Location: index.php?action=welcome');
        }
        elseif(isset($_GET['action'])){
          if ($_GET['action'] == 'adminPage'){
              if($_SESSION['role'] == 'Admin'){
              adminPage();
            }
            else {
              throw new Exception('Vous ne posseder pas les droits Admin');
            }
          }
          elseif ($_GET['action'] == 'adminMenu') {
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                  adminMenu();
              }
              else {
                  throw new Exception('Aucun identifiant de billet envoyé(Admin)');
              }
          }
          elseif ($_GET['action'] == 'membersList'){
                membersList();
                if(isset($_GET['totalNumberOfUsers']) && isset($_GET['pageLink']) && isset($_GET['maxNbOfUsers'])){
                  getPagination($_GET['totalNumberOfUsers'], $_GET['pageLink'], $_GET['maxNbOfUsers']);
                }
          }
          elseif ($_GET['action'] == 'deleteUser'){
              if(isset($_GET['id']) && $_GET['id'] > 0){
                deleteUser($_GET['id']);
              }
              else{
                throw new Exception('Impossible de supprimer le membre');
              }
          }
          elseif ($_GET['action'] == 'modifyMenu') {
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                  if (!empty($_POST['item_description'])) {
                      modifyMenu($_GET['id'],$_POST['item_description']);
                  }
                  else {
                      throw new Exception('Tous les champs ne sont pas remplis (admin)!');
                  }
              }
              else {
                  throw new Exception('Aucun identifiant de billet envoyé');
              }
          }
          elseif ($_GET['action'] == 'deleteMenuItem') {
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteMenuItem($_GET['id']);
              }
              else {
                throw new Exception ('Suppression refusé');
              }
          }
          else {
              throw new Exception('Accèes Admin Refusé');
          }
        }
    }
    else {
        welcome();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
