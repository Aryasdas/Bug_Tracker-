<?php
include '../config/session.php';
include '../config/db.php';
include '../includes/functions.php';

// Only allow managers
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'manager') {
    header("Location: unauthorized.php");
    exit();
}

$bugs = getAllBugs($conn);    // Ensure this function exists in includes/functions.php
$users = getAllUsers($conn);
?>

<?php include '../dashboard/common_header.php'; ?>

<main class="px-4 py-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manager Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="../manager_crud/create.php" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle me-1"></i> New Bug
                </a>
                <a href="manage_users.php" class="btn btn-sm btn-success">
                    <i class="fas fa-users-cog me-1"></i> View Bugs
                </a>
            </div>
        </div>
    </div>

    <!-- Metrics Cards and Bug Table Below... (unchanged from your original) -->
    <!-- Keep your original dashboard layout/code here -->
</main>

<?php include '../dashboard/common_footer.php'; ?>
