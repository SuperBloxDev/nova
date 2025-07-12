<?php
include __DIR__ . '/elements/hd.php';
include __DIR__ . '/elements/nav.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /');
    exit;
}

require_once __DIR__ . '/reactor.php';

$user_id = isset($_GET['user']) ? (int)$_GET['user'] : null;

if (!$user_id) {
    http_response_code(400);
    echo "<main class='container p-4'><h1 class='text-danger'><i class='fa-solid fa-exclamation-triangle'></i></h1>Invalid user ID.</main>";
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    http_response_code(404);
    echo "<main class='flex-grow-1 p-4 overflow-auto container'><h1 class='text-danger'><i class='fa-solid fa-exclamation-triangle'></i></h1>User not found.</main>";
    exit;
}
?>

<main class="flex-grow-1 p-4 overflow-auto container">
    <small class="text-muted mb-3 font-monospace">BETA</small>
    <div class="d-flex align-items-start">
        <img src="/img/Render.png" 
             alt="Avatar" class="rounded me-4" height="100">
        <div class="mb-5">
            <h1 class="fw-bold mb-2">
    <?= htmlspecialchars($user['username']) ?>
    <?php if (!empty($user['verified'])): ?>
        <img src="/img/verified.png" alt="Verified Badge" title="Verified" class="ms-2" height="30">
    <?php endif; ?>
    <?php if (!empty($user['admin'])): ?>
        <img src="/img/admin.png" alt="Admin Badge" title="Administrator" class="ms-2" height="30">
    <?php endif; ?>
</h1>

            <p class="mb-0 text-muted fst-italic"><?= htmlspecialchars($user['blurb']) ?></p>
        </div>
        
    </div>
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 text-center">
                            <p class="card-title">Member since</p>
                            <p class="text-muted mb-1"><?= date('F j, Y', strtotime($user['created_at'])) ?></p>
                        </div>
                        <div class="col-6 text-center">
                            <p class="card-title">Novabux</p>
                            <p class="text-muted mb-1"><i class="fa-solid fa-dollar-circle me-2"></i><?= htmlspecialchars($user['novabux'] ?? 0) ?></p>
                        </div>
                    </div>  
    <?php include __DIR__ . '/elements/ftr.php'; ?>
</main>
