<?php $title = 'Chatapp - Rooms'; ?>

<?php ob_start(); ?>



<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($rooms as $room): ?>
      <div class="col" id="card">
        <div class="card shadow-sm ">
          <img src="<?= $room['image'] ?>" width="200px" height="300px" class="card-img-top" alt="Room image">
          <div class="card-body">
            <h5 class="card-title"><?= $room['name'] ?></h5>
            <p class="card-text"><?= $room['description'] ?></p>
            <a href="<?= isset($_SESSION['USER']) ? '/room?id=' . $room['id'] : '/login'; ?>"
              class="btn btn-md btn-outline-primary float-end ">Join</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>