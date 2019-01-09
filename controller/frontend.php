<?php

require_once('model/menuManager.php');
require_once('model/UserManager.php');
require_once('model/gamelistManager.php');

function welcome()
{
  $menuManager = new \zylkaôme\Projet_OC\Projet5\Model\MenuManager();
  $gamelistManager = new \zylkaôme\Projet_OC\Projet5\Model\GamelistManager();
  $games = $gamelistManager->getGames();
  $menus = $menuManager->getMenus();
  $menu1 = $menuManager->getMenu($id = 1);
  $menu2 = $menuManager->getMenu($id = 2);

  require('views/frontend/main_page.php');
}

function signUp()
{
  require('views/frontend/sign_up.php');
}

function newUser($pseudo,$email,$password)
{
  $userManager = new \zylkaôme\Projet_OC\Projet5\Model\UserManager();
  $affectedLines = $userManager->addUser($pseudo,$email,$password);

  if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter l\' utilisateur !');
  }
  else {
    header('Location: index.php?action=welcome');
  }
}

function profilPage()
{
  $userManager = new \zylkaôme\Projet_OC\Projet5\Model\UserManager();
  $user = $userManager->getUser($_GET['id']);

  require('views/frontend/profil.php');
}

function updateProfil($id,$steam,$battleTag,$switch,$psn,$xbox)
{
  $userManager = new \zylkaôme\Projet_OC\Projet5\Model\UserManager();

  $affectedLines = $userManager->modifyProfil($id,$steam,$battleTag,$switch,$psn,$xbox);

  if ($affectedLines === false) {
    throw new Exception('Impossible de modifier l\' utilisateur !');
  }
  else {
    header('Location: index.php');
  }
}

function connexion($pseudo)
{
  $userManager = new \zylkaôme\Projet_OC\Projet5\Model\UserManager();
  $affectedLines = $userManager->signIn($pseudo);

  $isPasswordCorrect = password_verify($_POST['password'], $affectedLines['password']);

  if ($affectedLines === false) {
    $_SESSION['error'] = 1;
    header("Location: index.php");
  }
  else
  {
    if ($isPasswordCorrect)
      {
        $_SESSION['user_id'] = $affectedLines['user_id'];
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['role'] = $affectedLines['role'];
        header('Location: index.php');
      }
  }
}

function disconnect()
{
  header('Location: index.php');
}
