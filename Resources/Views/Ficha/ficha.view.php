<div class="remate-lote-container f-column">
  <div class="lote-details f-row">
    <div class="lote-image">
      <?php if ($idRemate == 1): ?>
        <iframe width="720" height="480"
          src="https://www.youtube.com/embed/o0a_ctFHyv0?si=y7K3457laHYNK5OD"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
      <?php elseif ($idRemate == 2): ?>
        <iframe width="720" height="480"
          src="https://www.youtube.com/embed/sVzRjxupRts?si=ZYof6OUL3BLNyvgH&amp;start=1406"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
      <?php else: ?>
        <img src="<?= PUBLIC_PATH ?>/Public/imgs/Lote/lote-no-image.webp"
          alt="Imagen del lote" height="480px" width="720px" />
      <?php endif; ?>
    </div>
    <div class="lote-info f-column">
      <div class="highest-offer">
        <span class="highest-offer__title">Mejor oferta</span>
        <h3>U$S <span id="mejor_oferta" class="highest-offer__value"><?php
        if ($lote->getPrecioBase() > $lote->getMejorOferta()) {
          print($lote->getPrecioBase());
        } else {
          print($lote->getMejorOferta());
        }
        ?></span>
        </h3>
        <div class="highest-offer-by">
          <p>Mejor oferta realizada por:</p>
          <a <?php if ((sessionAdmin() || sessionRoot()) && is_array($ofertaDe)): ?>
              href="<?= PUBLIC_PATH ?>/perfil/<?= $ofertaDe['id_usuario']; ?>"
            <?php endif; ?>><span id="highest-offer-by__username"><?php
              if (is_array($ofertaDe)) {
                print($ofertaDe['username_usuario']);
              } else {
                print($ofertaDe);
              } ?></span></a>
        </div>
      </div>
      <?php if ($finalizado): ?>
        <div class="lote-no-auth">
          <?php if (sessionUsuario()): ?>
            <?php if (sessionAdmin() || sessionRoot()): ?>
              <?php if (is_array($ofertaDe)): ?>
                <div class="ganador-lote">
                  <span>
                    Lote vendido.
                  </span>
                </div>
              <?php else: ?>
                <div class="perdedor-lote">
                  <span>
                    Lote no vendido.
                  </span>
                </div>
              <?php endif; ?>
            <?php else: ?>
              <?php if (is_array($ofertaDe) && sessionUsuario()->getId() == $ofertaDe['id_usuario']): ?>
                <div class="ganador-lote">
                  <span>
                    Este lote te pertenece.
                  </span>
                </div>
              <?php else: ?>
                <div class="perdedor-lote">
                  <span>
                    Lote perdido.
                  </span>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
          <span>El remate por este lote ha finalizado el <?= $fechaFinal ?>
            hs.</span>
        </div>
      <?php elseif ($pendiente): ?>
        <div class="lote-no-auth">
          <span>El remate por este lote inicia el <?= $fechaInicio ?>
            hs.</span>
        </div>
      <?php else: ?>
        <?php if (sessionUsuario()) {
          if (sessionAdmin() || sessionRoot()) { ?>
            <div class="lote-no-auth">
              <span>Los administradores no pueden participar</span>
            </div>
            <form action="" method="POST" hidden>
              <input type="hidden" id="id_remate" value="<?= $idRemate ?>">
              <input type="hidden" id="id_lote" value="<?= $lote->getId() ?>">
              <input type="hidden" id="id_usuario"
                value="<?= sessionUsuario()->getId(); ?>">
              <div class="custom-input-step">
                <input id="minusButton" type="button"
                  class="button__input custom-input-step__btn--minus" />
                <div class="custom-input-step__value">
                  <input id="offer_value" type="number"
                    class="custom-input-step__input" disabled autocomplete="off" />
                </div>
                <input id="plusButton" type="button"
                  class="button__input custom-input-step__btn--plus" />
              </div>
              <div class="button">
                <input id="ofertar-btn" class="button__input" type="button"
                  value="OFERTAR" disabled />
              </div>
            </form>
          <?php } else { ?>
            <div class="make-offer">
              <form action="" method="POST">
                <input type="hidden" id="id_remate" value="<?= $idRemate ?>">
                <input type="hidden" id="id_lote" value="<?= $lote->getId() ?>">
                <input type="hidden" id="id_usuario"
                  value="<?= sessionUsuario()->getId(); ?>">
                <div class="custom-input-step">
                  <input id="minusButton" type="button"
                    class="button__input custom-input-step__btn--minus" />
                  <div class="custom-input-step__value">
                    <input id="offer_value" type="number"
                      class="custom-input-step__input" disabled autocomplete="off" />
                  </div>
                  <input id="plusButton" type="button"
                    class="button__input custom-input-step__btn--plus" />
                </div>
                <div class="button">
                  <input id="ofertar-btn" class="button__input" type="button"
                    value="OFERTAR" disabled />
                </div>
              </form>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div class="lote-no-auth">
            <span>Debes iniciar sesión para poder participar</span>
            <a href="<?= PUBLIC_PATH ?>/login" class="button-link">Ingresar</a>
          </div>
        <?php } ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<div class="header">
  <div class="container-1024 f-row">
    <h2>Información del lote</h2>
  </div>
</div>
<style>
  .table {
    border-collapse: collapse;
    width: 100%;
  }

  .table tbody tr:nth-child(odd) {
    background-color: #e5f3e6;
  }

  .table th {
    padding: 10px;
    text-align: left;
  }

  .table td {
    padding: 10px;
    width: 420px;
    max-width: 420px;
  }

  .table-container {
    margin-bottom: 10rem;
  }
</style>
<div class="table-container">
  <table class="table">
    <tbody>
      <tr>
        <th>Proveedor</th>
        <td>
          <p><?= $lote->getProveedor()->getUsername(); ?></p>
        </td>
      </tr>
      <tr>
        <th>Precio base</th>
        <td>
          <p>$ <?= $lote->getPrecioBase(); ?></p>
        </td>
      </tr>
      <tr>
        <th>Categoría</th>
        <td>
          <p><?= $lote->getCategoria()->getNombre(); ?></p>
        </td>
      </tr>
      <tr>
        <th class="">Raza</th>
        <td>
          <p><?= $lote->getFicha()->getRaza(); ?></p>
        </td>
      </tr>
      <tr>
        <th>Peso Promedio</th>
        <td>
          <p><?= $lote->getFicha()->getPeso(); ?> kg</p>
        </td>
      </tr>
      <tr>
        <th>Cantidad</th>
        <td>
          <p><?= $lote->getFicha()->getCantidad(); ?></p>
        </td>
      </tr>
      <tr>
        <th>Descripción</th>
        <td>
          <p><?= $lote->getFicha()->getDescripcion(); ?></p>
        </td>
      </tr>
    </tbody>
  </table>
</div>