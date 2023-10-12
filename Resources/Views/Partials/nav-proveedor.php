<?php
$usuario = unserialize($_SESSION['usuario']);
?>
<nav class="navigation__menu f-row align-center">
  <a href="<?= PUBLIC_PATH ?>" class="menu-link">Proveedor</a>
  <a href="<?= PUBLIC_PATH ?>/<?= $usuario->getId(); ?>/lotes"
    class="menu-link">Mis
    lotes</a>
  <a href="<?= PUBLIC_PATH ?>/perfil" class="menu-link">Mi perfil</a>
  <a href="<?= PUBLIC_PATH ?>/home/logout" class="menu-link">Cerrar sesión</a>
</nav>