<?php $title = "Administration"; ?>

<?php ob_start(); ?>



<body>
<div id="content_admin">
  <?php include('menu_admin.php');?>
</div>
</body>

<?php $content = ob_get_clean(); ?>

<?php require('views/backend/template_admin.php'); ?>
