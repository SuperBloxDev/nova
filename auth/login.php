<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/reactor.php';

if (isset($_SESSION['user_id'])) {
    header('Location: /home');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    try {
        if (!$username || !$password) {
            throw new Exception("Both fields are required.");
        }

        $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password'])) {
            throw new Exception("Invalid username or password.");
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        $_SESSION['alert'] = "Welcome, {$user['username']}!";
        $_SESSION['alert_type'] = "success";
        header("Location: /home");
        exit;

    } catch (Exception $e) {
        $_SESSION['alert'] = $e->getMessage();
        $_SESSION['alert_type'] = "danger";
        header("Location: /auth/login");
        exit;
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/elements/hd.php';
?>
<body style="background: url('/img/landing.png') no-repeat center center fixed; background-size: cover;">
    
    <div class="position-fixed top-0 start-0 w-100 h-100" style="backdrop-filter: blur(8px); background-color: rgba(0, 0, 0, 0.3); z-index: -1;"></div>

    <main class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg text-white border-0 rounded-4" style="max-width: 600px; width: 100%; backdrop-filter: blur(50px); background-color: rgba(0, 0, 0, 0.3);">
            <div class="card-body p-5">
                
                <div class="text-center mb-4">
                    <img src="/img/novasmall.png" 
                         alt="Logo" 
                         class="img-fluid" 
                         style="max-width: 90px;">
                </div>

                <h3 class="mb-4 text-center fw-bold">Login to your account</h3>

                <?php if (isset($_SESSION['alert'])): ?>
                    <div class="alert alert-<?= $_SESSION['alert_type'] ?? 'danger' ?> show py-2" role="alert">
                        <?= htmlspecialchars($_SESSION['alert']) ?>
                    </div>
                    <?php unset($_SESSION['alert'], $_SESSION['alert_type']); ?>
                <?php endif; ?>

                <form action="/auth/login" method="POST">
                    <div class="row mb-3">
                        <div class="col-2 col-form-label text-md-end"><label for="username" class="form-label">Username</label></div>
                        <div class="col-10"><input type="text" name="username" id="username" class="form-control" required></div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-2 col-form-label text-md-end"><label for="password" class="form-label">Password</label></div>
                        <div class="col-10"><input type="password" name="password" id="password" class="form-control" required></div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-regular fa-sign-in me-2"></i> Login
                    </button>
                </form>

                <p class="mt-3 text-center text-muted">
                    or <a href="/auth/register" class="text-decoration-none text-light">Register</a>
                </p>
            </div>
        </div>
    </main>
</body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/elements/ftr.php'; ?>
