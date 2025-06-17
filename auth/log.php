<?php
session_start();
include '../config/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $errors[] = "Both email and password are required";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id, username, email, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['username'];
                $_SESSION['role'] = $user['role'];

 


                // Role-based redirect (correct relative path)
            switch ($user['role']) {
            case 'manager':
                header("Location: ../dashboard/manager_dashboard.php");
                break;
            case 'developer':
                header("Location: ../dashboard/developer_dashboard.php");
                break;
            case 'tester':
                header("Location: ../dashboard/tester_dashboard.php");
                break;
            default:
                header("Location: ../index.php");
        }
        exit();

                } else {
                $errors[] = "Invalid email or password";
            }
        } else {
            $errors[] = "Invalid email or password";
        }
        $stmt->close();
    }
}
?>
