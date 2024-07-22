<?php $title = 'Chatapp - Sign Up'; ?>

<?php ob_start(); ?>
<style>
  main {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
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
<main>
  <div class="form">

    <form action="index.php?page=signup&action=create-user" method="POST">
      <?php if (isset($signUpErr)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="bi bi-exclamation-triangle-fill"></i>
          <?= $signUpErr ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?>
      <img class="mb-4 d-block mx-auto" src="assets/images/logo.png" alt="logo" width="120" height="80">
      <h1 class="h3 mb-3 fw-bold text-center">Sign up</h1>
      <div class="form-floating mb-3">
        <input value="<?= $username ?? '' ?>" type="text" name="username"
          class="form-control <?= $usernameErr ? 'is-invalid' : '' ?>" id="floatingInput" placeholder="Username"
          required>
        <label for="floatingInput">Username</label>
        <div class="invalid-feedback">
          <?= $usernameErr ?? ''; ?>
        </div>
      </div>
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
      <div class="form-floating mb-3">
        <input type="password" name="passwordRepeat" class="form-control <?= $PasswordRepeatErr ? 'is-invalid' : '' ?>"
          id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Confirm Password</label>
        <div class="invalid-feedback">
          <?= $PasswordRepeatErr ?? ''; ?>
        </div>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
      <p class="text-center mt-3 mb-3 text-muted">Already Have an account? <a href="index.php?page=login">Login</a></p>
    </form>
  </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>