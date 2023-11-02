<?php
$navUsuario = sessionUsuario();
?>
<nav class="navigation__menu f-row align-center">
  <a href="<?= PUBLIC_PATH ?>" class="menu-link">Cliente</a>
  <a href="<?= PUBLIC_PATH ?>" class="menu-link">Remates</a>
  <a href="<?= PUBLIC_PATH ?>/mis-pujas" class="menu-link">Mis pujas</a>
  <a href="<?= PUBLIC_PATH ?>/perfil/<?= $navUsuario->getId(); ?>"
    class="menu-link">Mi perfil</a>
  <a href="<?= PUBLIC_PATH ?>/usuario/logout" class="menu-link">Cerrar
    sesión</a>
</nav>