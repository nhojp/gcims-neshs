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
// Fetch violation descriptions from the violation_list table
$violation_list = [];
$sql_violation = "SELECT id, violation_description FROM violation_list";
$result_violation = $conn->query($sql_violation);

if ($result_violation->num_rows > 0) {
    while ($row = $result_violation->fetch_assoc()) {
        $violation_list[] = $row;
    }
}

// Fetch strands from the strands table
$strands = [];
$sql_strand = "SELECT name FROM strands";
$result_strand = $conn->query($sql_strand);
if ($result_strand->num_rows > 0) {
    while ($row = $result_strand->fetch_assoc()) {
        $strands[] = $row;
    }
}

// Fetch sections from the sections table
$sections = [];
$sql_section = "SELECT section_name FROM sections";
$result_section = $conn->query($sql_section);
if ($result_section->num_rows > 0) {
    while ($row = $result_section->fetch_assoc()) {
        $sections[] = $row;
    }
}

// Check if the form is submitted
if (isset($_POST['submit_violation'])) {
    // Sanitize and fetch form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $strand = mysqli_real_escape_string($conn, $_POST['strand']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $violation_description = mysqli_real_escape_string($conn, $_POST['violation_description']);

    // Insert into the violation_reported table
    $sql = "INSERT INTO violation_reported (first_name, middle_name, last_name, strand, grade, section, violation_description)
            VALUES ('$first_name', '$middle_name', '$last_name', '$strand', '$grade', '$section', '$violation_description')";

    if ($conn->query($sql) === TRUE) {
        // Set the success toast message and class in the session
        $_SESSION['toast_message'] = "Reported successfully!";
        $_SESSION['toast_class'] = "success";  // Bootstrap success class

        // Redirect after deletion to avoid resubmission
        header("Location: violations.php");  // Pass the complaint_id in the URL
        exit();
    } else {
        // Set the success toast message and class in the session
        $_SESSION['toast_message'] = "Report failed!";
        $_SESSION['toast_class'] = "failed";  // Bootstrap success class

        // Redirect after deletion to avoid resubmission
        header("Location: violations.php");  // Pass the complaint_id in the URL
        exit();
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
                        <h3><strong>Violation Form</strong></h3>
                    </div>
                </div>

            </div>
            <form action="" method="POST">
                <div class="row">
                    <!-- First Name -->
                    <div class="form-group col-md-4">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>

                    <!-- Middle Name -->
                    <div class="form-group col-md-4">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" required>
                    </div>

                    <!-- Last Name -->
                    <div class="form-group col-md-4">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4"><label for="grade">Grade:</label>
                        <select class="form-control" id="grade" name="grade" required>
                            <option value="">Select Grade</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4"><label for="strand">Strand:</label>
                        <select class="form-control" id="strand" name="strand" required>
                            <option value="">Select Strand</option>
                            <?php foreach ($strands as $strand): ?>
                                <option value="<?php echo htmlspecialchars($strand['name']); ?>">
                                    <?php echo htmlspecialchars($strand['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <a href="strands.php" class="float-end" style="font-size: 0.85em;">Strand not in the list?</a>
                    </div>
                    <div class="form-group col-md-4"><label for="section">Section:</label>
                        <select class="form-control" id="section" name="section" required>
                            <option value="">Select Section</option>
                            <?php foreach ($sections as $section): ?>
                                <option value="<?php echo htmlspecialchars($section['section_name']); ?>">
                                    <?php echo htmlspecialchars($section['section_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <a href="sections.php" class="float-end" style="font-size: 0.85em;">Section not in the list?</a>
                    </div>

                </div>
                <div class="row">
                    <!-- Violation Description Dropdown -->
                    <div class="form-group">
                        <label for="violation_description">Violation Description:</label>
                        <select class="form-control" id="violation_description" name="violation_description" required>
                            <option value="">Select Violation</option>
                            <?php foreach ($violation_list as $violation): ?>
                                <option value="<?php echo $violation['id']; ?>">
                                    <?php echo htmlspecialchars($violation['violation_description']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <a href="violations_list.php" class="float-end" style="font-size: 0.85em;">Violation not in the list?</a>

                    </div>
                </div>

                <div class="row text-right p-3">
                    <button type="submit" class="btn btn-outline-success" name="submit_violation">
                        <i class="fas fa-check"></i> Submit
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