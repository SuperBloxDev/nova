<?php
session_start();
require_once __DIR__ . '/reactor.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['punishment'])) {
    header('Location: /');
    exit;
}

$p = $_SESSION['punishment'];
if ($p['type'] === 'warn' && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acknowledge'])) {
    $stmt = $pdo->prepare("DELETE FROM punishments WHERE id = ?");
    $stmt->execute([$p['id']]);
    unset($_SESSION['punishment']);
    header('Location: /');
    exit;
}
?>

<?php
include __DIR__ . '/elements/hd.php';
include __DIR__ . '/elements/nav.php';
?>

<main class="flex-grow-1 p-4 overflow-auto container">
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <h2 class="fw-semibold">
    <i class="fa-regular fa-exclamation-triangle me-2 <?= $p['type'] === 'warn' ? 'text-warning' : 'text-danger' ?>"></i>
    <?= $p['type'] === 'warn' ? 'Warning' : 'Account Banned' ?>
</h2>


        <?php if ($p['type'] !== 'warn'): ?>
            <div class="text-end">
                <span class="badge bg-dark-subtle text-dark-emphasis px-3 py-2 rounded-pill">
                    <i class="fa-regular fa-clock me-2"></i>
                    <?= match ($p['duration']) {
                        '1d' => '1 Day',
                        '7d' => '7 Days',
                        '14d' => '14 Days',
                        'perm' => 'Permanent',
                        default => ucfirst($p['duration'])
                    } ?>
                </span>
            </div>
        <?php endif; ?>
    </div>

    <p class="mb-4">
        <strong>Moderator's Note:</strong><br>
        <?= nl2br(htmlspecialchars($p['reason'])) ?>
    </p>

    <?php if ($p['type'] === 'warn'): ?>
        <form method="post" class="text-end">
            <button name="acknowledge" class="btn btn-success"><i class="fa-solid fa-check me-2"></i>OK</button>
        </form>
    <?php else: ?>
        <div class="text-end">
            <a href="/auth/logout" class="btn btn-danger btn-sm"><i class="fa-solid fa-sign-out me-2"></i>Logout</a>
        </div>
    <?php endif; ?>
</div>
    <?php include __DIR__ . '/elements/ftr.php'; ?>

</main>
