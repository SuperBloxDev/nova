<script>
const imageSrc = "/img/74_sin_titulo_20250712211242.png";
const minTime = 100;
const maxTime = 1000;

function createImage() {
    const img = document.createElement("img");
    img.src = imageSrc;
    img.style.position = "absolute";
    img.style.width = "100px";
    img.style.height = "auto";
    img.style.zIndex = 9999;

    const x = Math.floor(Math.random() * (window.innerWidth - 100));
    const y = Math.floor(Math.random() * (window.innerHeight - 100));
    img.style.left = `${x}px`;
    img.style.top = `${y}px`;

    document.body.appendChild(img);
}

function spawnImagesRandomly() {
    createImage();

    const nextInterval = Math.floor(Math.random() * (maxTime - minTime + 1)) + minTime;
    setTimeout(spawnImagesRandomly, nextInterval);
}

window.onload = () => {
    spawnImagesRandomly();
};
</script>


<div class="position-fixed bottom-0 start-0 p-3 d-flex flex-column gap-2" style="z-index: 1080">

<?php if (!empty($_SESSION['is_guest'])): ?>
<div class="toast show align-items-center text-light bg-black border-0 small rounded-0"
     role="alert" aria-live="assertive" aria-atomic="true"
     style="font-family: 'JetBrains Mono', monospace; width: 250px;">
  <div class="d-flex">
    <div class="toast-body d-flex">
      <i class="fa-solid fa-user-secret me-2 text-danger mt-1"></i>
      <div>
        <strong>In Guest mode</strong><br>
        <small class="text-muted">as <?= htmlspecialchars($_SESSION['username']) ?></small>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

  <div class="toast show align-items-center text-dark bg-warning border-0 small rounded-0" role="alert" aria-live="assertive" aria-atomic="true"
    style="font-family: 'JetBrains Mono', monospace; width: 250px;">
    <div class="d-flex">
      <div class="toast-body">
        <i class="fa-solid fa-triangle-exclamation me-2 text-dark"></i>
        <strong>Under development</strong>
      </div>
    </div>
  </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>