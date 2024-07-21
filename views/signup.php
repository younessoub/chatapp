<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat App - Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"
    defer></script>


</head>

<body>
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
      margin-bottom: 10px;
      border-radius: 5px;
    }
  </style>
  <main class="form">
    <form action="?page=signup&action=create-user" method="POST">
      <img class="mb-4 d-block mx-auto" src="assets/img/logo.png" alt="logo" width="120" height="80">
      <h1 class="h3 mb-3 fw-bold text-center">Sign up</h1>

      <div class="form-floating">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com"
          required>
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password" required>
        <label for="floatingInput">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" name="passwordRepeat" class="form-control" id="floatingPassword" placeholder="Password"
          required>
        <label for="floatingPassword">Confirm Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" name="rememberMe"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
      <p class="text-center mt-3 mb-3 text-muted">Already Have an account? <a href="?action=login">Login</a></p>
    </form>
  </main>
</body>

</html>