<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: /home');
    exit;
}

$ffs = [
    "High Electricity Bills!",
    "Make one account, our servers can explode sometimes!",
    "Hey, hosting a site isn't free!",
    "Powering Imagination!",
    "Shooting at a fuel tank is fun thing to do!"
];

$rIndex = array_rand($ffs);
$rQuote = htmlspecialchars($ffs[$rIndex], ENT_QUOTES, 'UTF-8');
include __DIR__ . '/elements/hd.php'; 
?>
<body style="background: url('/img/landing.png') no-repeat center center fixed; background-size: cover;">
    
    <div class="position-fixed top-0 start-0 w-100 h-100" style="backdrop-filter: blur(8px); background-color: rgba(0, 0, 0, 0.3); z-index: -1;"></div>

    <main class="container-fluid vh-100 d-flex align-items-center justify-content-center text-center">
        <div class="row justify-content-center align-items-center p-5" style="backdrop-filter: blur(50px); background-color: rgba(0, 0, 0, 0.3);">
            
            <div class="col-md-5 text-md-end text-center mb-4 mb-md-0">
                <img src="/img/nova4th.png" 
                     alt="Logo" 
                     class="img-fluid" 
                     style="max-width: 60%;">
            </div>

            <div class="col-md-5 text-md-start text-center">
                <h3 class="mb-4 fst-italic fw-light text-white"><?= $rQuote ?></h3>
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center justify-content-md-start">
                    <a href="/auth/register" class="btn btn-success px-4">
                        <i class="fa-duotone fa-user-plus me-2"></i>Register
                    </a>
                    <a href="/auth/login" class="btn btn-secondary px-4">
                        <i class="fa-duotone fa-sign-in me-2"></i>Login
                    </a>
                    <a href="/auth/guest" class="btn btn-dark px-4">
                        <i class="fa-duotone fa-user-secret me-2"></i>Play as Guest
                    </a>
                </div>
            </div>

        </div>
    </main>
</body>
<?php include __DIR__ . '/elements/ftr.php'; ?>