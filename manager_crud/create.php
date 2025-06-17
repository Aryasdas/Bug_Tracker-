<?php
include '../config/db.php';
include '../config/session.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'manager') {
    header("Location: ../pages/login.php");
    exit();
}
function getAllUsers($conn) {
    $users = [];
    $query = "SELECT id, username FROM users ORDER BY username ASC";
    $result = $conn->query($query);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    return $users;
}

$users = getAllUsers($conn);
?>

<?php include '../dashboard/common_header.php'; ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Report New Bug</h5>
                        <a href="index.php" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Cancel
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="../operations/bugs/create.php" method="POST">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required 
                                           placeholder="Brief description of the issue">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" rows="6" required
                                              placeholder="Detailed explanation of the bug"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="steps_to_reproduce" class="form-label">Steps to Reproduce</label>
                                    <textarea class="form-control" id="steps_to_reproduce" name="steps_to_reproduce" rows="4"
                                              placeholder="Step-by-step instructions to recreate the issue"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card border-0 shadow-none">
                                    <div class="card-body">
                                        <h6 class="mb-3">Bug Details</h6>

                                        <div class="mb-3">
                                            <label for="severity" class="form-label">Severity <span class="text-danger">*</span></label>
                                            <select class="form-select" id="severity" name="severity" required>
                                                <option value="">Select Severity</option>
                                                <option value="Critical">Critical</option>
                                                <option value="High">High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="assigned_to" class="form-label">Assign To</label>
                                            <select class="form-select" id="assigned_to" name="assigned_to">
                                                <option value="">Unassigned</option>
                                                <?php foreach ($users as $user): ?>
                                                    <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['username']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="due_date" class="form-label">Due Date</label>
                                            <input type="date" class="form-control" id="due_date" name="due_date" 
                                                   min="<?= date('Y-m-d') ?>">
                                        </div>

                                        <div class="d-grid mt-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i> Create Bug
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../dashboard/common_footer.php'; ?>