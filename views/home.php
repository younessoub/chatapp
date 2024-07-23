<?php $title = 'Chatapp - Home'; ?>

<?php ob_start(); ?>

<style>
  #card {
    cursor: pointer;
  }

  #card:hover {
    transform: scale(1.01);
    transition: .1s all;
  }

  .card-text {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
</style>
<main>

  <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-1 fw-bold mb-4">Chat App</h1>
    <p class="lead text-center">Connect and chat with friends in real-time!</p>
    <div class="d-flex justify-content-center">
      <a href="/create-room" class="btn btn-primary me-3 px-4">Create Room</a>
      <a href="#" class="btn btn-outline-primary px-4">Join Room</a>
    </div>
  </div>

  <div class="container mt-5">
    <h2 class="text-primary">Most Active Rooms</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($rooms as $room): ?>
        <div class="col" id="card">
          <div class="card shadow-sm ">
            <img src="<?= $room['image'] ?>" width="200px" height="300px" class="card-img-top" alt="Room image">
            <div class="card-body">
              <h5 class="card-title"><?= $room['name'] ?></h5>
              <p class="card-text"><?= $room['description'] ?></p>
              <a href="" class="btn btn-md btn-outline-primary float-end ">Join</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>

    <div class="text-end"><a href="#" class="btn btn-primary btn-lg mt-5 ">Explore More Rooms...</a></div>
  </div>
  <!-- <div class="container mt-3">
    <div class="card border">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title">Chat Window</h5>
        <span class="badge bg-primary rounded-pill">1</span>
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
  </div> -->
</main>


<?php $content = ob_get_clean(); ?>
<?php require 'views/layout.php'; ?>