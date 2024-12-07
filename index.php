<?php
session_start();

include "head.php";
include "conn.php";

$username = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (!empty($username) && !empty($password)) {
        // Query the admin table to check for the username and password
        $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            // Check if a matching record was found
            if ($result->num_rows === 1) {
                $admin = $result->fetch_assoc();

                // Set session variables for the logged-in admin
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_name'] = $admin['name'];

                // Redirect to the admin dashboard
                header("Location: dashboard.php");
                exit;
            } else {
                // Invalid credentials: Set toast message
                $toast_message = "Invalid username or password.";
                $toast_class = "Failed";
            }
        } else {
            // Query failed: Set toast message
            $toast_message = "Something went wrong while logging in.";
            $toast_class = "Failed";
        }
    } else {
        // Missing fields: Set toast message
        $toast_message = "Please fill in both fields.";
        $toast_class = "Failed";
    }
}
?>

<div id="main" class="vh-100 d-flex justify-content-center align-items-center position-relative">
    <!-- Light Yellow Background -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 224, 0.5); z-index: 0;"></div>
    
    <!-- Login Card -->
    <div class="card shadow-lg position-relative" style="width: 100%; max-width: 500px; z-index: 1;">
        <!-- Header Section -->
        <div class="card-header bg-white text-success text-center">
            <img src="img/gcims_logo.png" alt="Logo" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
            <h4 class="fw-bold mt-2">GCIMS</h4>
            <p class="mb-0">Guidance and Counseling Information Management System</p>
        </div>
        <!-- Login Form -->
        <div class="card-body">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" value="<?php echo htmlspecialchars($username); ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-success w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<?php
include "toast.php";
include "footer.php";
?>
