<?php
$fecha = formatFecha($remate->fecha_remate, $remate->hora_remate);
?>
<div class="card-remate">
  <img class="card-remate__image" src="<?= $remate->img_remate; ?>"
    alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title"><?= $remate->titulo_remate; ?></h2>
    <p class="card-remate__data"><b>Fecha: </b><?= $fecha; ?> hs.</p>
    <p class="card-remate__data"><b>Estado:
      </b><span
        class="card-remate__estado--<?= $remate->estado_remate; ?>"><?= $remate->estado_remate; ?></span>
    </p>
  </div>
  <?php if (sessionAdmin() || sessionRoot()) { ?>
    <div class="card-remate__button">
      <a href="<?= PUBLIC_PATH ?>/remate/editar/<?= $remate->id_remate; ?>"
        class="link">Editar</a>
    </div>
  <?php } ?>
  <div class="card-remate__button">
    <a href="<?= PUBLIC_PATH ?>/remate/<?= $remate->id_remate; ?>"
      class="link">Ver
      remate</a>
  </div>
</div>