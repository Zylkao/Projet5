<?php $title="Liste des Membres"; ?>

<?php ob_start(); ?>

<section id="members_table">
  <table>
    <tr>
      <th>Identifiant</th>
      <th>email</th>
      <th>rôle</th>
      <th>Suppresion</th>
    </tr>

      <?php
          while ($data = $users->fetch())
          {
          ?>
          <tr class="table_line">
          <td><?= htmlspecialchars($data['pseudo']) ?></td>
          <td><?= htmlspecialchars($data['email']) ?></td>
          <td><?= htmlspecialchars($data['role']) ?></td>
          <?php
          if ($data['role'] == 'User')
            {
            ?>
            <td><a  id="delete_user" href="index.php?action=deleteUser&amp;id=<?= $data['user_id']?>">Supprimer</a></td>
            </tr>
            <?php
            }
          }
          $users->closeCursor();
          ?>
    </table>

</section>

<div id="pagination"> <?php echo $page ?> </div>


  <?php $content = ob_get_clean(); ?>

  <?php require('views/backend/template_admin.php'); ?>
