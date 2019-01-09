<!DOCTYPE html>

<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <meta name="Chiik'TV" content="Site officiel du streamer Chiik" />
  </head>

  <body>
    <section id="header">
      <img id="logo" src="public/image/chiikubi.png" alt="Logo de Chiik'Tv" />
      <?php include('views/frontend/connexion.php');?>
    </section>

    <?= $content ?>
  </body>

  <footer>
  </footer>
</html>
