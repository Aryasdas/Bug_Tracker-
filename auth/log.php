<?php
// login.php
session_start();
require '../config/db.php';

// If already logged in, redirect to appropriate dashboard
if (isset($_SESSION['user_id'])) {
    switch ($_SESSION['role']) {
        case 'manager':
            header('Location: ../dashboard_manager.php'); exit;
        case 'developer':
            header('Location: ../dashboard_developer.php'); exit;
        case 'tester':
            header('Location: ../dashboard_tester.php'); exit;
    }
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === '' || $password === '') {
        $errors[] = 'Both email and password are required';
    } else {
        $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res && $res->num_rows === 1) {
            $user = $res->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // success: set session and redirect
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name']    = $user['name'];
                $_SESSION['role']    = strtolower($user['role']);

                switch ($_SESSION['role']) {
                    case 'manager':
                        header('Location: ../dashboard_manager.php'); exit;
                    case 'developer':
                        header('Location: ../dashboard_developer.php'); exit;
                    case 'tester':
                        header('Location: ../dashboard_tester.php'); exit;
                }
            } else {
                $errors[] = 'Invalid email or password';
            }
        } else {
            $errors[] = 'Invalid email or password';
        }
        $stmt->close();
    }
}
?>