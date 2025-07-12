<?php
include __DIR__ . '/elements/hd.php';
include __DIR__ . '/elements/nav.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}
?>
<main class="flex-grow-1 p-4 overflow-auto">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
    <h1 class="fw-bold mb-0">Games</h1>
    <div class="input-group" style="max-width: 300px;">
      <input type="text" class="form-control" placeholder="Search..." aria-label="Search">
      <button class="btn btn-secondary" type="button"><i class="fa-regular fa-search"></i></button>
    </div>
  </div>

    <div class="mb-5">
    <h4 class="fw-bold mb-3">Popular Right Now</h4>

          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                  
<div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card text-white border-1 rounded-0 h-100">
              <img src="/img/games/b.png" class="card-img-top rounded-0" alt="Game Thumbnail">
              <div class="card-body px-3 py-2">
                <h6 class="card-title text-truncate mb-1">welcome to uh</h6>
                <p class="card-text small text-muted mb-0">By <span class="text-light">umm</span></p>
              </div>
              <div class="card-footer bg-transparent border-0 d-flex justify-content-between small text-muted px-3 pt-0">
                <span><i class="fa-regular fa-users me-1"></i>8</span>
                <span><i class="fa-regular fa-heart me-1"></i>60%</span>
              </div>
            </div>
          </div>
<div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card text-white border-1 rounded-0 h-100">
              <img src="/img/games/p.png" class="card-img-top rounded-0" alt="Game Thumbnail">
              <div class="card-body px-3 py-2">
                <h6 class="card-title text-truncate mb-1">preston life</h6>
                <p class="card-text small text-muted mb-0">By <span class="text-light">uuuhh</span></p>
              </div>
              <div class="card-footer bg-transparent border-0 d-flex justify-content-between small text-muted px-3 pt-0">
                <span><i class="fa-regular fa-users me-1"></i>-2000</span>
                <span><i class="fa-regular fa-heart me-1"></i>THEY FUCKING HATE IT</span>
              </div>
            </div>
          </div><div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <div class="card text-white border-1 rounded-0 h-100">
              <img src="/img/games/l.png" class="card-img-top rounded-0" alt="Game Thumbnail">
              <div class="card-body px-3 py-2">
                <h6 class="card-title text-truncate mb-1">lunch tycoon</h6>
                <p class="card-text small text-muted mb-0">By <span class="text-light">uhh</span></p>
              </div>
              <div class="card-footer bg-transparent border-0 d-flex justify-content-between small text-muted px-3 pt-0">
                <span><i class="fa-regular fa-users me-1"></i>8</span>
                <span><i class="fa-regular fa-heart me-1"></i>60%</span>
              </div>
            </div>
          </div>
              </div>
      </div>
  <div class="mb-5">
    <h4 class="fw-bold mb-3">Top Rated</h4>

          <div class="text-muted fst-italic">There are no games in this category yet.</div>
      </div>
  <div class="mb-5">
    <h4 class="fw-bold mb-3">Most Liked</h4>

          <div class="text-muted fst-italic">There are no games in this category yet.</div>
      </div>
  <div class="mb-5">
    <h4 class="fw-bold mb-3">Recently Updated</h4>

          <div class="text-muted fst-italic">There are no games in this category yet.</div>
      </div>
</main>
<?php include __DIR__ . '/elements/ftr.php'; ?> 