<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - TestingXperts</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .action-btn {
            position: relative;
            overflow: hidden;
        }
        
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen font-sans antialiased">
    <!-- Navbar -->
    <nav class="glass-effect sticky top-0 z-50 border-b border-white/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-10 w-auto" src="assets/img/Capture.PNG" alt="TestingXperts">
                        <span class="ml-3 text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            TestingXperts
                        </span>
                    </div>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-2">
                    <a href="#projects" class="px-4 py-2 rounded-lg font-medium text-secondary-700 hover:bg-white/50 hover:text-primary-600 transition-all duration-200">Projects</a>
                    <a href="#about" class="px-4 py-2 rounded-lg font-medium text-secondary-700 hover:bg-white/50 hover:text-primary-600 transition-all duration-200">About</a>
                    <a href="#contact" class="px-4 py-2 rounded-lg font-medium text-secondary-700 hover:bg-white/50 hover:text-primary-600 transition-all duration-200">Contact</a>
                    <a href="#testimonials" class="px-4 py-2 rounded-lg font-medium text-secondary-700 hover:bg-white/50 hover:text-primary-600 transition-all duration-200">Testimonials</a>
                    <a href="#signup" class="ml-4 px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg">
                        Sign Up
                    </a>
                </div>
                <div class="-mr-2 flex items-center md:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-secondary-400 hover:text-secondary-500 hover:bg-white/20 focus:outline-none transition-colors">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Stats Cards Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <?php
        // Include config file
        require_once "config.php";
        
        // Get statistics
        $total_employees = 0;
        $total_salary = 0;
        $avg_salary = 0;
        
        $stats_query = "SELECT COUNT(*) as total, AVG(salary) as avg_salary, SUM(salary) as total_salary FROM employees";
        if($stats_result = mysqli_query($link, $stats_query)) {
            $stats_row = mysqli_fetch_assoc($stats_result);
            $total_employees = $stats_row['total'];
            $avg_salary = $stats_row['avg_salary'];
            $total_salary = $stats_row['total_salary'];
        }
        ?>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="stats-card text-white p-6 rounded-xl shadow-lg card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/80 text-sm font-medium">Total Employees</p>
                        <p class="text-3xl font-bold"><?php echo $total_employees; ?></p>
                    </div>
                    <div>
                        <i class="fas fa-users text-3xl text-white/60"></i>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white p-6 rounded-xl shadow-lg card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/80 text-sm font-medium">Total Payroll</p>
                        <p class="text-3xl font-bold">$<?php echo number_format($total_salary, 0); ?></p>
                    </div>
                    <div>
                        <i class="fas fa-money-bill-wave text-3xl text-white/60"></i>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-amber-500 to-orange-600 text-white p-6 rounded-xl shadow-lg card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/80 text-sm font-medium">Avg Salary</p>
                        <p class="text-3xl font-bold">$<?php echo number_format($avg_salary, 0); ?></p>
                    </div>
                    <div>
                        <i class="fas fa-chart-line text-3xl text-white/60"></i>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-pink-500 to-rose-600 text-white p-6 rounded-xl shadow-lg card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/80 text-sm font-medium">This Month</p>
                        <p class="text-3xl font-bold">+8</p>
                    </div>
                    <div>
                        <i class="fas fa-user-plus text-3xl text-white/60"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white/70 backdrop-blur-lg shadow-2xl rounded-2xl overflow-hidden border border-white/20 card-hover">
            <!-- Header with Search and Filters -->
            <div class="px-8 py-6 bg-gradient-to-r from-slate-50 to-blue-50 border-b border-gray-200/50">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <h2 class="text-3xl font-bold text-secondary-800 mb-2">Tx Employees Details</h2>
                        <p class="text-secondary-600">Manage your team members and their information</p>
                    </div>
                    
                    <!-- Search and Filter Section -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Search employees..." 
                                   class="pl-10 pr-4 py-3 w-full sm:w-64 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80">
                            <i class="fas fa-search absolute left-3 top-4 text-gray-400"></i>
                        </div>
                        <div class="flex gap-2">
                            <div class="relative">
                                <select id="salaryFilter" class="appearance-none px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white/80 pr-8">
                                    <option value="">All Salaries</option>
                                    <option value="0-40000">Below $40k</option>
                                    <option value="40000-60000">$40k - $60k</option>
                                    <option value="60000-80000">$60k - $80k</option>
                                    <option value="80000-100000">$80k - $100k</option>
                                    <option value="100000">Above $100k</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-4 text-gray-400 pointer-events-none"></i>
                            </div>
                            <a href="create.php" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg">
                                <i class="fas fa-plus mr-2"></i> Add New Employee
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Table -->
            <div class="overflow-x-auto">
                <?php
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
                        echo '<table class="min-w-full divide-y divide-gray-200/50" id="employeeTable">';
                            echo '<thead class="bg-gradient-to-r from-gray-50 to-slate-100">';
                                echo '<tr>';
                                    echo '<th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-secondary-600 uppercase tracking-wider">ID</th>';
                                    echo '<th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-secondary-600 uppercase tracking-wider">Employee</th>';
                                    echo '<th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-secondary-600 uppercase tracking-wider">Address</th>';
                                    echo '<th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-secondary-600 uppercase tracking-wider">Salary</th>';
                                    echo '<th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-secondary-600 uppercase tracking-wider">Actions</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody class="bg-white/50 divide-y divide-gray-200/30" id="tableBody">';
                            
                            while($row = mysqli_fetch_array($result)){
                                $initials = strtoupper(substr($row['name'], 0, 1) . substr(strstr($row['name'], ' '), 1, 1));
                                $colors = ['from-blue-400 to-purple-500', 'from-pink-400 to-red-500', 'from-green-400 to-blue-500', 'from-yellow-400 to-orange-500', 'from-purple-400 to-pink-500'];
                                $color = $colors[($row['id'] - 1) % count($colors)];
                                
                                echo '<tr class="hover:bg-gray-50">';
                                    echo '<td class="px-8 py-6 whitespace-nowrap">';
                                        echo '<div class="flex items-center">';
                                            echo '<div class="w-2 h-2 bg-green-400 rounded-full mr-3"></div>';
                                            echo '<span class="text-sm font-bold text-secondary-900">#' . sprintf('%03d', $row['id']) . '</span>';
                                        echo '</div>';
                                    echo '</td>';
                                    echo '<td class="px-8 py-6 whitespace-nowrap">';
                                        echo '<div class="flex items-center">';
                                            echo '<div class="w-10 h-10 bg-gradient-to-r ' . $color . ' rounded-full flex items-center justify-center text-white font-semibold mr-4">';
                                                echo $initials;
                                            echo '</div>';
                                            echo '<div>';
                                                echo '<div class="text-sm font-semibold text-secondary-900">' . htmlspecialchars($row['name']) . '</div>';
                                                echo '<div class="text-sm text-secondary-500">Employee</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</td>';
                                    echo '<td class="px-8 py-6 whitespace-nowrap">';
                                        $address_parts = explode(',', $row['address']);
                                        if (count($address_parts) >= 2) {
                                            echo '<div class="text-sm text-secondary-900">' . htmlspecialchars(trim($address_parts[0])) . '</div>';
                                            echo '<div class="text-sm text-secondary-500">' . htmlspecialchars(trim(implode(', ', array_slice($address_parts, 1)))) . '</div>';
                                        } else {
                                            echo '<div class="text-sm text-secondary-900">' . htmlspecialchars($row['address']) . '</div>';
                                        }
                                    echo '</td>';
                                    echo '<td class="px-8 py-6 whitespace-nowrap">';
                                        $salary_color = 'bg-green-100 text-green-800';
                                        if ($row['salary'] > 80000) $salary_color = 'bg-blue-100 text-blue-800';
                                        elseif ($row['salary'] > 60000) $salary_color = 'bg-purple-100 text-purple-800';
                                        elseif ($row['salary'] < 40000) $salary_color = 'bg-orange-100 text-orange-800';
                                        
                                        echo '<span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium ' . $salary_color . '">';
                                            echo '$' . number_format($row['salary'], 0);
                                        echo '</span>';
                                    echo '</td>';
                                    echo '<td class="px-8 py-6 whitespace-nowrap">';
                                        echo '<div class="flex space-x-2">';
                                            echo '<a href="read.php?id=' . $row['id'] . '" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-all duration-200" title="View Details">';
                                                echo '<i class="fas fa-eye"></i>';
                                            echo '</a>';
                                            echo '<a href="update.php?id=' . $row['id'] . '" class="p-2 text-green-600 hover:text-green-800 hover:bg-green-50 rounded-lg transition-all duration-200" title="Edit">';
                                                echo '<i class="fas fa-edit"></i>';
                                            echo '</a>';
                                            echo '<a href="delete.php?id=' . $row['id'] . '" class="p-2 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-all duration-200" title="Delete" onclick="return confirmDelete()">';
                                                echo '<i class="fas fa-trash"></i>';
                                            echo '</a>';
                                        echo '</div>';
                                    echo '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';                            
                        echo '</table>';
                        
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo '<div class="p-12 text-center">';
                            echo '<div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">';
                                echo '<i class="fas fa-users text-gray-400 text-2xl"></i>';
                            echo '</div>';
                            echo '<h3 class="text-lg font-semibold text-gray-900 mb-2">No employees found</h3>';
                            echo '<p class="text-gray-500 mb-4">Get started by adding your first employee.</p>';
                            echo '<a href="create.php" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200">';
                                echo '<i class="fas fa-plus mr-2"></i> Add Employee';
                            echo '</a>';
                        echo '</div>';
                    }
                } else{
                    echo '<div class="p-12 text-center">';
                        echo '<div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">';
                            echo '<i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>';
                        echo '</div>';
                        echo '<h3 class="text-lg font-semibold text-gray-900 mb-2">Database Error</h3>';
                        echo '<p class="text-gray-500">Oops! Something went wrong. Please try again later.</p>';
                    echo '</div>';
                } 
                ?>
            </div>
            
            <!-- Pagination -->
            <?php if($total_records > 0): ?>
            <div class="px-8 py-6 bg-gradient-to-r from-slate-50 to-blue-50 border-t border-gray-200/50">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-secondary-600">
                        Showing <span class="font-semibold text-secondary-900"><?php echo $offset + 1; ?></span> to 
                        <span class="font-semibold text-secondary-900"><?php echo min($offset + $records_per_page, $total_records); ?></span> of 
                        <span class="font-semibold text-secondary-900"><?php echo $total_records; ?></span> results
                    </div>
                    <div class="flex items-center space-x-1">
                        <?php if ($page > 1): ?>
                            <a href="?page=1" class="px-3 py-2 text-sm font-medium text-secondary-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-secondary-700 transition-colors">
                                <i class="fas fa-angle-double-left"></i>
                            </a>
                            <a href="?page=<?php echo $page - 1; ?>" class="px-3 py-2 text-sm font-medium text-secondary-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-secondary-700 transition-colors">
                                <i class="fas fa-angle-left"></i>
                            </a>
                        <?php endif; ?>
                        
                        <?php 
                        // Display page numbers
                        $visible_pages = 3;
                        $start_page = max(1, $page - $visible_pages);
                        $end_page = min($total_pages, $page + $visible_pages);
                        
                        for ($i = $start_page; $i <= $end_page; $i++): ?>
                            <a href="?page=<?php echo $i; ?>" class="px-4 py-2 text-sm font-medium <?php echo $i == $page ? 'text-white bg-gradient-to-r from-blue-600 to-purple-600 border-blue-600' : 'text-secondary-700 bg-white border-gray-300 hover:bg-gray-50'; ?> border rounded-lg transition-colors">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        
                        <?php if ($page < $total_pages): ?>
                            <a href="?page=<?php echo $page + 1; ?>" class="px-3 py-2 text-sm font-medium text-secondary-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-secondary-700 transition-colors">
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <a href="?page=<?php echo $total_pages; ?>" class="px-3 py-2 text-sm font-medium text-secondary-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-secondary-700 transition-colors">
                                <i class="fas fa-angle-double-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
    // Close connection
    mysqli_close($link);
    ?>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const tableRows = document.querySelectorAll('#tableBody tr');
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Salary filter functionality
        document.getElementById('salaryFilter').addEventListener('change', function(e) {
            const value = e.target.value;
            const tableRows = document.querySelectorAll('#tableBody tr');
            
            tableRows.forEach(row => {
                const salaryCell = row.querySelector('td:nth-child(4) span');
                if (!salaryCell) return;
                
                const salaryText = salaryCell.textContent.replace(/\D/g, '');
                const salary = parseInt(salaryText);
                
                let shouldShow = true;
                
                if (value) {
                    if (value === '0-40000') {
                        shouldShow = salary < 40000;
                    } else if (value === '40000-60000') {
                        shouldShow = salary >= 40000 && salary < 60000;
                    } else if (value === '60000-80000') {
                        shouldShow = salary >= 60000 && salary < 80000;
                    } else if (value === '80000-100000') {
                        shouldShow = salary >= 80000 && salary < 100000;
                    } else if (value === '100000') {
                        shouldShow = salary >= 100000;
                    }
                }
                
                row.style.display = shouldShow ? '' : 'none';
            });
        });

        // Delete confirmation
        function confirmDelete() {
            return confirm('Are you sure you want to delete this employee? This action cannot be undone.');
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Alt + N for new employee
            if (e.altKey && e.key === 'n') {
                e.preventDefault();
                window.location.href = 'create.php';
            }
            
            // Alt + S for search focus
            if (e.altKey && e.key === 's') {
                e.preventDefault();
                document.getElementById('searchInput').focus();
            }
        });
    </script>
</body>
</html>
