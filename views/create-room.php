<?php $title = 'Chatapp - Create a room'; ?>

<?php ob_start(); ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1 class="h2 mb-4">Create a New Room</h1>
      <form action="/create-room" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="name" class="form-label">Room Name</label>
          <input type="text" class="form-control <?= $nameErr ? 'is-invalid' : '' ?>" id="roomName" name="name"
            required>
          <div class="invalid-feedback">
            <?= $nameErr ?? ''; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Short Description of the room</label>
          <textarea class="form-control <?= $descriptionErr ? 'is-invalid' : '' ?>" id="description" name="description"
            required rows="3"></textarea>
          <div class="invalid-feedback">
            <?= $descriptionErr ?? ''; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload room image</label>
          <input class="form-control <?= $imageErr ? 'is-invalid' : '' ?>" name="image" type="file" id="formFile"
            required accept="image/png, image/jpeg">
          <div class="invalid-feedback">
            <?= $imageErr ?? ''; ?>
          </div>
        </div>

        <div class="invalid-feedback">
          <?= $Err ?? ''; ?>
        </div>
        <button type="submit" class="btn btn-primary">Create Room</button>
      </form>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>