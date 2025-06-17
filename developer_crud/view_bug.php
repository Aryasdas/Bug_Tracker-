<?php
include '../config/db.php';
include '../config/session.php';
include '../includes/functions.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'developer') {
    header("Location: ../../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: view_bug.php");
    exit();
}

$bug_id = $_GET['id'];
$bug = getBugDetails($conn, $bug_id, $_SESSION['user_id']);

if (!$bug) {
    $_SESSION['error'] = "Bug not found or not assigned to you";
    header("Location: view_bug.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>
  <?php  echo "<pre>";
print_r($_SESSION);
echo "</pre>";
exit();
?>
<?php include '../dashboard/common_header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Bug Details</h4>
                        <span class="badge bg-<?php 
                            echo match($bug['severity']) {
                                'Critical' => 'danger',
                                'High' => 'warning',
                                'Medium' => 'info',
                                'Low' => 'secondary'
                            };
                        ?>">
                            <?php echo $bug['severity']; ?>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h3><?php echo htmlspecialchars($bug['title']); ?></h3>
                        <p class="text-muted">Reported by <?php echo $bug['reported_by_name']; ?> on <?php echo date('M d, Y H:i', strtotime($bug['created_at'])); ?></p>
                    </div>

                    <div class="mb-4">
                        <h5>Description</h5>
                        <div class="p-3 bg-light rounded">
                            <?php echo nl2br(htmlspecialchars($bug['description'])); ?>
                        </div>
                    </div>

                    <?php if (!empty($bug['steps_to_reproduce'])): ?>
                    <div class="mb-4">
                        <h5>Steps to Reproduce</h5>
                        <div class="p-3 bg-light rounded">
                            <?php echo nl2br(htmlspecialchars($bug['steps_to_reproduce'])); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Status</h5>
                            <span class="badge bg-<?php 
                                echo match($bug['status']) {
                                    'Open' => 'info',
                                    'In Progress' => 'warning',
                                    'Resolved' => 'success',
                                    'Closed' => 'secondary'
                                };
                            ?>">
                                <?php echo $bug['status']; ?>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <h5>Due Date</h5>
                            <p><?php echo $bug['due_date'] ? date('M d, Y', strtotime($bug['due_date'])) : 'Not set'; ?></p>
                        </div>
                    </div>

                    <form action="../developer_crud/update_status.php" method="POST">
                        <input type="hidden" name="bug_id" value="<?php echo $bug['id']; ?>">
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Update Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Open" <?php echo $bug['status'] === 'Open' ? 'selected' : ''; ?>>Open</option>
                                <option value="In Progress" <?php echo $bug['status'] === 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                <option value="Resolved" <?php echo $bug['status'] === 'Resolved' ? 'selected' : ''; ?>>Resolved</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="developer_notes" class="form-label">Developer Notes</label>
                            <textarea class="form-control" id="developer_notes" name="developer_notes" rows="4"><?php echo htmlspecialchars($bug['developer_notes'] ?? ''); ?></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="view_bug.php" class="btn btn-secondary me-md-2">Back to List</a>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../dashboard/common_header.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
