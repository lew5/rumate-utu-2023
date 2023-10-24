<?php
$usuario = sessionUsuario();
?>
<nav class="navigation__menu f-row align-center">
  <a href="<?= PUBLIC_PATH ?>" class="menu-link">Proveedor</a>
  <a href="<?= PUBLIC_PATH ?>/<?= $usuario->getUsername(); ?>/lotes"
    class="menu-link">Mis
    lotes</a>
  <a href="<?= PUBLIC_PATH ?>/perfil/<?= $usuario->getUsername(); ?>"
    class="menu-link">Mi perfil</a>
  <a href="<?= PUBLIC_PATH ?>/usuario/logout" class="menu-link">Cerrar
    sesión</a>
</nav>