<?php
namespace zylkaôme\Projet_OC\Projet5\model;

require_once("model/Manager.php");

class UserManager extends Manager
{
    public function addUser($pseudo,$email,$password)
    {
      $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $db = $this -> dbConnect();
      $user = $db->prepare('INSERT INTO users(pseudo,email,password,role,date_user_creation)
      VALUES(:pseudo,:email,:password,"User",NOW())');
      $affectedLines = $user->execute(array(
                              'pseudo' => $pseudo,
                              'email' => $email,
                              'password' => $pass_hache));

      return $affectedLines;
    }

    public function modifyProfil($id,$steam,$battleTag,$switch,$psn,$xbox)
    {
      $db = $this -> dbConnect();
      $user = $db->prepare('UPDATE users
      SET steam_id ="'.$steam.'", battle_tag="'.$battleTag.'", switch_id="'.$switch.'", psn_id="'.$psn.'", xbox_id="'.$xbox.'"
      WHERE user_id ="'. $id.'"');
      $affectedLines = $user->execute(array($id,$steam,$battleTag,$switch,$psn,$xbox));

      return $affectedLines;
    }

    public function deleteUsers($id)
    {
      $db= $this -> dbConnect();
      $user = $db->prepare('DELETE FROM users WHERE user_id = "'. $id .'"');
      $user->execute(array($id));

      return $user;
    }

    public function getUsers($startIndex,$maxNbOfUsers)
    {
      $db = $this -> dbConnect();
      $user = $db->prepare('SELECT *,DATE_FORMAT(date_user_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_user_fr
      FROM users
      ORDER BY user_id
      LIMIT '.intval($maxNbOfUsers).' OFFSET '.intval($startIndex).' ');

      $user -> execute(array($maxNbOfUsers,$startIndex));
      return $user;
    }

    public function getUser($id)
    {
      $db = $this -> dbConnect();
      $req = $db->prepare('SELECT *,DATE_FORMAT(date_user_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_user_fr
      FROM users
      WHERE user_id = ?');

      $req -> execute(array($id));
      $user = $req->fetch();
      return $user;
    }

    public function signIn($pseudo)
    {
      $db = $this -> dbConnect();
      $req = $db->prepare('SELECT user_id,password,role FROM users WHERE pseudo = :pseudo');
      $req->execute(array('pseudo' => $pseudo));

      $result = $req->fetch();

      return $result;
    }

    public function getPagination($totalNumberOfUsers, $pageLink, $maxNbOfUsers) {

		$startIndex = 0;
	    $indexPage = 1;
	    $pagination = '';

	    while($startIndex < $totalNumberOfUsers) {

			$pagination .= '<a href=\''. $pageLink .'&startIndex=' . ($startIndex) . '\'>' . $indexPage . ' . </a>';
	        $indexPage++;
	        $startIndex += $maxNbOfUsers;

	        if ($startIndex === $totalNumberOfUsers) {

				$pagination .= '<a href=\''. $pageLink .'&startIndex=' . ($startIndex - ($startIndex - $totalNumberOfUsers)) . '\'>' . $indexPage . '</a>';

			   }

	    }

	    return '<div class=\'pagination\'> Pages : ' . $pagination . '</div>';
	   }

     public function countUsers()
     {
       $db = $this -> dbConnect();
       $req = $db->prepare('SELECT count(*) AS total
       FROM users');

       $req->execute();
       $count = $req->fetch();

       return $count['total'];
     }
}
