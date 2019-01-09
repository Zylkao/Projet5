<?php $title="Modifié un menu"; ?>

<?php ob_start(); ?>

<section id="content-modify">

  <div id="modify-area">
      <form action="index.php?action=modifyMenu&amp;id=<?= $menu['id'] ?>" method="post">
        <div>
          <h3> <?= htmlspecialchars($menu['item_name']) ?> </h3>
        </div>
        <div>
          <label for="item_description"> Contenu de l'item </label><br />
          <textarea id="mytextarea" name="item_description"><?= htmlspecialchars_decode(nl2br(html_entity_decode( $menu['item_description']))) ?></textarea>
        </div>
        <div>
          <input class="button" type="submit" value="Valider" />
          <a id="button" href='index.php?action=adminPage' class="button"> Annuler </a>
        </div>
      </form>
  </div>
</section>

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=843ek0ws7rct4eii7488xofwwb06qptx990gi2hc0o62hr89"></script>

  <script type="text/javascript" src="public/js/tinyMCE.js" ></script>

  <?php $content = ob_get_clean(); ?>

  <?php require('views/backend/template_admin.php'); ?>
