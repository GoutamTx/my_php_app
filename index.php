<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard | TestingXperts</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-red: #e63946;
            --dark-red: #d00000;
            --light-red: #ff686b;
            --pure-white: #ffffff;
            --off-white: #f8f9fa;
            --dark-black: #212529;
            --medium-gray: #495057;
            --light-gray: #e9ecef;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--off-white);
            color: var(--dark-black);
            line-height: 1.6;
        }
        
        /* Navbar Styles */
        .navbar {
            background-color: var(--dark-black);
            padding: 1rem 2rem;
            box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2);
            border-bottom: 3px solid var(--primary-red);
        }
        
        .navbar-brand img {
            transition: transform 0.3s ease;
            height: 50px;
        }
        
        .navbar-brand img:hover {
            transform: scale(1.05);
        }
        
        .nav-link {
            color: var(--pure-white) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            position: relative;
            padding: 0.5rem 1rem !important;
        }
        
        .nav-link:before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary-red);
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }
        
        .nav-link:hover:before {
            visibility: visible;
            width: 100%;
        }
        
        .btn-signup {
            background-color: var(--primary-red);
            color: white;
            border-radius: 30px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-red);
        }
        
        .btn-signup:hover {
            background-color: transparent;
            color: var(--primary-red);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(230, 57, 70, 0.3);
        }
        
        /* Main Content */
        .dashboard-container {
            padding: 3rem 0;
        }
        
        .dashboard-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .dashboard-title {
            color: var(--dark-black);
            font-weight: 700;
            position: relative;
            display: inline-block;
        }
        
        .dashboard-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            bottom: -10px;
            left: 0;
            background-color: var(--primary-red);
        }
        
        /* Card Styles */
        .data-card {
            background-color: var(--pure-white);
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2rem;
        }
        
        .data-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }
        
        .card-header {
            background-color: var(--dark-black);
            color: var(--pure-white);
            padding: 1.25rem 1.5rem;
            border-bottom: 3px solid var(--primary-red);
        }
        
        .card-header h3 {
            margin: 0;
            font-weight: 600;
        }
        
        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        .table {
            margin-bottom: 0;
            color: var(--dark-black);
        }
        
        .table thead th {
            background-color: var(--dark-black);
            color: var(--pure-white);
            border-bottom: 2px solid var(--primary-red);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            padding: 1rem;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(230, 57, 70, 0.05);
        }
        
        .table td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            border-top: 1px solid var(--light-gray);
        }
        
        /* Action Buttons */
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 0.5rem;
            transition: all 0.2s ease;
        }
        
        .btn-view {
            background-color: var(--medium-gray);
            color: white;
        }
        
        .btn-edit {
            background-color: var(--primary-red);
            color: white;
        }
        
        .btn-delete {
            background-color: var(--dark-black);
            color: white;
        }
        
        .action-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-view:hover {
            background-color: #5a6268;
        }
        
        .btn-edit:hover {
            background-color: var(--dark-red);
        }
        
        .btn-delete:hover {
            background-color: #343a40;
        }
        
        /* Add New Button */
        .btn-add-new {
            background-color: var(--primary-red);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 0.75rem 1.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .btn-add-new i {
            margin-right: 0.5rem;
        }
        
        .btn-add-new:hover {
            background-color: var(--dark-red);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 57, 70, 0.3);
        }
        
        /* Status Badges */
        .badge {
            padding: 0.5rem 0.75rem;
            font-weight: 600;
            border-radius: 50px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .navbar {
                padding: 0.75rem 1rem;
            }
            
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .btn-add-new {
                margin-top: 1rem;
            }
        }
        
        @media (max-width: 768px) {
            .table td {
                padding: 0.75rem;
            }
            
            .action-btn {
                width: 28px;
                height: 28px;
                margin-right: 0.25rem;
            }
        }
    </style>
</head>
<body>
    <!-- Modern Dark Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/img/Capture.PNG" alt="TestingXperts" class="d-inline-block align-top">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-speedometer2 me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-people me-1"></i> Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-graph-up me-1"></i> Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-gear me-1"></i> Settings</a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <div class="dropdown me-3">
                        <a href="#" class="text-white dropdown-toggle" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bell fs-5"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                            <li><h6 class="dropdown-header">Notifications</h6></li>
                            <li><a class="dropdown-item" href="#">New employee added</a></li>
                            <li><a class="dropdown-item" href="#">System update available</a></li>
                            <li><a class="dropdown-item" href="#">Weekly report ready</a></li>
                        </ul>
                    </div>
                    
                    <div class="dropdown">
                        <a href="#" class="text-white dropdown-toggle d-flex align-items-center" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/40" alt="User" class="rounded-circle me-2">
                            <span>Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-envelope me-2"></i> Messages</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Dashboard Content -->
    <div class="container-fluid dashboard-container">
        <div class="dashboard-header" data-aos="fade-down">
            <h1 class="dashboard-title">Employee Management</h1>
            <a href="create.php" class="btn btn-add-new">
                <i class="bi bi-plus-lg"></i> Add New Employee
            </a>
        </div>
        
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <div class="data-card">
                    <div class="card-header">
                        <h3><i class="bi bi-table me-2"></i> Employee Records</h3>
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
                                    echo '<table class="table table-hover align-middle">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>ID</th>";
                                                echo "<th>Employee</th>";
                                                echo "<th>Position</th>";
                                                echo "<th>Department</th>";
                                                echo "<th>Salary</th>";
                                                echo "<th>Status</th>";
                                                echo "<th>Actions</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                            // Generate random status for demo purposes
                                            $statuses = ['Active', 'On Leave', 'Terminated'];
                                            $random_status = $statuses[array_rand($statuses)];
                                            $status_class = '';
                                            
                                            if($random_status == 'Active') {
                                                $status_class = 'bg-success';
                                            } elseif($random_status == 'On Leave') {
                                                $status_class = 'bg-warning text-dark';
                                            } else {
                                                $status_class = 'bg-secondary';
                                            }
                                            
                                            echo "<tr>";
                                                echo "<td><strong>" . $row['id'] . "</strong></td>";
                                                echo "<td>";
                                                echo "<div class='d-flex align-items-center'>";
                                                echo "<img src='https://i.pravatar.cc/40?img=" . rand(1, 70) . "' alt='' class='rounded-circle me-3' width='40'>";
                                                echo "<div>";
                                                echo "<h6 class='mb-0'>" . $row['name'] . "</h6>";
                                                echo "<small class='text-muted'>" . $row['email'] ?? 'employee@example.com' . "</small>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</td>";
                                                echo "<td>Software Engineer</td>";
                                                echo "<td>Development</td>";
                                                echo "<td>$" . number_format($row['salary'], 2) . "</td>";
                                                echo "<td><span class='badge " . $status_class . "'>" . $random_status . "</span></td>";
                                                echo "<td>";
                                                    echo '<a href="read.php?id='. $row['id'] .'" class="action-btn btn-view" title="View" data-bs-toggle="tooltip"><i class="bi bi-eye"></i></a>';
                                                    echo '<a href="update.php?id='. $row['id'] .'" class="action-btn btn-edit" title="Edit" data-bs-toggle="tooltip"><i class="bi bi-pencil"></i></a>';
                                                    echo '<a href="delete.php?id='. $row['id'] .'" class="action-btn btn-delete" title="Delete" data-bs-toggle="tooltip"><i class="bi bi-trash"></i></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";                            
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } else{
                                    echo '<div class="alert alert-info text-center py-4"><i class="bi bi-info-circle-fill me-2"></i>No employee records were found.</div>';
                                }
                            } else{
                                echo '<div class="alert alert-danger text-center py-4"><i class="bi bi-exclamation-triangle-fill me-2"></i>Oops! Something went wrong. Please try again later.</div>';
                            } 
                            // Close connection
                            mysqli_close($link);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
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
