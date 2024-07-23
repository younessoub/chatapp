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
  </div>

</main>

<?php $content = ob_get_clean(); ?>
<?php include 'views/layout.php'; ?>