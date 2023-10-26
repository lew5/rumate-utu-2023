<?php
$navUsuario = sessionUsuario();
?>
<nav class="navigation__menu f-row align-center">
  <span href="" class="menu-link">Root</span>
  <a href="<?= PUBLIC_PATH ?>" class="menu-link">Remates</a>
  <a href="<?= PUBLIC_PATH ?>/admin/clientes" class="menu-link">Empleados</a>
  <a href="<?= PUBLIC_PATH ?>/admin/clientes" class="menu-link">Clientes</a>
  <a href="<?= PUBLIC_PATH ?>/admin/proveedores"
    class="menu-link">Proveedores</a>
  <a href="<?= PUBLIC_PATH ?>/perfil/<?= $navUsuario->getUsername(); ?>"
    class="menu-link">Mi perfil</a>
  <a href="<?= PUBLIC_PATH ?>/usuario/logout" class="menu-link">Cerrar
    sesión</a>
</nav>