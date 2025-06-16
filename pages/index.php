<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BugTrack - Simple Bug Tracking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #6c757d;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .hero-section {
            background-color: #f8f9fa;
            padding: 3rem 0;
        }
        .feature-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        footer {
            background-color: #343a40;
            color: white;
            margin-top: auto;
            padding: 2rem 0;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Header/Navigation -->
    <header class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">
                <i class="fas fa-bug me-2"></i>BugTracker
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
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container py-4">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold mb-3">Simple Bug Tracking Solution</h1>
                        <p class="lead mb-4">Track and manage software issues efficiently with our straightforward bug tracking system.</p>
                        <div class="d-flex gap-3">
                            <a href="register.html" class="btn btn-primary btn-lg px-4">Get Started</a>
                            <a href="#features" class="btn btn-outline-secondary btn-lg px-4">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/images/bug-tracking.png" alt="Bug Tracking Interface" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-5 bg-white">
            <div class="container py-4">
                <h2 class="text-center mb-5">Key Features</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 p-3">
                            <div class="card-body text-center">
                                <div class="feature-icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <h4>Bug Tracking</h4>
                                <p>Easily create, assign, and track bugs through their lifecycle.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 p-3">
                            <div class="card-body text-center">
                                <div class="feature-icon">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <h4>Tagging</h4>
                                <p>Categorize and filter bugs with custom tags.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 p-3">
                            <div class="card-body text-center">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <h4>Reporting</h4>
                                <p>Generate simple reports to track progress.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="py-5 bg-light">
            <div class="container py-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="mb-4">About BugTrack</h2>
                        <p>BugTrack is a straightforward bug tracking system designed for small to medium development teams who need an uncomplicated solution for tracking software issues.</p>
                        <p>Our focus is on simplicity and usability, without unnecessary complexity that gets in the way of your actual work.</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Why Choose BugTrack?</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Easy to set up and use</li>
                                    <li class="list-group-item">No complicated workflows</li>
                                    <li class="list-group-item">Focused on essential features</li>
                                    <li class="list-group-item">Affordable pricing</li>
                                </ul>
                            </div>
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