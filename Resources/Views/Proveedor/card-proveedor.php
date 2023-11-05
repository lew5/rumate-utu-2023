<?php
?>
<div class="card-remate">
  <img class="card-remate__image"
    src="<?= $proveedor->getUsuario()->getImagen(); ?>" alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title"><?= $proveedor->getNombre(); ?>
      <?= $proveedor->getApellido(); ?></h2>
    <p class="card-remate__data"><b>Usuario:
      </b><?= $proveedor->getUsuario()->getUsername(); ?></p>
    <p class="card-remate__data"><b>e-mail:
      </b><?= $proveedor->getUsuario()->getEmail(); ?></p>
    <p class="card-remate__data"><b>Estado:
      </b><span><?= $proveedor->getEstado(); ?></span>
    </p>
  </div>
  <div class="card-remate__button">
    <a href="<?= PUBLIC_PATH ?>/perfil/<?= $proveedor->getUsuario()->getId(); ?>"
      class="link">Ver detalles</a>
  </div>
</div>