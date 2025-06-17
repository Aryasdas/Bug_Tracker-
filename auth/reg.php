<?php
include '../config/session.php';
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $role = $_POST['role'];
    $errors = [];

    // Validate inputs
    if (empty($username)) {
        $errors[] = "Username is required";
    } elseif (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }

    if (empty($password) || strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    if (!in_array($role, ['manager', 'developer', 'tester'])) {
        $errors[] = "Invalid role selected";
    }

    // Check if username/email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $errors[] = "Username or email already exists";
    }
    $stmt->close();

    // If no errors, register user
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);
        
        if ($stmt->execute()) {
    // Get the newly created user's ID
    $user_id = $stmt->insert_id;

    // Auto-login the user
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $name; // Assuming $name was collected earlier
    $_SESSION['role'] = strtolower($role); // Ensure it's lowercase
    $_SESSION['name'] = $name;

    // Redirect based on role
    switch ($_SESSION['role']) {
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
    $errors[] = "Registration failed. Please try again.";
}

    }
}
?>