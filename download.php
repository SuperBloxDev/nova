<?php
include __DIR__ . '/elements/hd.php';
include __DIR__ . '/elements/nav.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}
?>

<main class="flex-grow-1 p-4 overflow-auto">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Download</h2>
      <p class="text-muted">sample text sample text sample text bla bla</p>
    </div>

    <div class="row">
      
      <div class="col-md-4 mb-4">
        
            <h5 class="card-title d-flex align-items-center mb-4">
              <i class="fa-brands fa-microsoft fa-xl text-primary me-2"></i>Windows</h5>
            <a href="https://www.mediafire.com/file/m19j542dknkbepm/NOVA+BLOX+2011.zip/file" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-download me-2"></i>ZIP</a>

            <ul class="list-unstyled mt-3 text-muted small">
              <li><i class="fa-regular fa-xmark me-1 text-danger"></i> Multiplayer doesn't work<b>*</b></li>
              <li><i class="fa-regular fa-info-circle me-1 text-warning"></i> Contains 2011 client</li>
              <li><i class="fa-solid fa-check me-1 text-success"></i> Windows Vista</li>
              <li><i class="fa-solid fa-check me-1 text-success"></i> Windows 7</li>
              <li><i class="fa-solid fa-check me-1 text-success"></i> Windows 8</li>
              <li><i class="fa-solid fa-check me-1 text-success"></i> Windows 8.1</li>
              <li><i class="fa-solid fa-check me-1 text-success"></i> Windows 10</li>
              <li><i class="fa-solid fa-check me-1 text-success"></i> Windows 11</li>
            </ul>
      </div>

      
      
          <div class="col-md-4 mb-4">
            <h5 class="card-title d-flex align-items-center mb-4">
              <i class="fa-brands fa-android fa-xl text-success me-2"></i>Android</h5>
            <a href="https://www.mediafire.com/file/xdkwttvx911pqdw/com.roblox.client_2.251.78685-123_minAPI15(armeabi)(nodpi)_apkmirror.com.apk/file" class="btn btn-success w-100 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-download me-2"></i>APK</a>

            <ul class="list-unstyled mt-3 text-muted small">
              <li><i class="fa-regular fa-xmark me-1 text-danger"></i> Doesn't work</li>
              <li><i class="fa-regular fa-info-circle me-1 text-warning"></i> Contains 2016 client</li>
              <li><i class="fa-solid fa-check me-1 text-success"></i> Android 4.0.3+</li>
              
              
            </ul>
          </div>
                    <div class="col-md-4 mb-4">
            <h5 class="card-title d-flex align-items-center mb-4 text-muted">
              <i class="fa-solid fa-question me-2"></i>Other</h5>
            <a href="/downloads/NovaAndroid.apk" class="btn btn-secondary w-100 d-flex align-items-center justify-content-center disabled" disabled>
              <p class="card-text placeholder-wave">
      <span class="placeholder col-7"></span></p></a>

            <ul class="list-unstyled mt-3 text-muted small">
              <li><p class="card-text placeholder-wave">
      <span class="placeholder col-4"></span></p></li>
              
              
            </ul>
          </div>
    </div>
<hr>
<p class="p-4 text-muted">* - To fix multiplayer, go to <b>Tool -> Execute Script -> <code style="font-family:'JetBrains Mono'">playsolo.lua</code></p>
  </div>
<?php include __DIR__ . '/elements/ftr.php'; ?>
</main>