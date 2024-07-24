<?php $title = 'Chatapp - Room'; ?>

<?php ob_start(); ?>

<style>
  #message-area {
    max-height: 50vh;
  }
</style>
<main>
  <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-center mb-5">
      <div>
        <h1><?= $room['name']; ?></h1>
        <p class="text-secondary"><?= $room['description']; ?></p>
      </div>
      <div>
        <img class="rounded-circle" width="100px" height="100px" src="<?= $room['image'] ?>" alt="room image">
      </div>
    </div>

    <?php if ($room['created_by'] === $_SESSION['USER']['id']): ?>
      <div class="text-end">
        <form method="POST" action="/delete-room?id=<?= $room['id'] ?>">
          <button type="submit" class="btn btn-danger mb-4">Delete Room</button>
        </form>
      </div>
    <?php endif ?>
    <div class="card border">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title">Chat</h5>

      </div>
      <div class="card-body overflow-auto d-flex flex-column-reverse" id="message-area">
        <?php foreach ($messages as $message) { ?>
          <?php if ($message['sender_id'] === $_SESSION['USER']['id']) { ?>
            <div class="d-flex mb-3 justify-content-end ">
              <div class="card text-end">
                <div class="p-2">
                  <span class="card-title fs-6 fst-italic text-success">You</span>
                  <p class="card-text"><?= $message['content'] ?></p>
                </div>
              </div>
              <img src="<?= $message['image'] ?? '/assets/images/blank-profile-picture.png' ?>" width="32" height="32"
                class="rounded-circle ms-2" alt="Profile image">
            </div>
          <?php } else { ?>
            <div class="d-flex mb-3 ">
              <img src="<?= $message['image'] ?? '/assets/images/blank-profile-picture.png' ?>" width="32" height="32"
                class="rounded-circle me-2" alt="Profile image">
              <div class="card bg-secondary text-light">
                <div class="p-2">
                  <span class="card-title fs-6 fst-italic text-warning"><?= $message['username'] ?></span>
                  <p class="card-text"><?= $message['content'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>

      </div>
      <div class="card-footer">

        <form action="/room?id=<?= $room['id'] ?>&action=add-message" method="POST">
          <div class="input-group">
            <input type="text" name="message" class="form-control" id="message-input" placeholder="Type your message..."
              autofocus required>
            <button type="submit" class="btn btn-primary" id="send-button">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>


<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>