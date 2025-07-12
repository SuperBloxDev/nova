<?php
include __DIR__ . '/elements/hd.php';
include __DIR__ . '/elements/nav.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}

require_once __DIR__ . '/reactor.php';
?>
<main class="flex-grow-1 p-4 overflow-auto container mt-5">
  <div class="container">
    <div class="row mb-4">
      <div class="col-md-9 mb-3">
        <img src="https://media.discordapp.net/attachments/1390692217131372725/1390716904984940727/noFilter_1.webp?ex=6869458c&is=6867f40c&hm=81274da896e11d657a9be19a3b1a7637a06ed861ee195fd0d1763bbb446f8215&=&format=webp&width=691&height=389" class="img-fluid rounded shadow-lg w-100" alt="idk">
      </div>

      <div class="col-md-3">
        <h2 class="h4">umm</h2>
        <p class="mb-2 text-muted">By <a href="#" class="link-primary">somebody</a></p>

        <div class="mb-3 d-grid">
          <button class="btn btn-success bg-gradient fw-semibold btn-lg"><i class="fa-solid fa-play fa-sm me-2"></i>Play</button>
        </div>

        <div class="mb-3 d-flex gap-2">
          <button class="btn btn-primary btn-sm flex-fill">
            <i class="fa-regular fa-star me-1"></i>
          </button>
          <button class="btn btn-secondary btn-sm flex-fill">
            <i class="fa-regular fa-bookmark me-1"></i>
          </button>
        </div>

        <div class="row text-center mt-3">
          <div class="col text-success">
            <i class="fa fa-thumbs-up fa-lg mb-1"></i><br>
            <strong>123</strong>
          </div>
          <div class="col text-danger">
            <i class="fa fa-thumbs-down fa-lg mb-1"></i><br>
            <strong>12</strong>
          </div>
        </div>
      </div>
    </div>

    <nav class="nav nav-pills flex-column flex-sm-row mb-3" id="gameTab" role="tablist">
      <a class="flex-sm-fill text-sm-center nav-link active" id="about-tab" data-bs-toggle="pill" href="#about" role="tab">About</a>
      <a class="flex-sm-fill text-sm-center nav-link" id="comments-tab" data-bs-toggle="pill" href="#comments" role="tab">Comments</a>
      <a class="flex-sm-fill text-sm-center nav-link" id="servers-tab" data-bs-toggle="pill" href="#servers" role="tab">Servers</a>
    </nav>

    <div class="tab-content p-3" id="gameTabContent">
      <div class="tab-pane show active" id="about" role="tabpanel">
        <h5 class="fw-light mb-2">Description</h5>
        <p>idk</p>
        <div class="card">
          <div class="card-body text-center">
            <div class="row">
                <div class="col-3"><p class="fw-semibold mb-1 mt-1"><i class="fa-regular fa-calendar-plus me-2 text-muted"></i>Created</p><p class="text-muted mb-1">July 1, 2025</p></div>
                <div class="col-3"><p class="fw-semibold mb-1 mt-1"><i class="fa-regular fa-calendar-check me-2 text-muted"></i>Updated</p><p class="text-muted mb-1">July 4, 2025</p></div>
                <div class="col-3"><p class="fw-semibold mb-1 mt-1"><i class="fa-regular fa-eye me-2 text-muted"></i>Visits</p><p class="text-muted mb-1">July 3, 2025</p></div>
                <div class="col-3"><p class="fw-semibold mb-1 mt-1"><i class="fa-regular fa-users me-2 text-muted"></i>Server Size</p><p class="text-muted mb-1">July 1, 2025</p></div>
</div>
</div>
          </div>
      </div>

<div class="tab-pane" id="comments" role="tabpanel">
        <h5 class="fw-light mb-2">Comments</h5>
  <form class="mb-4 d-flex flex-column flex-sm-row gap-2 align-items-start">
    <img src="/img/Render.png" alt="Avatar" class="rounded bg-gradient" height="50">
    <div class="w-100">
      <textarea class="form-control mb-2" rows="3" placeholder="This sucks."></textarea>
      <div class="text-end">
        <button type="submit" class="btn btn-primary btn-sm">Post</button>
      </div>
    </div>
  </form>

  <div class="list-group rounded-0">
    <div class="list-group-item text-center text-muted fst-italic py-5">
        <i class="fa-duotone fa-comments-alt fa-2x mb-2"></i><br>
      No comments yet. Be the first one to say something!
    </div>
  </div>
</div>


      <div class="tab-pane" id="servers" role="tabpanel">
        <h5 class="fw-light mb-2">Servers</h5>
        <div class="alert py-2 fw-semibold bg-warning bg-gradient text-dark"><span class="me-2">⚠️</span>No public servers are currently running.</div>
      </div>
    </div>
  </div>
  <?php include __DIR__ . '/elements/ftr.php'; ?>
</main>
