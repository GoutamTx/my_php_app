<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #2ecc71;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }
        
        .navbar-brand img {
            transition: transform 0.3s;
        }
        
        .navbar-brand img:hover {
            transform: scale(1.05);
        }
        
        .nav-btn {
            margin-left: 10px;
            font-weight: 500;
            border-radius: 6px;
            padding: 8px 16px;
            transition: all 0.3s;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card-title {
            margin: 0;
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 1.5rem;
        }
        
        .btn-add {
            background-color: var(--success-color);
            border: none;
            padding: 8px 20px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .btn-add:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 15px;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        
        .table tbody tr {
            transition: all 0.2s;
        }
        
        .table tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }
        
        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
            color: #555;
        }
        
        .action-buttons {
            white-space: nowrap;
        }
        
        .action-btn {
            display: inline-block;
            width: 32px;
            height: 32px;
            line-height: 32px;
            text-align: center;
            border-radius: 50%;
            margin: 0 3px;
            transition: all 0.2s;
        }
        
        .action-btn:hover {
            transform: scale(1.1);
            text-decoration: none;
        }
        
        .view-btn {
            color: var(--primary-color);
            background-color: rgba(52, 152, 219, 0.1);
        }
        
        .view-btn:hover {
            background-color: rgba(52, 152, 219, 0.2);
        }
        
        .edit-btn {
            color: var(--warning-color);
            background-color: rgba(243, 156, 18, 0.1);
        }
        
        .edit-btn:hover {
            background-color: rgba(243, 156, 18, 0.2);
        }
        
        .delete-btn {
            color: var(--danger-color);
            background-color: rgba(231, 76, 60, 0.1);
        }
        
        .delete-btn:hover {
            background-color: rgba(231, 76, 60, 0.2);
        }
        
        .badge-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }
        
        .empty-state {
            padding: 40px;
            text-align: center;
            color: #777;
        }
        
        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 15px;
        }
        
        /* Features Section */
        .features-section {
            padding: 80px 0;
            background-color: white;
        }
        
        .feature-card {
            padding: 30px;
            border-radius: 10px;
            height: 100%;
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background-color: rgba(52, 152, 219, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        /* Footer */
        .footer {
            background-color: var(--secondary-color);
            color: white;
            padding: 50px 0 20px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            margin-right: 15px;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-icons a {
            color: white;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            transition: all 0.2s;
        }
        
        .social-icons a:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .btn-add {
                margin-top: 15px;
                width: 100%;
            }
            
            .table-responsive {
                border: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/img/Capture.PNG" alt="TestingXperts" width="150" height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a href="#projects" class="nav-btn btn btn-outline-primary">Projects</a>
                    <a href="#about" class="nav-btn btn btn-outline-secondary">About</a>
                    <a href="#contact" class="nav-btn btn btn-outline-success">Contact</a>
                    <a href="#signup" class="nav-btn btn btn-warning">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Dashboard -->
    <div class="dashboard-container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="fas fa-users me-2"></i>Employee Dashboard
                </h2>
                <a href="create.php" class="btn btn-add">
                    <i class="fas fa-plus me-2"></i>Add New Employee
                </a>
            </div>
            <div class="card-body">
                <?php
                // Include config file
                require_once "config.php";
                
                // Attempt select query execution
                $sql = "SELECT * FROM employees";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-hover align-middle">';
                            echo '<thead>';
                                echo '<tr>';
                                    echo '<th>ID</th>';
                                    echo '<th>Name</th>';
                                    echo '<th>Address</th>';
                                    echo '<th>Salary</th>';
                                    echo '<th class="text-end">Actions</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while($row = mysqli_fetch_array($result)){
                                echo '<tr>';
                                    echo '<td><span class="badge bg-light text-dark">#' . $row['id'] . '</span></td>';
                                    echo '<td><strong>' . $row['name'] . '</strong></td>';
                                    echo '<td>' . $row['address'] . '</td>';
                                    echo '<td>$' . number_format($row['salary'], 2) . '</td>';
                                    echo '<td class="text-end action-buttons">';
                                        echo '<a href="read.php?id='. $row['id'] .'" class="action-btn view-btn" title="View" data-bs-toggle="tooltip"><i class="fas fa-eye"></i></a>';
                                        echo '<a href="update.php?id='. $row['id'] .'" class="action-btn edit-btn" title="Edit" data-bs-toggle="tooltip"><i class="fas fa-pencil-alt"></i></a>';
                                        echo '<a href="delete.php?id='. $row['id'] .'" class="action-btn delete-btn" title="Delete" data-bs-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';                            
                        echo '</table>';
                        echo '</div>';
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo '<div class="empty-state">';
                        echo '<i class="far fa-folder-open"></i>';
                        echo '<h4>No employees found</h4>';
                        echo '<p>There are currently no employees in the database. Click the button above to add one.</p>';
                        echo '</div>';
                    }
                } else{
                    echo '<div class="alert alert-danger">';
                    echo '<i class="fas fa-exclamation-circle me-2"></i>Oops! Something went wrong. Please try again later.';
                    echo '</div>';
                } 
                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Why Choose TestingXperts?</h2>
                <p class="text-muted">We provide the best services in the industry</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4 class="text-center">Fully Responsive</h4>
                        <p class="text-muted text-center">TestingXperts designs fully responsive websites that work perfectly on all devices from desktops to smartphones.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fab fa-bootstrap"></i>
                        </div>
                        <h4 class="text-center">Bootstrap 5 Ready</h4>
                        <p class="text-muted text-center">Our solutions feature the latest build of Bootstrap 5 framework for modern, mobile-first web development.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h4 class="text-center">Easy to Customize</h4>
                        <p class="text-muted text-center">We make it easy to customize your content or modify the source files to perfectly match your requirements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">What Our Clients Say</h2>
                <p class="text-muted">Hear from our satisfied customers</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center p-4">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle mb-3" width="80" alt="Client">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="mb-4">"TestingXperts transformed our online presence completely. Their team delivered beyond our expectations."</p>
                            <h5 class="mb-1">Margaret E.</h5>
                            <p class="text-muted small">CEO, TechCorp</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center p-4">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" class="rounded-circle mb-3" width="80" alt="Client">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                            <p class="mb-4">"The quality of work and attention to detail is exceptional. Will definitely work with them again."</p>
                            <h5 class="mb-1">Fred S.</h5>
                            <p class="text-muted small">Marketing Director</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body text-center p-4">
                            <img src="https://randomuser.me/api/portraits/women/63.jpg" class="rounded-circle mb-3" width="80" alt="Client">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star-half-alt text-warning"></i>
                            </div>
                            <p class="mb-4">"Thanks for making these amazing resources available to us! Our website traffic has doubled."</p>
                            <h5 class="mb-1">Sarah W.</h5>
                            <p class="text-muted small">E-commerce Manager</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-2">Ready to get started?</h3>
                    <p class="mb-0">Sign up today and see the difference TestingXperts can make for your business.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="#signup" class="btn btn-light btn-lg px-4">Sign Up Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h5 class="text-white mb-4">TestingXperts</h5>
                    <p class="text-muted">Leading the way in quality assurance and software testing solutions for businesses worldwide.</p>
                    <div class="footer-links mt-4">
                        <a href="#">About</a>
                        <a href="#">Services</a>
                        <a href="#">Careers</a>
                        <a href="#">Contact</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Terms of Service</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">FAQ</a></li>
                        <li><a href="#" class="text-muted">Support</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Connect With Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="mt-4">
                        <p class="text-muted small mb-1">Email: info@testingxperts.com</p>
                        <p class="text-muted small">Phone: +1 (555) 123-4567</p>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="small text-muted mb-0">&copy; 2023 TestingXperts. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="small text-muted mb-0">Designed with <i class="fas fa-heart text-danger"></i> by TestingXperts Team</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>
</html>
