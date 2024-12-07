<?php
session_start();
ob_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: index.php");
    exit;
}

include "head.php";
include "sidebar.php";
include "conn.php";

// Fetch admin details from the admin table using the logged-in admin's session ID
$admin_first_name = $admin_middle_name = $admin_last_name = "";

// Assuming 'admin' table contains columns for first_name, middle_name, and last_name
$sql_admin = "SELECT first_name, middle_name, last_name FROM admin WHERE id = ?";
$stmt_admin = $conn->prepare($sql_admin);
$stmt_admin->bind_param("i", $_SESSION['admin_id']);
$stmt_admin->execute();
$result_admin = $stmt_admin->get_result();

if ($result_admin->num_rows > 0) {
    $admin_data = $result_admin->fetch_assoc();
    $admin_first_name = $admin_data['first_name'];
    $admin_middle_name = $admin_data['middle_name'];
    $admin_last_name = $admin_data['last_name'];
} else {
    echo "Admin data not found.";
}
$stmt_admin->close();

// Fetch school years from the school_year table
$school_years = [];
$sql_years = "SELECT year_start, year_end FROM school_year";
$result_years = $conn->query($sql_years);

if ($result_years->num_rows > 0) {
    while ($row = $result_years->fetch_assoc()) {
        $school_years[] = $row;
    }
}

$conn->close();
?>
<div id="main">

    <?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="container-fluid bg-white mt-2 rounded-lg border">
            <div class="row pt-3">
                <div class="col-md-12">
                    <div class="container-fluid p-2">
                        <h3><strong>Student Information Form</strong></h3>
                    </div>
                </div>
            </div>

            <form action="goodmoral.php" method="POST">
                <div class="row pt-3">
                    <div class="col-md-4">
                        <label for="student_first_name">First Name:</label>
                        <input type="text" class="form-control" id="student_first_name" name="student_first_name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="student_middle_name">Middle Name:</label>
                        <input type="text" class="form-control" id="student_middle_name" name="student_middle_name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="student_last_name">Last Name:</label>
                        <input type="text" class="form-control" id="student_last_name" name="student_last_name" required>
                    </div>

                </div>
                <div class="row pt-3">
                    <!-- School Year Dropdown -->
                    <div class="form-group">
                        <label for="school_year">School Year:</label>
                        <select class="form-control" id="school_year" name="school_year" required>
                            <option value="">Select School Year</option>
                            <?php foreach ($school_years as $year): ?>
                                <option value="<?php echo $year['year_start'] . '-' . $year['year_end']; ?>">
                                    <?php echo $year['year_start'] . ' - ' . $year['year_end']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row text-right p-3">
                    <button type="submit" class="btn btn-outline-success" name="print">
                        <i class="fas fa-print"></i> Generate Good Moral
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php
include "toast.php";
include "footer.php";
?>