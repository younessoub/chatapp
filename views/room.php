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
      <div class="mb-4">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Delete Room
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are You Sure you want to permanently delete this room?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <div>
                  <form method="POST" action="/delete-room?id=<?= $room['id'] ?>">
                    <button type="submit" class="btn btn-danger">Delete Room</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
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