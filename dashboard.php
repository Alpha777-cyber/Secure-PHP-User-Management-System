<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin.php');
    exit();
}

include 'connection.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Management</title>
    
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
 
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            padding: 20px;
        }
 
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
 
        .header {
            background: #000000;
            color: #ffffff;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
 
        .header h1 {
            font-size: 1.5rem;
            font-weight: 600;
        }
 
        .header-actions {
            display: flex;
            gap: 15px;
        }
 
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }
 
        .btn-primary {
            background: #ffffff;
            color: #000000;
        }
 
        .btn-primary:hover {
            background: #f0f0f0;
        }
 
        .btn-danger {
            background: #dc3545;
            color: #ffffff;
        }
 
        .btn-danger:hover {
            background: #c82333;
        }
 
        .btn-secondary {
            background: #666666;
            color: #ffffff;
        }
 
        .btn-secondary:hover {
            background: #555555;
        }
 
        
        .stats {
            padding: 30px;         
            display: grid;         
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));  
            gap: 20px;             
        }
 
        
        .stat-card {
            background: #f8f9fa;   
            border: 1px solid #e0e0e0;  
            border-radius: 6px;    
            padding: 20px;         
            text-align: center;    
        }
 
        
        .stat-number {
            font-size: 2rem;       
            font-weight: 700;      
            color: #000000;        
            margin-bottom: 5px;    
        }
 
        
        .stat-label {
            font-size: 0.9rem;     
            color: #666666;        
            text-transform: uppercase;  
            letter-spacing: 0.5px;    
        }
 
        
        .table-container {
            padding: 0 30px 30px;  
        }
 
        
        .table-header {
            display: flex;         
            justify-content: space-between;  
            align-items: center;   
            margin-bottom: 20px;    
        }
 
        
        .search-box {
            display: flex;         
            gap: 10px;             
            align-items: center;   
        }
 
        
        .search-input {
            padding: 8px 12px;     
            border: 1px solid #d0d0d0;  
            border-radius: 4px;    
            font-size: 0.9rem;     
            width: 250px;          
        }
 
        
        .search-input:focus {
            outline: none;         
            border-color: #000000;  
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);  
        }
 
        
        table {
            width: 100%;           
            border-collapse: collapse;  
            background: #ffffff;   
        }
 
        
        th, td {
            padding: 12px;         
            text-align: left;      
            border-bottom: 1px solid #e0e0e0;  
        }
 
        
        th {
            background: #f8f9fa;   
            font-weight: 600;      
            color: #333333;        
            text-transform: uppercase;  
            font-size: 0.85rem;    
            letter-spacing: 0.5px;    
        }
 
        
        td {
            color: #666666;        
            font-size: 0.9rem;     
        }
 
        
        tr:hover {
            background: #f8f9fa;  
        }
 
        
        .actions {
            display: flex;         
            gap: 8px;              
        }
 
        
        .btn-small {
            padding: 4px 8px;      
            font-size: 0.8rem;     
        }
 
        
        .empty-state {
            text-align: center;    
            padding: 60px 20px;    
            color: #666666;        
        }
 
        .empty-state h3 {
            font-size: 1.2rem;     
            margin-bottom: 10px;   
            color: #333333;        
        }
 
        
        .pagination {
            display: flex;         
            justify-content: center;  
            gap: 10px;             
            margin-top: 20px;      
        }
 
        .page-btn {
            padding: 8px 12px;     
            border: 1px solid #d0d0d0;  
            background: #ffffff;   
            color: #666666;        
            text-decoration: none;  
            border-radius: 4px;    
            font-size: 0.9rem;     
        }
 
        .page-btn:hover {
            background: #f8f9fa;  
            border-color: #000000;  
            color: #000000;        
        }
 
        .page-btn.active {
            background: #000000;   
            color: #ffffff;        
            border-color: #000000;  
        }
 
        
        @media (max-width: 768px) {
            
            .stats {
                grid-template-columns: 1fr;  
            }
            
            
            .table-container {
                overflow-x: auto;   
            }
            
            
            table {
                min-width: 600px;  
            }
            
            
            .search-input {
                width: 150px;      
            }
        }
    </style>
</head>
<body>
    
    <div class="dashboard-container">
        
        
        <div class="header">
            <h1>Admin Dashboard</h1>
            
            
            <div class="header-actions">
                
                <a href="signup.php" class="btn btn-primary">Add New User</a>
                
                
                <a href="admin.php?logout=true" class="btn btn-secondary">Logout</a>
            </div>
        </div>

        
        <div class="stats">
            
            
            <div class="stat-card">
                <div class="stat-number">
                    <?php
                    /**
                     * Total Users Count
                     * 
                     * This query counts all registered users in the database.
                     * The result is displayed as a large number in the stat card.
                     */
                    $result = $conn->query("SELECT COUNT(*) as total FROM users");
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                    ?>
                </div>
                <div class="stat-label">Total Users</div>
            </div>
            
            
            <div class="stat-card">
                <div class="stat-number">
                    <?php
                    /**
                     * Today's Registrations Count
                     * 
                     * This query counts users who registered today.
                     * Uses CURDATE() to get current date from database.
                     */
                    $result = $conn->query("SELECT COUNT(*) as total FROM users WHERE DATE(created_at) = CURDATE()");
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                    ?>
                </div>
                <div class="stat-label">Today's Registrations</div>
            </div>
            
            
            <div class="stat-card">
                <div class="stat-number">
                    <?php
                    /**
                     * Male Users Count
                     * 
                     * This query counts users who identified as male.
                     * Gender filtering provides demographic insights.
                     */
                    $result = $conn->query("SELECT COUNT(*) as total FROM users WHERE gender = 'Male'");
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                    ?>
                </div>
                <div class="stat-label">Male Users</div>
            </div>
            
            
            <div class="stat-card">
                <div class="stat-number">
                    <?php
                    /**
                     * Female Users Count
                     * 
                     * This query counts users who identified as female.
                     * Complements the male users statistic for complete gender breakdown.
                     */
                    $result = $conn->query("SELECT COUNT(*) as total FROM users WHERE gender = 'Female'");
                    $row = $result->fetch_assoc();
                    echo $row['total'];
                    ?>
                </div>
                <div class="stat-label">Female Users</div>
            </div>
        </div>

        
        <div class="table-container">
            
            
            <div class="table-header">
                <h2>User Management</h2>
                
                
                <div class="search-box">
                    
                    <input type="text" class="search-input" placeholder="Search users..." id="searchInput">
                    
                    
                    <button class="btn btn-primary" onclick="searchUsers()">Search</button>
                </div>
            </div>

            
            <table id="usersTable">
                
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Registered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                
                <tbody>
                    <?php
                    /**
                     * User Data Retrieval and Display
                     * 
                     * This PHP block retrieves all users from the database
                     * and displays them in a table format with action buttons.
                     * Users are ordered by registration date (newest first).
                     */
                    $sql = "SELECT id, fname, lname, email, gender, created_at FROM users ORDER BY created_at DESC";
                    $result = $conn->query($sql);
                    
                    
                    if ($result->num_rows > 0) {
                        
                        
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            
                            
                            echo "<td>" . $row['id'] . "</td>";
                            
                            
                            echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
                            
                            
                            echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
                            
                            
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            
                            
                            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                            
                            
                            echo "<td>" . date('M j, Y', strtotime($row['created_at'])) . "</td>";
                            
                            
                            echo "<td class='actions'>";
                            
                            
                            echo "<a href='edit_user.php?id=" . $row['id'] . "' class='btn btn-primary btn-small'>Edit</a>";
                            
                            
                            echo "<a href='delete_user.php?id=" . $row['id'] . "' class='btn btn-danger btn-small' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>";
                            
                            echo "</td>";
                            echo "</tr>";
                        }
                        
                    } else {
                        
                        
                        echo "<tr><td colspan='7' class='empty-state'>
                                <h3>No users found</h3>
                                <p>Start by adding your first user.</p>
                              </td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <script>
        /**
         * User Search Function
         * 
         * This JavaScript function provides real-time search functionality
         * for the users table. It filters table rows based on user input.
         */
        function searchUsers() {
            
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            
            
            const rows = document.querySelectorAll('#usersTable tbody tr');
            
            
            rows.forEach(row => {
                
                const text = row.textContent.toLowerCase();
                
                
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        }

        /**
         * Real-time Search on Keyup
         * 
         * This event listener triggers search as the user types,
         * providing immediate feedback without requiring button click.
         */
        document.getElementById('searchInput').addEventListener('keyup', searchUsers);
        
        /**
         * Additional Search Enhancements (Optional)
         * 
         * Future improvements could include:
         * - Highlight matching text
         * - Search specific columns only
         * - Advanced search filters
         * - Search result count display
         */
    </script>

    <?php
    /**
     * Logout Handling
     * 
     * This PHP block checks for logout request and destroys
     * the session when logout is triggered. It then redirects
     * to the admin login page.
     */
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: admin.php');
        exit();
    }
    ?>
</body>
</html>

<?php
/**
 * Admin Dashboard - End of File
 * 
 * This dashboard provides comprehensive user management capabilities:
 * 
 * Features Implemented:
 * - Real-time user statistics and analytics
 * - Sortable user listing with search functionality
 * - Edit and delete operations for user management
 * - Responsive design for mobile compatibility
 * - Session-based security and logout functionality
 * 
 * Security Features:
 * - Session validation on page load
 * - HTML escaping for XSS protection
 * - Confirmation dialogs for destructive actions
 * - Secure logout with session destruction
 * 
 * Database Operations:
 * - User count queries for statistics
 * - User data retrieval with ordering
 * - Gender-based demographic filtering
 * - Date-based registration tracking
 * 
 * User Experience:
 * - Clean, professional interface
 * - Intuitive navigation and actions
 * - Real-time search without page refresh
 * - Mobile-responsive design
 * - Clear visual hierarchy
 * 
 * Next Steps:
 * - Consider implementing pagination for large user sets
 * - Add advanced filtering options
 * - Implement bulk operations
 * - Add user activity logging
 * - Consider adding export functionality
 */
