<?php
    while ($data = $menus->fetch())
    {
    ?>
    <a  href="index.php?action=menu&amp;id=<?= $data['id'] ?>"> <h3 class="menu-btn"><?= htmlspecialchars_decode(nl2br(html_entity_decode($data['item_name']))) ?></h3></a> <br />
    <?php
    }
    $menus->closeCursor();
    ?>
