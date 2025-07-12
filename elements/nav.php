<?php
session_start();
require_once __DIR__ . '/../reactor.php';

if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM punishments WHERE user_id = ? ORDER BY created_at DESC LIMIT 1");
    $stmt->execute([$_SESSION['user_id']]);
    $punishment = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($punishment) {
        $now = new DateTime();
        $created = new DateTime($punishment['created_at']);

        if ($punishment['duration'] !== 'perm' && $punishment['duration'] !== 'n/a') {
            $intervalSpec = match ($punishment['duration']) {
                '1d' => 'P1D',
                '7d' => 'P7D',
                '14d' => 'P14D',
                default => null
            };
            $expiry = $created->add(new DateInterval($intervalSpec));
            if ($now > $expiry) {
                $pdo->prepare("DELETE FROM punishments WHERE id = ?")->execute([$punishment['id']]);
            } else {
                $_SESSION['punishment'] = $punishment;
            }
        } elseif ($punishment['duration'] === 'perm' || $punishment['type'] === 'warn') {
            $_SESSION['punishment'] = $punishment;
        }
    }
}
$allowed = ['disabled.php', 'logout.php', 'login.php', 'register.php'];


if (
    isset($_SESSION['punishment']) &&
    !in_array(basename($_SERVER['PHP_SELF']), $allowed)
) {
    header('Location: /disabled');
    exit;
}
?>

<body class="vh-100 d-flex flex-column">
<nav class="navbar navbar-expand-lg bg-body-secondary shadow-sm">
  <div class="container-fluid px-3">
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img src="/img/nova4th.png" alt="Logo" style="height: 28px;" class="me-2">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left-side links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="/games">
            <i class="fa-regular fa-gamepad-alt me-2"></i> Games
          </a>
        </li>
        <?php if (empty($_SESSION['is_guest'])): ?>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center" href="/catalog">
            <i class="fa-regular fa-shirt me-2"></i> Catalog
          </a>
        </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center" href="/create">
      <i class="fa-regular fa-hammer me-2"></i> Create
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link d-flex align-items-center" href="/robux">
      <i class="fa-regular fa-coins me-2"></i> ROBUX
    </a>
  </li>
<?php endif; ?>
      </ul>

      <?php if (isset($_SESSION['user_id'])): ?>
        <ul class="navbar-nav d-flex align-items-center">
          <?php if (empty($_SESSION['is_guest'])): ?>
          <li class="nav-item me-3">
            <span class="nav-link d-flex align-items-center">
              <i class="fa-regular fa-dollar-sign me-1 text-success"></i>
              <?= $_SESSION['novabux'] ?? 0 ?>
            </span>
          </li>
          <?php endif; ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
              <img src="/img/Render.png" alt="Avatar" class="rounded-circle me-2" width="20" height="20">
              <span><?= htmlspecialchars($_SESSION['username']) ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
              <li>
                <a class="dropdown-item" href="/settings">
                  <i class="fa-regular fa-gear me-2"></i> Settings
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item text-danger" href="/auth/logout">
                  <i class="fa-regular fa-right-from-bracket me-2"></i> Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      <?php else: ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="/auth/login">
              <i class="fa-regular fa-right-to-bracket me-2"></i> Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="/auth/register">
              <i class="fa-regular fa-user-plus me-2"></i> Register
            </a>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>

<?php if (isset($_SESSION['user_id'])): ?>
  <div class="d-flex flex-grow-1">
  <div class="d-flex flex-column p-3 bg-body-tertiary" style="width: 200px;">
    <ul class="navbar-nav flex-column">
      <li class="nav-item mb-1">
        <a class="nav-link py-1" href="/home"><i class="fa-regular fa-home me-2"></i>Home</a>
      </li>
      <?php if (empty($_SESSION['is_guest'])): ?>
  <li class="nav-item mb-1">
    <a class="nav-link py-1" href="/user/<?= $_SESSION['user_id']; ?>">
      <i class="fa-regular fa-user me-2"></i>Profile
    </a>
  </li>
  <li class="nav-item mb-1">
    <a class="nav-link py-1" href="/my/avatar"><i class="fa-regular fa-tshirt me-2"></i>Avatar</a>
  </li>
  <li class="nav-item mb-1">
    <a class="nav-link py-1" href="/my/inventory"><i class="fa-regular fa-backpack me-2"></i>Inventory</a>
  </li>
<?php endif; ?>

      <li class="nav-item mb-1">
        <a class="nav-link py-1" href="/my/feed"><i class="fa-regular fa-messages me-2"></i>Feed</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link py-1" href="/blog"><i class="fa-regular fa-notes me-2"></i>Blog</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link py-1" href="/sitemap"><i class="fa-regular fa-diagram-project me-2"></i>Sitemap</a>
      </li>
      <li class="nav-item mb-1">
        <a class="nav-link py-1" href="/download"><i class="fa-regular fa-download me-2"></i>Download</a>
      </li>
    </ul>
    <small class="mt-3 text-muted">yes the icons arent the same width/size/??? there's nothing i can do</small>
  </div>

  <?php endif; ?>