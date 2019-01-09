<?php

require_once('model/menuManager.php');
require_once('model/UserManager.php');
require_once('model/gamelistManager.php');

function adminPage()
{
  $menuManager = new \zylkaôme\Projet_OC\Projet5\Model\MenuManager();

  $menus = $menuManager->getMenus();


  require('views/backend/admin.php');
}

function adminMenu()
{
  $menuManager = new \zylkaôme\Projet_OC\Projet5\Model\MenuManager();


  $menu = $menuManager->getMenu($_GET['id']);


  require('views/backend/modify_menu.php');
}

function addMenu()
{
  $menuManager = new \zylkaôme\Projet_OC\Projet5\Model\MenuManager();
  $menus = $menuManager->addItemMenu();
}

function modifyMenu($id,$item_description)
{
  $menuManager = new \zylkaôme\Projet_OC\Projet5\Model\MenuManager();
  $menus = $menuManager->modifyItemMenu($id,$item_description);


  if ($affectedLines === false) {
    throw new Exception('Impossible de modifié le contenu !');
  }
  else {
    header('Location: index.php?action=adminPage');
  }
}

function deleteMenuItem($id)
{
  $menuManager = new \zylkaôme\Projet_OC\Projet5\Model\MenuManager();
  $menus = $menuManager->deleteItemMenu($id);

  header('Location: index.php?action=adminPage');
}

function membersList()
{
  $maxNbOfUsers = 6;
  $pageLink = "index.php?action=membersList";

  $startIndex = (isset($_GET['startIndex'])) ? htmlspecialchars($_GET['startIndex']) : 0 ;

  $userManager = new \zylkaôme\Projet_OC\Projet5\Model\UserManager();
  $totalNumberOfUsers = $userManager->countUsers();
  $users = $userManager->getUsers($startIndex,$maxNbOfUsers);
  $page = $userManager->getPagination($totalNumberOfUsers, $pageLink, $maxNbOfUsers);

  require('views/backend/members_list.php');
}

function deleteUser($id)
{
  $userManager = new \zylkaôme\Projet_OC\Projet5\Model\UserManager();
  $users = $userManager->deleteUsers($id);

  header('Location: index.php?action=membersList&startIndex=0');
}

function modifyGamelist()
{
  $gamelistManager = new \zylkaôme\Projet_OC\Projet5\Model\GamelistManager();
  $games = $gamelistManager->getGames();

  require('views/backend/gamelist_admin.php');
}

function addGameToList($game_name,$game_image)
{
  $target_dir = "public/image/gamelist/";
  $target_file = $target_dir . basename($_FILES["game_image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["game_image"]["tmp_name"]);
      if($check !== false) {
        $_SESSION['error_upload'] = 1;
          $error_upload_message = "Le fichier est une image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "Le fichier n'est pas une image.";
          $uploadOk = 0;
      }
  }
  if (file_exists($target_file)) {
    $_SESSION['error_upload'] = 1;
      $error_upload_message = "Désolé , Le nom du fichier est déja attribuer.";
      $uploadOk = 0;
  }
  if ($_FILES["game_image"]["size"] > 500000) {
    $_SESSION['error_upload'] = 1;
      $error_upload_message = "Désolé , l'image est trop grande";
      $uploadOk = 0;
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $_SESSION['error_upload'] = 1;
      $error_upload_message =  "Désolé, Seulement les formats JPG, JPEG, PNG et GIF sont autorisé.";
      $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    $_SESSION['error_upload'] = 1;
      $error_upload_message =  "Désolé , votre image n'as pas pu être uploadé";
  } else {
      if (move_uploaded_file($_FILES["game_image"]["tmp_name"], $target_file)) {
          $_SESSION['error_upload'] = 1;
          $error_upload_message =  "le fichier". basename( $_FILES["game_image"]["name"]). " à été uploadé.";
      } else {
        $_SESSION['error_upload'] = 1;
          $error_upload_message =  "Désolé , il y a eu une erreur lors de l'upload.";
      }
  }

  $gamelistManager = new \zylkaôme\Projet_OC\Projet5\Model\GamelistManager();
  $game = $gamelistManager->addGame($game_name,$game_image['name']);

  require('views/backend/gamelist_admin.php');

  if ($game === false) {
    throw new Exception('Impossible de modifié la gamelist!');
  }
  else {

    header('Location: index.php?action=modifyGamelist');
  }
}
