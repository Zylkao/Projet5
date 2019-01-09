<?php $title="Chiik'TV";?>

<?php ob_start(); ?>

<section id="header">
  <img id="logo" src="public/image/chiikubi.png" alt="Logo de Chiik'Tv" />
  <?php include('menu.php');?>
  <?php include('connexion.php');?>
</section>

<section id="main">

  <div id="stream-zone">
    <div id="stream">
      <iframe src="https://player.twitch.tv/?channel=chiikubi" frameborder="0"
      allowfullscreen="true" scrolling="no" height="100%" width="100%" ></iframe>
    </div>
    <div id="chat">
      <iframe src="https://www.twitch.tv/embed/chiikubi/chat?darkpopout"
      frameborder="0" scrolling="no" height="100%" width="100%"></iframe>
    </div>
  </div>

  <div id="content">
    <section id="gamelist_display_user">
      <h3 class="title_menu"> Gamelist </h3>
      <?php
          while ($data = $games->fetch())
          {
          ?>

          <div class="gamelist_poster">
            <img src="public/image/gamelist/<?=$data['game_image']?>" />
            <h3><?= htmlspecialchars_decode(nl2br(html_entity_decode($data['game_name']))) ?></h3>
          </div>
          <?php
          }
          $games->closeCursor();
          ?>
    </section>


    <section id="whoami_display">
      <h3 class="title_menu"> Qui suis-je ?</h3>
      <p><?= htmlspecialchars_decode(nl2br(html_entity_decode( $menu1['item_description']))) ?><p>
    </section>


    <section id="setup_display">
      <h3 class="title_menu"> Mon Setup</h3>
      <p><?= htmlspecialchars_decode(nl2br(html_entity_decode( $menu2['item_description']))) ?><p>
    </section>


    <section id="contact_form_display">
      <h3 class="title_menu">Contact</h3>
      <?php include('contact_form.php');?>
    </section>

  </div>

  <div id="btn-box">
    <div class="btn-line"><i class="fab fa-twitch fa-3x"></i> <p class="desc-btn">Subscribe Twitch</p></div>
    <div class="btn-line"><i class="fas fa-gift fa-3x"></i> <p class="desc-btn">donation</p></div>
    <div class="btn-line"><i class="fas fa-video fa-3x"></i> <p class="desc-btn">collections</p></div>
  </div>
</section>


<script type="text/javascript" src="public/js/event.js"></script>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
