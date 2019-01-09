<?php $title="Profil"; ?>

<?php ob_start(); ?>

<div id="profil">
  <h3 id="profil_name"> <?php echo $_SESSION['pseudo'] ?></h3>
  <form action="index.php?action=updateProfil&amp;id=<?= $user['user_id']?>" method="post">
    <label for="steam_id"> <i class="fab fa-steam">Steam</i> </label><br />
    <input type="text" name="steam_id" value="<?= htmlspecialchars($user['steam_id'])?>" /><br />

    <label for="battle_tag"> Battle.Net </label><br />
    <input type="text" name="battle_tag" value="<?= htmlspecialchars($user['battle_tag']) ?>" /><br />

    <label for="switch_id"><i class="fab fa-nintendo-switch"> Switch </i> </label><br />
    <input type="text" name="switch_id"  value="<?= htmlspecialchars($user['switch_id']) ?>"/><br />

    <label for="psn_id"> <i class="fab fa-playstation">Playstation </i> </label><br />
    <input type="text" name="psn_id"  value="<?= htmlspecialchars($user['psn_id']) ?>"/><br />

    <label for="xbox_id"> <i class="fab fa-xbox"> Xbox </i> </label><br />
    <input type="text" name="xbox_id"  value="<?= htmlspecialchars($user['xbox_id']) ?>"/><br />

    <input class="button" type="submit" value="Valider" />
    <a class="button" href='index.php'/> Annuler </a>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>
