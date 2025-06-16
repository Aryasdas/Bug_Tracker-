<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $errors = [];

    // Validate inputs
    if (empty($username) || empty($password)) {
        $errors[] = "Both username and password are required";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                // Redirect based on role
                switch ($user['role']) {
                    case 'manager':
                        header("Location: manager_dashboard.php");
                        break;
                    case 'developer':
                        header("Location: developer_dashboard.php");
                        break;
                    case 'tester':
                        header("Location: tester_dashboard.php");
                        break;
                    default:
                        header("Location: index.php");
                }
                exit();
            } else {
                $errors[] = "Invalid username or password";
            }
        } else {
            $errors[] = "Invalid username or password";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bug Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<?php
require "../includes/header.php";

?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <?php foreach ($errors as $error): ?>
                                    <p class="mb-0"><?php echo $error; ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <div class="mt-3 text-center">
                            Don't have an account? <a href="register.php">Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php
require "../includes/footer.php";

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>