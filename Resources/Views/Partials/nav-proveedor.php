<?php
$usuario = unserialize($_SESSION['usuario']);
?>
<nav class="navigation__menu f-row align-center">
  <a href="/" class="menu-link">Proveedor</a>
  <a href="/<?= $usuario->getId(); ?>/lotes" class="menu-link">Mis
    lotes</a>
  <a href="/perfil" class="menu-link">Mi perfil</a>
  <a href="/home/logout" class="menu-link">Cerrar sesión</a>
</nav>