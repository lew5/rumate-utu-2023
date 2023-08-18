<main class="login-register f-row">
  <div class="login-register__container">
    <div class="login-register-form-wrap">
      <form class="login-register__form f-column" action="" method="POST"
        autocomplete="off">
        <?php view("partials/login-register/login-register__header.php", [
          'title' => $title,
          'description' => $description
        ]) ?>