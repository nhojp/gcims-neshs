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

// Check if there's a toast message in the session
if (isset($_SESSION['toast_message']) && isset($_SESSION['toast_class'])) {
    $toast_message = $_SESSION['toast_message'];
    $toast_class = $_SESSION['toast_class'];

    // Unset the session variables so the message doesn't appear again
    unset($_SESSION['toast_message']);
    unset($_SESSION['toast_class']);
}
// SQL query to fetch violations data
$violations_query = "SELECT * FROM violation_list";
$violations_result = mysqli_query($conn, $violations_query);

if (!$violations_result) {
    die("Query failed: " . mysqli_error($conn));
}

// Handle form submission to add a new violation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_violation'])) {
        $violation_description = $_POST['violation_description'];

        $query = "INSERT INTO violation_list (violation_description) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $violation_description);

        try {
            $stmt->execute();
            $_SESSION['toast_message'] = "Violation added successfully!";
            $_SESSION['toast_class'] = "success";
        } catch (mysqli_sql_exception $e) {
            $_SESSION['toast_message'] = ($e->getCode() == 1062)
                ? "Violation already exists."
                : "Failed to add violation.";
            $_SESSION['toast_class'] = "danger";
        }

        $stmt->close();
        header("Location: violations_list.php");
        exit();
    } elseif (isset($_POST['edit_violation'])) {
        $violation_id = $_POST['violation_id'];
        $violation_description = $_POST['violation_description'];

        $query = "UPDATE violation_list SET violation_description = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $violation_description, $violation_id);

        if ($stmt->execute()) {
            // Set success toast
            $_SESSION['toast_message'] = "Violation updated successfully!";
            $_SESSION['toast_class'] = "success";
        } else {
            // Set failure toast
            $_SESSION['toast_message'] = "Failed to update violation.";
            $_SESSION['toast_class'] = "danger";
        }

        $stmt->close();
        header("Location: violations_list.php"); // Redirect after the operation
        exit();
    } elseif (isset($_POST['delete_violation'])) {
        $violation_id = $_POST['violation_id'];

        $query = "DELETE FROM violation_list WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $violation_id);

        if ($stmt->execute()) {
            // Set success toast
            $_SESSION['toast_message'] = "Violation deleted successfully!";
            $_SESSION['toast_class'] = "success";
        } else {
            // Set failure toast
            $_SESSION['toast_message'] = "Failed to delete violation.";
            $_SESSION['toast_class'] = "danger";
        }

        $stmt->close();
        header("Location: violations_list.php"); // Redirect after the operation
        exit();
    }
}

?>

<div id="main">

    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="container-fluid bg-white mt-2 rounded-lg border">
            <div class="row pt-3">
                <div class="col-md-6">
                    <div class="container-fluid p-2">
                        <h3><strong>Violation List</strong></h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" id="searchInput" placeholder="Search Section">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-right pb-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addViolationModal">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-container">
            <table class="table table-hover table-bordered mt-2 text-center">
                <thead>
                    <tr>
                        <th style="width: 85%;">Violation</th>
                        <th class="text-center" style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    // Fetch data for both table and modals
                    mysqli_data_seek($violations_result, 0); // Reset result pointer to fetch data again
                    while ($row = mysqli_fetch_assoc($violations_result)) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars(ucwords($row['violation_description'])); ?></td>
                            <td class="text-center">
                                <button class="btn btn btn-outline-success" data-toggle="modal" data-target="#editViolationModal<?php echo $row['id']; ?>"> <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteViolationModal<?php echo $row['id']; ?>"> <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- Add Violation Modal -->
<div class="modal fade" id="addViolationModal" tabindex="-1" role="dialog" aria-labelledby="addViolationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-success">
                <h5 class="modal-title" id="addViolationModalLabel">Add Violation</h5>
                <button type="button" class="btn-danger btn btn btn-circle" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="violation_description">Violation Description</label>
                        <input type="text" class="form-control" id="violation_description" name="violation_description" required>
                    </div>

                    <button type="submit" class="btn btn-outline-success" name="add_violation" style="width: 100%;">Add Violation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Violation Modals -->
<?php
// Reset result pointer again for modal generation
mysqli_data_seek($violations_result, 0);
while ($row = mysqli_fetch_assoc($violations_result)) : ?>
    <div class="modal fade" id="editViolationModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editViolationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-white bg-success">
                    <h5 class="modal-title" id="editViolationModalLabel">Edit Violation</h5>
                    <button type="button" class="btn-danger btn btn btn-circle" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="violation_description">Violation</label>
                            <input type="text" class="form-control" id="violation_description" name="violation_description" value="<?php echo htmlspecialchars(ucwords($row['violation_description'])); ?>" required>
                            <input type="hidden" name="violation_id" value="<?php echo $row['id']; ?>">
                        </div>

                        <button type="submit" class="btn btn-outline-success" name="edit_violation" style="width: 100%;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<!-- Delete Violation Modals -->
<?php
// Reset result pointer once more for modal generation
mysqli_data_seek($violations_result, 0);
while ($row = mysqli_fetch_assoc($violations_result)) : ?>
    <div class="modal fade" id="deleteViolationModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteViolationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-white bg-success">
                    <h5 class="modal-title" id="deleteViolationModalLabel">Delete Violation</h5>
                    <button type="button" class="btn-danger btn btn btn-circle" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <p>Are you sure you want to delete this violation?</p>
                        <input type="hidden" name="violation_id" value="<?php echo $row['id']; ?>">

                        <button type="submit" class="btn btn-outline-danger w-100" name="delete_violation">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = document.getElementById('searchInput').value.toLowerCase();
            var rows = document.querySelectorAll('#personnelTable tr');

            rows.forEach(function(row) {
                var name = row.cells[0].innerText.toLowerCase();
                var position = row.cells[1].innerText.toLowerCase();

                if (name.includes(input) || position.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

<?php
include "toast.php";
include "footer.php";
?>