<?php
include '../config/db.php';
include '../auth/log.php';
include '../auth/reg.php';
include '../includes/functions.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'tester') {
    header("Location: ../login.php");
    exit();
}

$reportedBugs = getBugsReportedByUser($conn, $_SESSION['user_id']);
?>

<?php include '../dashboard/common_header.php'; ?>

<main class="px-4 py-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tester Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="create_bug.php" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus-circle me-1"></i> Report New Bug
                </a>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Reported Bugs</h5>
                    <p class="card-text display-6"><?php echo count($reportedBugs); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Open</h5>
                    <p class="card-text display-6"><?php echo count(array_filter($reportedBugs, fn($bug) => $bug['status'] === 'Open')); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Resolved</h5>
                    <p class="card-text display-6"><?php echo count(array_filter($reportedBugs, fn($bug) => $bug['status'] === 'Resolved')); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Recently Reported Bugs</h5>
        </div>
        <div class="card-body">
            <?php if (empty($reportedBugs)): ?>
                <div class="alert alert-info">You haven't reported any bugs yet.</div>
            <?php else: ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Severity</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($reportedBugs, 0, 5) as $bug): ?>
                        <tr>
                            <td><?php echo $bug['id']; ?></td>
                            <td><?php echo htmlspecialchars($bug['title']); ?></td>
                            <td>
                                <span class="badge bg-<?php 
                                    echo match($bug['severity']) {
                                        'Critical' => 'danger',
                                        'High' => 'warning',
                                        default => 'primary'
                                    };
                                ?>">
                                    <?php echo $bug['severity']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-<?php 
                                    echo match($bug['status']) {
                                        'Open' => 'info',
                                        'In Progress' => 'warning',
                                        'Resolved' => 'success',
                                        default => 'secondary'
                                    };
                                ?>">
                                    <?php echo $bug['status']; ?>
                                </span>
                            </td>
                            <td><?php echo $bug['assigned_to_name'] ?? 'Unassigned'; ?></td>
                            <td>
                                <a href="view_bug.php?id=<?php echo $bug['id']; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="edit_bug.php?id=<?php echo $bug['id']; ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="my_reported_bugs.php" class="btn btn-sm btn-primary">View All My Reported Bugs</a>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include '../dashboard/common_footer.php'; ?>