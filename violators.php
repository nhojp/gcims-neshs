<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: index.php");
    exit;
}

include "head.php";
include "sidebar.php";
include "conn.php";

// Query to get violation reports and join with violation_list to get the description
$query = "SELECT 
            vr.id,
            CONCAT(vr.first_name, ' ', vr.middle_name, ' ', vr.last_name) AS full_name,
            CONCAT(vr.strand, ' - ', vr.grade, ' - ', vr.section) AS student_details,
            vl.violation_description,
            vr.reported_at
          FROM violation_reported vr
          JOIN violation_list vl ON vr.violation_description = vl.id";
$result = $conn->query($query);

?>

<div id="main">
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="container-fluid bg-white mt-2 rounded-lg border">
            <div class="row pt-3">
                <div class="col-md-6">
                    <div class="container-fluid p-2">
                        <h3><strong>Violators List</strong></h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" id="searchInput" placeholder="Search Section">
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-md-1">
                    <a href="violations.php" class="btn btn-success w-100 mb-2">
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>
            </div>

        </div>
        <table class="table table-hover table-bordered mt-2 text-center">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Details</th>
                    <th>Violation</th>
                    <th>Reported At</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            <?php
                // Check if there are records and display them
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars(ucwords(ucwords($row['full_name']))) . "</td>";
                        echo "<td>" . htmlspecialchars($row['student_details']) . "</td>";
                        echo "<td>" . htmlspecialchars(ucwords($row['violation_description'])) . "</td>";
                        echo "<td>" . htmlspecialchars($row['reported_at']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No violation reports found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const filter = this.value.toLowerCase(); // Get the input value and convert to lowercase
        const rows = document.querySelectorAll('#tableBody tr'); // Get all rows in the table body

        rows.forEach(row => {
            const cells = row.querySelectorAll('td'); // Get all cells in the row
            const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(filter));
            row.style.display = match ? '' : 'none'; // Show or hide the row based on the match
        });
    });
</script>
<?php
include "toast.php";
include "footer.php";
?>