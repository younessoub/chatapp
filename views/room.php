<?php $title = 'Chatapp - Room'; ?>

<?php ob_start(); ?>

<main>
  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-5">
      <div>
        <h1><?= $room['name']; ?></h1>
        <p class="text-secondary"><?= $room['description']; ?></p>
      </div>
      <div>
        <img class="rounded-circle" width="100px" height="100px" src="<?= $room['image'] ?>" alt="oom image">
      </div>
    </div>
    <div class="card border">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title">Chat</h5>

      </div>
      <div class="card-body overflow-auto" id="message-area">
        <div class="d-flex mb-3">
          <img src="assets/images/blank-profile-picture.png" width="32" height="32" class="rounded-circle me-2"
            alt="Profile image">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Username</h5>
              <p class="card-text">This is a message from Username.</p>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3 justify-content-end">
          <div class="card text-end">
            <div class="card-body">
              <h5 class="card-title">You</h5>
              <p class="card-text">This is your reply message.</p>
            </div>
          </div>
          <img src="assets/images/blank-profile-picture.png" width="32" height="32" class="rounded-circle ms-2"
            alt="Profile image">
        </div>
      </div>
      <div class="card-footer">
        <div class="input-group">
          <input type="text" class="form-control" id="message-input" placeholder="Type your message...">
          <button class="btn btn-primary" id="send-button">Send</button>
        </div>
      </div>
    </div>
  </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>