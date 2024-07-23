<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"
    defer></script>
  <style>
    body {
      background-color: #f5f5f5;
    }
  </style>

</head>

<body>

  <!-- Header -->
  <div class="container">
    <header
      class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img class="img-fluid" src="assets/images/logo.png" width="100px" alt="logo">
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li>
          <a href="index.php" class="nav-link px-2 <?= !isset($_GET['page']) ? 'active' : 'link-dark' ?>">Home</a>
        </li>
        <li>
          <a href="index.php?page=profile"
            class="nav-link px-2  <?= isset($_GET['page']) && $_GET['page'] === 'profile' ? 'active' : 'link-dark' ?>">Profile</a>
        </li>
        <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
      </ul>
      <?php if (isset($_SESSION['USER'])) { ?>
        <div class="d-flex justify-content-between align-items-center gap-3">
          <div>
            <a href="index.php?page=profile">
              <img class="rounded-circle" width="40px"
                src="<?= $_SESSION['USER']['image'] ?? 'assets/images/blank-profile-picture.png'; ?>" alt="avatar">
            </a>
          </div>
          <div class="text-end">
            <a href="index.php?page=login&action=logout-user" class="btn btn-primary">Log out</a>
          </div>
        </div>
      <?php } else { ?>
        <div class="col-md-3 text-end">
          <a href="index.php?page=login" class="btn btn-outline-primary me-2">Login</a>
          <a href="index.php?page=signup" class="btn btn-primary">Sign-up</a>
        </div>
      <?php } ?>
    </header>
  </div>

  <!-- Main -->

  <?= $content ?>


</body>

</html>