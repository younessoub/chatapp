<?php $title = 'Chatapp - Home'; ?>

<?php ob_start(); ?>

<main>
  <h1>Homepage</h1>
  <?php echo $_SESSION['USER']['username'] ?? 'Not logged in' ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>