<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role']; // ✅ THIS IS REQUIRED
            // Redirect based on role
            switch ($_SESSION['role']) {
                case 'manager':
                    header("Location: ../dashboard/manager_dashboard.php");
                    break;
                case 'developer':
                    header("Location: ../dashboard/dev_dashboard.php");
                    break;
                case 'tester':
                    header("Location: ../dashboard/tester_dashboard.php");
                    break;
                default:
                    header("Location: ../auth/unauthorized.php");
            }
            exit();
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "User not found";
    }
}
?>
