<?php
$navUsuario = sessionUsuario();
?>
<nav class="navigation__menu f-row align-center">
  <a href="<?= PUBLIC_PATH ?>" class="menu-link"><svg
      xmlns="http://www.w3.org/2000/svg"
      class="icon icon-tabler icon-tabler-gavel" width="24" height="24"
      viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
      stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path
        d="M13 10l7.383 7.418c.823 .82 .823 2.148 0 2.967a2.11 2.11 0 0 1 -2.976 0l-7.407 -7.385">
      </path>
      <path d="M6 9l4 4"></path>
      <path d="M13 10l-4 -4"></path>
      <path d="M3 21h7"></path>
      <path
        d="M6.793 15.793l-3.586 -3.586a1 1 0 0 1 0 -1.414l2.293 -2.293l.5 .5l3 -3l-.5 -.5l2.293 -2.293a1 1 0 0 1 1.414 0l3.586 3.586a1 1 0 0 1 0 1.414l-2.293 2.293l-.5 -.5l-3 3l.5 .5l-2.293 2.293a1 1 0 0 1 -1.414 0z">
      </path>
    </svg>Remates</a>
  <a href="<?= PUBLIC_PATH ?>/admin/clientes" class="menu-link"><svg
      xmlns="http://www.w3.org/2000/svg"
      class="icon icon-tabler icon-tabler-users" width="24" height="24"
      viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
      stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
      <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
      <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
    </svg>Clientes</a>
  <a href="<?= PUBLIC_PATH ?>/admin/proveedores" class="menu-link"><svg
      xmlns="http://www.w3.org/2000/svg"
      class="icon icon-tabler icon-tabler-users-group" width="24" height="24"
      viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
      stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
      <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
      <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
      <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
      <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
      <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
    </svg>Proveedores</a>
  <a href="<?= PUBLIC_PATH ?>/perfil/<?= $navUsuario->getId(); ?>"
    class="menu-link"><svg xmlns="http://www.w3.org/2000/svg"
      class="icon icon-tabler icon-tabler-user" width="24" height="24"
      viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
      stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
      <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
    </svg>Perfil</a>
  <a href="<?= PUBLIC_PATH ?>/usuario/logout" class="menu-link">Salir<svg
      xmlns="http://www.w3.org/2000/svg"
      class="icon icon-tabler icon-tabler-logout" width="24" height="24"
      viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
      stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
      <path
        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
      </path>
      <path d="M9 12h12l-3 -3"></path>
      <path d="M18 15l3 -3"></path>
    </svg></a>
</nav>