<?php $title="Gamelist"; ?>

<?php ob_start(); ?>

<section id="gamelist_modify">

    <form action="index.php?action=addGameToList" method="post" enctype="multipart/form-data">
      <label for="game_name"> Nom du jeu </label><br />
      <input type="text" name="game_name" required /><br />

      <label for="game_image"> Image du jeu </label><br />
      <input id="upload_file" type="file" name="game_image" /><br />

      <input class="button" type="submit" value="Valider" />
      <a class="button" href='index.php?action=adminPage'/> Annuler </a>
    </form>

    <?php
     if (isset($_SESSION['error_upload'])){
          echo "<span style='color:red;'> ". $error_upload_message ."";
          unset($_SESSION['error_upload']);
      }

    ?>
</section>

<section id="gamelist_display">
  <?php
      while ($data = $games->fetch())
      {
      ?>

      <div class="gamelist_poster">
        <img src="public/image/gamelist/<?= $data['game_image'] ?>" />
        <h3><?= htmlspecialchars_decode(nl2br(html_entity_decode($data['game_name']))) ?></h3>
      </div>
      <?php
      }
      $games->closeCursor();
      ?>
</section>

  <?php $content = ob_get_clean(); ?>

  <?php require('views/backend/template_admin.php'); ?>
