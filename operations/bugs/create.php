<?php
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../config/session.php';
require_once __DIR__ . '/../../includes/functions.php';

// Debug session data
error_log("Session data: " . print_r($_SESSION, true));

// Check authorization
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['manager', 'tester'])) {
    header("Location: /jphp22/Bug_Tracker/pages/login.php");
    exit();
}

// Validate and sanitize input
$required = ['title', 'description', 'severity'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        $_SESSION['error'] = "Please fill all required fields";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

$title = htmlspecialchars(trim($_POST['title']));
$description = htmlspecialchars(trim($_POST['description']));
$steps = !empty($_POST['steps_to_reproduce']) ? htmlspecialchars(trim($_POST['steps_to_reproduce'])) : null;
$severity = htmlspecialchars($_POST['severity']);
$assigned_to = !empty($_POST['assigned_to']) ? (int)$_POST['assigned_to'] : null;
$due_date = !empty($_POST['due_date']) ? $_POST['due_date'] : null;
$reported_by = (int)$_SESSION['user_id'];
$status = 'Open'; // Default status
$created_at = date('Y-m-d H:i:s');

// Prepare and execute SQL
try {
    $stmt = $conn->prepare("INSERT INTO bugs 
        (title, description, steps_to_reproduce, severity, status, reported_by, assigned_to, due_date, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssiiss", 
        $title, 
        $description, 
        $steps, 
        $severity, 
        $status, 
        $reported_by, 
        $assigned_to, 
        $due_date, 
        $created_at);

   // In your create.php, replace the logging part with:
if ($stmt->execute()) {
    $bug_id = $conn->insert_id;
    
    $_SESSION['success'] = "Bug #$bug_id reported successfully!";
    header("Location: /jphp22/Bug_Tracker/Bug_Tracker-/manager_crud/view_bugs.php");
    exit();
}
     else {
        throw new Exception("Database execution failed");
    }
} catch (Exception $e) {
    error_log("Error creating bug: " . $e->getMessage());
    $_SESSION['error'] = "Error creating bug: " . (DEBUG_MODE ? $e->getMessage() : "Please try again");
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}