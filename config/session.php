<?php
// session.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Optional: auto-redirect if not logged in (can be disabled for public pages)
if (!isset($_SESSION['id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
