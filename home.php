<?php
include __DIR__ . '/elements/hd.php';
include __DIR__ . '/elements/nav.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}
?>
<main class="flex-grow-1 p-4 overflow-auto">
  <h1>Hello, <b><?= htmlspecialchars($_SESSION['username']) ?></b>!</h1>

  <div class="d-flex justify-content-between align-items-center mt-4">
    <h3 class="fw-semibold mb-0">Friends</h3>
    <a href="/friends/find" class="btn btn-primary btn-sm">Find Friends</a>
  </div>
  <div class="card mt-3">
    <div class="card-body text-center text-muted py-5">
      <i class="fa-regular fa-user-friends fs-1 mb-3 d-block"></i>
      You have no friends yet.
    </div>
  </div>

  <h3 class="fw-semibold mt-5">Games</h3>
  <div class="card mt-3">
    <div class="card-body text-center text-muted py-5">
      <i class="fa-regular fa-gamepad-alt fs-1 mb-3 d-block"></i>
      You haven’t played any games yet.
    </div>
  </div>
</main>
<?php include __DIR__ . '/elements/ftr.php'; ?>
