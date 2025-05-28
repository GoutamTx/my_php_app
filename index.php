<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        },
                        dark: {
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .nav-link {
                @apply px-4 py-2 rounded-lg font-medium transition-all duration-200 hover:scale-105;
            }
            .btn {
                @apply px-4 py-2 rounded-lg font-medium transition-all duration-200;
            }
            .btn-primary {
                @apply bg-primary-600 text-white hover:bg-primary-700 hover:shadow-lg;
            }
            .btn-outline {
                @apply border border-gray-300 hover:bg-gray-50;
            }
            .action-btn {
                @apply p-2 rounded-md transition-all duration-200 hover:scale-110;
            }
            .table-row {
                @apply hover:bg-gray-50 transition-colors duration-150;
            }
            .pagination-btn {
                @apply px-3 py-1 rounded-md border border-gray-300 hover:bg-gray-100 transition-colors;
            }
            .pagination-btn.active {
                @apply bg-primary-600 text-white border-primary-600;
            }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Modern Navbar -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0">
                        <img class="h-10 w-auto" src="assets/img/Capture.PNG" alt="TestingXperts">
                    </a>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                    <a href="#projects" class="nav-link text-gray-700 hover:bg-gray-100">Projects</a>
                    <a href="#about" class="nav-link text-gray-700 hover:bg-gray-100">About</a>
                    <a href="#contact" class="nav-link text-gray-700 hover:bg-gray-100">Contact</a>
                    <a href="#testimonials" class="nav-link text-gray-700 hover:bg-gray-100">Testimonials</a>
                    <a href="#signup" class="btn btn-primary ml-4">Sign Up</a>
                </div>
                <div class="-mr-2 flex items-center md:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-2xl font-bold text-gray-800">Tx Employees Details</h2>
                <a href="create.php" class="btn btn-primary mt-4 sm:mt-0">
                    <i class="fas fa-plus mr-2"></i> Add New Employee
                </a>
            </div>
            
            <!-- Table -->
            <div class="overflow-x-auto">
                <?php
                // Include config file
                require_once "config.php";
                
                // Pagination settings
                $records_per_page = 4;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $records_per_page;
                
                // Get total number of records
                $total_records = 0;
                $count_query = "SELECT COUNT(*) as total FROM employees";
                if($count_result = mysqli_query($link, $count_query)) {
                    $count_row = mysqli_fetch_assoc($count_result);
                    $total_records = $count_row['total'];
                }
                
                // Calculate total pages
                $total_pages = ceil($total_records / $records_per_page);
                
                // Validate page number
                if ($page < 1) $page = 1;
                if ($page > $total_pages) $page = $total_pages;
                
                // Main query with pagination
                $sql = "SELECT * FROM employees LIMIT $offset, $records_per_page";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo '<table class="min-w-full divide-y divide-gray-200">';
                            echo '<thead class="bg-gray-50">';
                                echo '<tr>';
                                    echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>';
                                    echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>';
                                    echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>';
                                    echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>';
                                    echo '<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody class="bg-white divide-y divide-gray-200">';
                            while($row = mysqli_fetch_array($result)){
                                echo '<tr class="table-row">';
                                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $row['id'] . '</td>';
                                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . $row['name'] . '</td>';
                                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">' . $row['address'] . '</td>';
                                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$' . number_format($row['salary'], 2) . '</td>';
                                    echo '<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex space-x-2">';
                                        echo '<a href="read.php?id='. $row['id'] .'" class="action-btn text-blue-500 hover:text-blue-700" title="View">';
                                            echo '<i class="fas fa-eye"></i>';
                                        echo '</a>';
                                        echo '<a href="update.php?id='. $row['id'] .'" class="action-btn text-green-500 hover:text-green-700" title="Edit">';
                                            echo '<i class="fas fa-edit"></i>';
                                        echo '</a>';
                                        echo '<a href="delete.php?id='. $row['id'] .'" class="action-btn text-red-500 hover:text-red-700" title="Delete">';
                                            echo '<i class="fas fa-trash"></i>';
                                        echo '</a>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';                            
                        echo '</table>';
                        
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo '<div class="p-6 text-center text-gray-500">No records were found.</div>';
                    }
                } else{
                    echo '<div class="p-6 text-center text-red-500">Oops! Something went wrong. Please try again later.</div>';
                } 
                
                // Close connection
                mysqli_close($link);
                ?>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between">
                <div class="text-sm text-gray-500 mb-4 sm:mb-0">
                    Showing <span class="font-medium"><?php echo $offset + 1; ?></span> to 
                    <span class="font-medium"><?php echo min($offset + $records_per_page, $total_records); ?></span> of 
                    <span class="font-medium"><?php echo $total_records; ?></span> results
                </div>
                <div class="flex space-x-1">
                    <?php if ($page > 1): ?>
                        <a href="?page=1" class="pagination-btn">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <a href="?page=<?php echo $page - 1; ?>" class="pagination-btn">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    <?php endif; ?>
                    
                    <?php 
                    // Display page numbers
                    $visible_pages = 3; // Number of pages to show around current page
                    $start_page = max(1, $page - $visible_pages);
                    $end_page = min($total_pages, $page + $visible_pages);
                    
                    for ($i = $start_page; $i <= $end_page; $i++): ?>
                        <a href="?page=<?php echo $i; ?>" class="pagination-btn <?php echo $i == $page ? 'active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>" class="pagination-btn">
                            <i class="fas fa-angle-right"></i>
                        </a>
                        <a href="?page=<?php echo $total_pages; ?>" class="pagination-btn">
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple confirmation for delete actions
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('a[title="Delete"]');
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm('Are you sure you want to delete this record?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>
