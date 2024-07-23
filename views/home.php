<?php $title = 'Chatapp - Home'; ?>

<?php ob_start(); ?>

<main>
  <div class="container">
    <h1>Homepage</h1>
  </div>
  <?php echo $_SESSION['USER']['username'] ?? 'Not logged in' ?>
</main>

<!-- Footer -->
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">&copy; 2024 Chatapp</p>

    <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <img class="img-fluid" src="assets/images/logo.png" width="100px" alt="logo">
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul>
  </footer>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>