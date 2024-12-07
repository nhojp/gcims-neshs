<?php
session_start();

include "head.php";
include "sidebar.php";
include "conn.php";

// Fetch all complaints (both pending and completed)
$sql = "SELECT * FROM complaints_student";
$result = $conn->query($sql);

// Check if there's a toast message in the session
if (isset($_SESSION['toast_message']) && isset($_SESSION['toast_class'])) {
    $toast_message = $_SESSION['toast_message'];
    $toast_class = $_SESSION['toast_class'];

    // Unset the session variables so the message doesn't appear again
    unset($_SESSION['toast_message']);
    unset($_SESSION['toast_class']);
}
?>
<div id="main">
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="container-fluid bg-white mt-2 rounded-lg border">
            <div class="row pt-3">
                <div class="col-md-6">
                    <div class="container-fluid p-2">
                        <h3><strong>Complaints List</strong></h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" id="searchInput" placeholder="Search student">
                </div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col-md-12 text-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false">
                            Add Complaints
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="complaint_student_new.php">Complain a Student</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Complaints Table -->
        <table class="table table-hover table-bordered mt-2 text-center">
            <thead>
                <tr>
                    <table class="table table-hover table-bordered mt-2 text-center">
                        <thead>
                            <tr>
                                <th style="width: 55%;">Complained Person</th>
                                <th style="width: 30%;">Grade & Section</th>
                                <th class="text-center" style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo ucwords($row['complainedFirstName']) . ' ' . ucwords($row['complainedLastName']); ?></td>
                                    <td><?php echo ucwords($row['complainedGrade']) . ' - ' . ucwords($row['complainedSection']); ?></td>
                                    <td>
                                        <a href="pending_student.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo ucwords($row['complainedFirstName']) . ' ' . ucwords($row['complainedLastName']); ?></td>
                        <td><?php echo ucwords($row['complainedDesignation']); ?></td>
                        <td>
                            <a href="pending_sp.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
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