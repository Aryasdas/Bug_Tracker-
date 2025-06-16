<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | BugTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .about-header {
            background-color: #f8f9fa;
            padding: 3rem 0;
        }
        footer {
            background-color: #343a40;
            color: white;
            margin-top: auto;
            padding: 2rem 0;
        }
        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Header/Navigation -->
    <header class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">
                <i class="fas fa-bug me-2"></i>BugTrack
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="features.php">Features</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="login.html" class="btn btn-outline-primary me-2">Login</a>
                    <a href="register.html" class="btn btn-primary">Sign Up</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1">
        <!-- About Header -->
        <section class="about-header text-center">
            <div class="container">
                <h1 class="display-5 fw-bold">About BugTrack</h1>
                <p class="lead">Our mission is to simplify bug tracking for development teams</p>
            </div>
        </section>

        <!-- About Content -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="mb-4">Our Story</h2>
                        <p>BugTrack was founded in 2023 by a team of developers who were frustrated with overly complex bug tracking systems. We wanted to create a solution that was simple to use but still powerful enough for real development teams.</p>
                        <p>Our philosophy is that bug tracking should help you solve problems, not create more work. That's why we've focused on creating an intuitive interface with just the features you actually need.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/images/team-working.jpg" alt="Team working together" class="img-fluid rounded">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <h2 class="text-center mb-5">Meet the Team</h2>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="team-member">
                            <img src="assets/images/team1.jpg" alt="Team Member" class="mb-3">
                            <h4>Alex Johnson</h4>
                            <p class="text-muted">Founder & CEO</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="team-member">
                            <img src="assets/images/team2.jpg" alt="Team Member" class="mb-3">
                            <h4>Sarah Williams</h4>
                            <p class="text-muted">Lead Developer</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <div class="team-member">
                            <img src="assets/images/team3.jpg" alt="Team Member" class="mb-3">
                            <h4>Michael Chen</h4>
                            <p class="text-muted">UX Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="fas fa-bug me-2"></i>BugTrack</h5>
                    <p>Simple bug tracking for development teams.</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Product</h5>
                    <ul class="list-unstyled">
                        <li><a href="features.html" class="text-white text-decoration-none">Features</a></li>
                        <li><a href="pricing.html" class="text-white text-decoration-none">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="about.html" class="text-white text-decoration-none">About</a></li>
                        <li><a href="contact.html" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Connect</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p class="mb-0">© 2023 BugTrack. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>