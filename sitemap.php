<?php
include "elements/hd.php"
?>
<main class="container mt-5">
  <h3>Sitemap</h3>
  <hr>
  <div class="row">
    <div class="col-md-4">
      <h4 class="fw-light font-monospace">/auth</h4>
      <ul>
        <li><a href="/auth/register">Register</a></li>
        <li><a href="/auth/login">Login</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <h4 class="fw-light font-monospace">/my</h4>
      <small class="text-muted">These are blank pages.</small>
      <ul>
        <li><a href="/my/feed">Feed</a></li>
        <li><a href="/my/avatar">Avatar</a></li>
        <li><a href="/my/inventory">Inventory</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <h4 class="fw-light font-monospace">/</h4>
      <ul>
        <li><a href="/" class="fw-bold">Welcome</a></li>
        <li><a href="/home">Home</a></li>
        <li><a href="/games">Games</a></li>
      </ul>
    </div>
  </div>
    <?php include __DIR__ . '/elements/ftr.php'; ?>

</main>