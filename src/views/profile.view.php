<?php $title = 'Chatapp - Profile'; ?>

<?php ob_start(); ?>

<main>
  <div class="container">
    <h1>Profile</h1>
    <h2 class="text-secondary">Hello <?php echo $_SESSION['USER']['username'] ?></h2>
    <section class="mt-5">
      <div>
        <img class="rounded-circle" width="100px" height="100px"
          src="<?= $_SESSION['USER']['image'] ?? '/assets/images/blank-profile-picture.png'; ?>" alt="avatar">
      </div>


      <div class="my-5" style="max-width:400px">
        <form action="/profile?action=update-image" method="POST" enctype="multipart/form-data">
          <div>
            <label for="formFile" class="form-label">Update Profile Image</label>
            <input class="form-control <?= (isset($imageErr) && !empty($imageErr)) ? 'is-invalid' : '' ?>"
              name="profile-image" type="file" id="formFile" accept="image/png, image/jpeg" required>
            <?php if (isset($imageErr) && !empty($imageErr)): ?>
              <div class="invalid-feedback">
                <?= $imageErr ?>
              </div>
            <?php endif ?>
          </div>
          <div class="mt-3">
            <button class="btn btn-primary" type="submit">Update</button>
          </div>
        </form>
      </div>
      <?php if (!empty($_SESSION['USER']['image'])): ?>
        <div class="my-5" style="max-width:400px">
          <form action="/profile?action=delete-image" method="POST">
            <div>
              <label for="formFile" class="form-label">Delete Profile Image</label>
            </div>
            <div class="mt-3">
              <button class="btn btn-danger" type="submit">Delete</button>
            </div>
          </form>
        </div>
      <?php endif ?>
    </section>

    <section>
      <h3>My Rooms</h3>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($userRooms as $room): ?>
          <div class="col" id="card">
            <div class="card shadow-sm ">
              <img src="<?= $room['image'] ?>" width="200px" height="300px" class="card-img-top" alt="Room image">
              <div class="card-body">
                <h5 class="card-title"><?= $room['name'] ?></h5>
                <p class="card-text"><?= $room['description'] ?></p>
                <a href="<?= isset($_SESSION['USER']) ? '/room?id=' . $room['id'] : '/login'; ?>"
                  class="btn btn-md btn-outline-primary float-end ">Enter</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </section>
  </div>

</main>

<?php $content = ob_get_clean(); ?>
<?php require '../src/views/layout.php'; ?>