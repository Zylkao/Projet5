<?php
namespace zylkaôme\Projet_OC\Projet5\model;

require_once("model/Manager.php");

class MenuManager extends Manager
{
  public function getMenus()
  {
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT id,item_name,item_description, DATE_FORMAT(last_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_date_fr
    FROM main_menu
    ORDER BY id');

    $req -> execute(array());
    $menus = $req->fetch();
    return $menus;
  }

  public function getMenu($id)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id,item_name,item_description, DATE_FORMAT(last_date, \'%d/%m/%Y à %Hh%imin%ss\') AS last_date_fr
    FROM main_menu
    WHERE id = ?');
    $req->execute(array($id));
    $menu = $req->fetch();

    return $menu;
  }

  public function addItemMenu($id,$itemName,$itemDescription)
  {
    $db = $this -> dbConnect();
    $menu = $db->prepare('INSERT INTO main_menu(id,item_name,item_description,last_date)
    VALUES(?,?,?,NOW())');
    $affectedLines = $menu->execute(array($id,$itemName,$itemDescription,$lastDate));

    return $affectedLines;
  }

  public function modifyItemMenu($id,$item_description)
  {
    $db = $this -> dbConnect();
    $menu = $db->prepare('UPDATE main_menu
    SET  item_description ="'. $item_description .'"
    WHERE id ="'. $id.'"');
    $affectedLines = $menu->execute(array($id,$item_description));

    return $affectedLines;
  }

  public function deleteItemMenu($id)
  {
    $db= $this -> dbConnect();
    $menu = $db->prepare('DELETE FROM main_menu WHERE id = "'. $id .'"');
    $menu->execute(array($id));

    return $menu;
  }
}
