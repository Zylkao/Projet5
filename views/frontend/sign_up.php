<?php $title = "Inscription" ?>
<?php ob_start(); ?>

<div id="sign_up">
  <h3> Inscription </h3>
  <form action="index.php?action=newUser" method="post">
    <label for="pseudo"> Identifiant </label><br />
    <input type="text" name="pseudo" pattern="[A-Za-z1-9]{6,}" title="Pseudo de 6 caractères minimum (Lettre et chiffre)" required/><br />

    <label for="email"> E-mail </label><br />
    <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title"Format email non reconnu" required/><br />

    <label for="password"> Mot de passe </label><br />
    <input type="password" name="password" pattern=".{8,}" title="le mot de passe doit faire plus de 8 caractères" required/><br />

    <input class="button" type="submit" value="Valider" />
    <a class="button" href='index.php'/> Annuler </a>
  </form>


</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>
