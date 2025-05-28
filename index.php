<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
            --text-dark: #5a5c69;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
            color: var(--text-dark);
        }
        
        .navbar {
            padding: 1rem 2rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            background: white;
        }
        
        .navbar-brand img {
            transition: transform 0.3s;
        }
        
        .navbar-brand img:hover {
            transform: scale(1.05);
        }
        
        .nav-btn {
            margin-left: 0.5rem;
            border-radius: 0.35rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
        }
        
        .main-container {
            padding: 2rem;
            margin-top: 2rem;
        }
        
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-bottom: none;
            border-radius: 0.35rem 0.35rem 0 0 !important;
            padding: 1rem 1.5rem;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            color: #4e73df;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }
        
        .table td {
            vertical-align: middle;
            padding: 1rem 0.75rem;
            border-top: 1px solid #e3e6f0;
        }
        
        .table tr:last-child td {
            border-bottom: 1px solid #e3e6f0;
        }
        
        .action-btn {
            padding: 0.25rem 0.5rem;
            border-radius: 0.2rem;
            margin-right: 0.25rem;
            transition: all 0.2s;
        }
        
        .action-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .btn-add {
            background-color: var(--primary-color);
            border: none;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
        }
        
        .btn-add:hover {
            background-color: var(--accent-color);
            transform: translateY(-1px);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        @media (max-width: 768px) {
            .navbar {
                padding: 0.75rem 1rem;
            }
            
            .nav-btn {
                margin: 0.25rem 0;
                width: 100%;
            }
            
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Modern Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/img/Capture.PNG" alt="TestingXperts" width="150" height="70">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a href="#projects" class="nav-link nav-btn btn btn-outline-primary">Projects</a>
                    <a href="#about" class="nav-link nav-btn btn btn-outline-secondary">About</a>
                    <a href="#contact" class="nav-link nav-btn btn btn-outline-success">Contact</a>
                    <a href="#testimonials" class="nav-link nav-btn btn btn-outline-info">Testimonials</a>
                    <a href="#signup" class="nav-link nav-btn btn btn-warning">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0 font-weight-bold">Tx Employees Details</h4>
                    <a href="create.php" class="btn btn-add text-white">
                        <i class="bi bi-plus-lg me-1"></i> Add New Employee
                    </a>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        // Include config file
                        require_once "config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM employees";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<table class="table table-hover">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Salary</th>";
                                            echo "<th>Actions</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>$" . number_format($row['salary'], 2) . "</td>";
                                            echo "<td>";
                                                echo '<a href="read.php?id='. $row['id'] .'" class="action-btn btn btn-sm btn-info" title="View Record" data-bs-toggle="tooltip"><i class="bi bi-eye"></i></a>';
                                                echo '<a href="update.php?id='. $row['id'] .'" class="action-btn btn btn-sm btn-primary" title="Update Record" data-bs-toggle="tooltip"><i class="bi bi-pencil"></i></a>';
                                                echo '<a href="delete.php?id='. $row['id'] .'" class="action-btn btn btn-sm btn-danger" title="Delete Record" data-bs-toggle="tooltip"><i class="bi bi-trash"></i></a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo '<div class="alert alert-info"><em>No records were found.</em></div>';
                            }
                        } else{
                            echo '<div class="alert alert-danger">Oops! Something went wrong. Please try again later.</div>';
                        } 
                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
