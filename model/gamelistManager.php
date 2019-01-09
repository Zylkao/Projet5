<?php
namespace zylkaôme\Projet_OC\Projet5\model;

require_once("model/Manager.php");

class GamelistManager extends Manager
{
  public function getGames()
  {
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT game_id,game_name,game_image
    FROM gamelist
    ORDER BY game_id');

    $req -> execute(array());
    return $req;
  }

  public function addGame($game_name,$game_image)
  {
    $db = $this -> dbConnect();
    $game = $db->prepare('INSERT INTO gamelist(game_name,game_image)
    VALUES(?,?)');
    $affectedLines = $game->execute(array($game_name,$game_image));

    return $affectedLines;
  }

  public function deleteGame($id)
  {
    $db= $this -> dbConnect();
    $game = $db->prepare('DELETE FROM gamelist WHERE game_id = "'. $id .'"');
    $game->execute(array($id));

    return $game;
  }
}
