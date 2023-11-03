<?php
?>
<div class="card-remate">
  <img class="card-remate__image"
    src="<?= $administrador->getUsuario()->getImagen(); ?>"
    alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title"><?= $administrador->getNombre(); ?>
      <?= $administrador->getApellido(); ?></h2>
    <p class="card-remate__data"><b>Usuario:
      </b><?= $administrador->getUsuario()->getUsername(); ?></p>
    <p class="card-remate__data"><b>e-mail:
      </b><?= $administrador->getUsuario()->getEmail(); ?></p>
    <p class="card-remate__data"><b>Estado:
      </b><span><?= $administrador->getEstado(); ?></span>
    </p>
  </div>
  <div class="card-remate__button">
    <a class="eliminarUsuario"
      href="<?= PUBLIC_PATH ?>/perfil/eliminar/<?= $administrador->getUsuario()->getId(); ?>"
      class="link">Eliminar</a>
  </div>
  <div class="card-remate__button">
    <a href="<?= PUBLIC_PATH ?>/perfil/<?= $administrador->getUsuario()->getId(); ?>"
      class="link">Ver detalles</a>
  </div>
</div>