<?php
?>
<div class="card-remate">
  <img class="card-remate__image" src="<?= $cliente->getImagen(); ?>"
    alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title"><?= $cliente->getUsername(); ?></h2>
    <p class="card-remate__data"><b>e-mail:
      </b><?= $cliente->getEmail(); ?></p>
    <p class="card-remate__data"><b>Tipo:
      </b><span><?= $cliente->getTipo(); ?></span>
    </p>
  </div>
  <?php if (sessionAdmin() || sessionRoot()) { ?>
    <div class="card-remate__button">
      <a href="<?= PUBLIC_PATH ?>/admin/remate/editar/<?= $cliente->getId(); ?>"
        class="link">Editar</a>
    </div>
  <?php } ?>
  <div class="card-remate__button">
    <a href="<?= PUBLIC_PATH ?>/perfil/<?= $cliente->getId(); ?>"
      class="link">Ver detalles</a>
  </div>
</div>