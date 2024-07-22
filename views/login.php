<?php $title = 'Chatapp - Login'; ?>

<?php ob_start(); ?>
<style>
  html,
  body {
    height: 100%;
  }

  body {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }

  .form {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
  }

  .form .checkbox {
    font-weight: 400;
  }

  .form .form-floating:focus-within {
    z-index: 2;
  }

  .form input {
    border-radius: 5px;
  }
</style>
<main class="form">
  <form action="?page=login&action=log-user" method="POST">
    <?php if (isset($_SESSION['SIGNUP_SUCCESS'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <?= $_SESSION['SIGNUP_SUCCESS'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
    <img class="mb-4 d-block mx-auto" src="assets/images/logo.png" alt="logo" width="120" height="80">
    <h1 class="h3 mb-3 fw-bold text-center">Login</h1>
    <?php if (isset($loginErr)): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <?= $loginErr ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
    <div class="form-floating mb-3">
      <input value="<?= $email ?? '' ?>" type="email" name="email"
        class="form-control <?= $emailErr ? 'is-invalid' : '' ?>" id="floatingInput" placeholder="name@example.com"
        required>
      <label for="floatingInput">Email address</label>
      <div class="invalid-feedback">
        <?= $emailErr ?? ''; ?>
      </div>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control <?= $passwordErr ? 'is-invalid' : '' ?>"
        id="floatingInput" placeholder="Password" required>
      <label for="floatingInput">Password</label>
      <div class="invalid-feedback">
        <?= $passwordErr ?? ''; ?>
      </div>
    </div>


    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    <p class="text-center mt-3 mb-3 text-muted">Not Registered? <a href="?page=signup">Sign Up</a></p>
  </form>
</main>

<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>