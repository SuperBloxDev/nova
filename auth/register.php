<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/reactor.php';

if (isset($_SESSION['user_id'])) {
    header('Location: /home');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    try {
        if (!$username || !$email || !$password || !$confirm) {
            throw new Exception("All fields are required.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address.");
        }

        if ($password !== $confirm) {
            throw new Exception("Passwords do not match.");
        }

        $check = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $check->execute([$username, $email]);
        if ($check->fetch()) {
            throw new Exception("Username or email already exists.");
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, novabux, created_at) VALUES (?, ?, ?, 0, NOW())");
        $stmt->execute([$username, $email, $hash]);

        $userId = $pdo->lastInsertId();
        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;

        $_SESSION['alert'] = "Welcome, $username!";
        $_SESSION['alert_type'] = "success";
        header("Location: /home");
        exit;

    } catch (Exception $e) {
        $_SESSION['alert'] = $e->getMessage();
        $_SESSION['alert_type'] = "danger";
        header("Location: /auth/register");
        exit;
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/elements/hd.php';
?>
<body style="background: url('/img/landing.png') no-repeat center center fixed; background-size: cover;">
    
<div class="position-fixed top-0 start-0 w-100 h-100" style="backdrop-filter: blur(8px); background-color: rgba(0, 0, 0, 0.3); z-index: -1;"></div>

    <main class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg text-white border-0 rounded-4" style="max-width: 750px; width: 100%;backdrop-filter: blur(50px); background-color: rgba(0, 0, 0, 0.3);">
            <div class="card-body p-5">
                
                <div class="text-center mb-4">
                    <img src="/img/novasmall.png" 
                         alt="Logo" 
                         class="img-fluid" 
                         style="max-width: 90px;">
                </div>

                <h3 class="mb-4 text-center fw-bold">Create your account</h3>
                <?php if (isset($_SESSION['alert'])): ?>
    <div class="alert alert-<?= $_SESSION['alert_type'] ?? 'danger' ?> alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-4" style="z-index:9999; max-width: 600px;" role="alert">
        <?= htmlspecialchars($_SESSION['alert']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['alert'], $_SESSION['alert_type']); ?>
<?php endif; ?>

                <form action="/auth/register" method="POST">
                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-md-right"><label for="username" class="form-label">Username</label></div>
                        <div class="col-9"><input type="text" name="username" id="username" class="form-control" required></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-md-right"><label for="email" class="form-label">Email address</label></div>
                        <div class="col-9"><input type="email" name="email" id="email" class="form-control" required></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3 col-form-label text-md-right"><label for="password" class="form-label">Password</label></div>
                        <div class="col-9"><input type="password" name="password" id="password" class="form-control" required></div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-3 col-form-label text-md-right"><label for="confirm_password" class="form-label">Confirm Password</label></div>
                        <div class="col-9"><input type="password" name="confirm_password" id="confirm_password" class="form-control" required></div>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="fa-regular fa-user-plus me-2"></i> Register
                    </button>
                </form>

                <p class="mt-3 text-center text-muted">
                    or <a href="/auth/login" class="text-decoration-none text-light">Login</a>
                </p>
            </div>
        </div>
    </main>
</body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/elements/ftr.php'; ?>