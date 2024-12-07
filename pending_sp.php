<?php
session_start();
ob_start();

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
function calculateAge($birthdate)
{
    $today = new DateTime();
    $dob = new DateTime($birthdate);
    $age = $today->diff($dob)->y;
    return $age;
}
// Initialize variables
$complaint_data = [];

if (isset($_GET['id'])) {
    $complaint_id = $_GET['id'];

    $sql = "SELECT * FROM complaints WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $complaint_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $complaint_data = $result->fetch_assoc();
        } else {
            echo "No complaint found for the given ID.";
        }
    } else {
        echo "Failed to prepare statement: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No complaint ID provided.";
}

// Handle "Print" button
if (isset($_POST['save'])) {
    // Get the complaint ID
    $complaint_id = $_GET['id']; // Assuming the ID is passed via the URL

    // Save the form data to the database (similar to the "Save" button process)
    $victimAge = calculateAge($_POST['victimDOB']);
    $complainedAge = calculateAge($_POST['complainedDOB']);

    // Prepare the SQL to update the complaint status and details with "pending"
    $sql = "UPDATE complaints 
            SET status = 'pending', 
                victimFirstName = ?, 
                victimMiddleName = ?, 
                victimLastName = ?, 
                victimDOB = ?, 
                victimAge = ?,
                victimSex = ?, 
                victimGrade = ?,
                victimSection = ?,
                victimAdviser = ?, 
                motherName = ?, 
                motherOccupation = ?, 
                motherAddress = ?, 
                motherContact = ?, 
                fatherName = ?, 
                fatherOccupation = ?, 
                fatherAddress = ?, 
                fatherContact = ?, 
                complainantFirstName = ?, 
                complainantMiddleName = ?, 
                complainantLastName = ?, 
                relationshipToVictim = ?,
                complainantContact = ?, 
                complainantAddress = ?, 
                complainedFirstName = ?, 
                complainedMiddleName = ?, 
                complainedLastName = ?, 
                complainedDOB = ?,
                complainedAge = ?,
                complainedSex = ?,
                complainedDesignation = ?,
                complainedAddress = ?, 
                complainedContact = ?, 
                caseDetails = ?, 
                actionTaken = ?, 
                recommendations = ? 
            WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "ssssissssssssssssssssssssssisssssssi",
            $_POST['victimFirstName'],
            $_POST['victimMiddleName'],
            $_POST['victimLastName'],
            $_POST['victimDOB'],
            $victimAge,
            $_POST['victimSex'],
            $_POST['victimGrade'],
            $_POST['victimSection'],
            $_POST['victimAdviser'],
            $_POST['motherName'],
            $_POST['motherOccupation'],
            $_POST['motherAddress'],
            $_POST['motherContact'],
            $_POST['fatherName'],
            $_POST['fatherOccupation'],
            $_POST['fatherAddress'],
            $_POST['fatherContact'],
            $_POST['complainantFirstName'],
            $_POST['complainantMiddleName'],
            $_POST['complainantLastName'],
            $_POST['relationshipToVictim'],
            $_POST['complainantContact'],
            $_POST['complainantAddress'],
            $_POST['complainedFirstName'],
            $_POST['complainedMiddleName'],
            $_POST['complainedLastName'],
            $_POST['complainedDOB'],
            $complainedAge,
            $_POST['complainedSex'],
            $_POST['complainedDesignation'],
            $_POST['complainedAddress'],
            $_POST['complainedContact'],
            $_POST['caseDetails'],
            $_POST['actionTaken'],
            $_POST['recommendations'],
            $complaint_id
        );

        // Execute the query
        if ($stmt->execute()) {
            // Set the success toast message and class in the session
            $_SESSION['toast_message'] = "Saved successfully!";
            $_SESSION['toast_class'] = "success";  // Bootstrap success class

            // Redirect after deletion to avoid resubmission
            header("Location: pending_student.php?id=$complaint_id");  // Pass the complaint_id in the URL
            exit();
        } else {
            // Set the error toast message
            $_SESSION['toast_message'] = "Saving failed!";
            $_SESSION['toast_class'] = "danger";  // Bootstrap danger class

            // Redirect after failure
            header("Location: pending_student.php?id=$complaint_id");  // Pass the complaint_id in the URL
            exit();
        }


        // Close the statement
        $stmt->close();
    } else {
        // Success: Show success toast
        $toast_message = "There is an error, contact developers!";
        $toast_class = "Failed";
    }
}
if (isset($_POST['print'])) {
    // Get the complaint_id from the POST data
    $complaint_id = $_POST['complaint_id'];
    // Redirect to the print page with the ID as a query parameter
    header("Location: complaint_print.php?id=$complaint_id");
    exit();
}

$conn->close();
?>

<div id="main">

    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="container-fluid bg-white mt-2 rounded-lg border">
            <a href="complaint_teacher.php" class="btn btn-outline-danger float-left mt-3"><i class="fas fa-arrow-left"></i>
            </a>
            <div class="row pt-2 text-center">
                <h3 class="p-2 text-success"><strong>COMPLAINT DETAILS</strong></h3>

            </div>
        </div>
        <div class="container-fluid bg-white mt-2 rounded-lg border">

            <!-- Wrap the entire form in one tag -->
            <form action="" method="post">

                <!-- Victim Details -->
                <div class="container-fluid bg-white rounded-lg">
                    <h5 class="text-center text-black p-2 rounded-lg"><b>Victim Details</b></h5>
                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <strong>First Name:</strong>
                            <input type="text" class="form-control" name="victimFirstName"
                                value="<?php echo htmlspecialchars($complaint_data['victimFirstName'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Middle Name:</strong>
                            <input type="text" class="form-control" name="victimMiddleName"
                                value="<?php echo htmlspecialchars($complaint_data['victimMiddleName'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Last Name:</strong>
                            <input type="text" class="form-control" name="victimLastName"
                                value="<?php echo htmlspecialchars($complaint_data['victimLastName'] ?? ''); ?>" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <strong>Date of Birth:</strong>
                            <input type="date" class="form-control" name="victimDOB"
                                value="<?php echo htmlspecialchars($complaint_data['victimDOB'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <strong>Sex:</strong>
                            <select class="form-control" name="victimSex" required>
                                <option value="Male" <?php echo (isset($complaint_data['victimSex']) && $complaint_data['victimSex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo (isset($complaint_data['victimSex']) && $complaint_data['victimSex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row mt-3 pb-4">
                        <div class="col-md-3">
                            <strong>Grade:</strong>
                            <select class="form-control" name="victimGrade">
                                <option value="11" <?php echo (isset($complaint_data['victimGrade']) && $complaint_data['victimGrade'] == '11') ? 'selected' : ''; ?>>11</option>
                                <option value="12" <?php echo (isset($complaint_data['victimGrade']) && $complaint_data['victimGrade'] == '12') ? 'selected' : ''; ?>>12</option>
                            </select>
                        </div>

                        <div class="col-md-3"><strong>Section:</strong>
                            <input type="text" class="form-control" name="victimSection"
                                value="<?php echo htmlspecialchars($complaint_data['victimSection'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6"><strong>Adviser:</strong>
                            <input type="text" class="form-control" name="victimAdviser"
                                value="<?php echo htmlspecialchars($complaint_data['victimAdviser'] ?? ''); ?>" required>
                        </div>

                    </div>
                </div>

                <div class="form-row mt-3 pb-3">
                    <div class="col-md-6">
                        <div class="container-fluid">
                            <h5 class="text-center"><b>Mother</b></h5>
                            <div class="row">
                                <strong>Name:</strong>
                                <input type="text" class="form-control" name="motherName"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['motherName'] ?? '')); ?>" required>
                            </div>
                            <div class="row mt-3">
                                <strong>Occupation:</strong>
                                <input type="text" class="form-control" name="motherOccupation"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['motherOccupation'] ?? '')); ?>" required>
                            </div>
                            <div class="row mt-3">
                                <strong>Address:</strong>
                                <input type="text" class="form-control" name="motherAddress"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['motherAddress'] ?? '')); ?>" required>
                            </div>
                            <div class="row mt-3">
                                <strong>Contact:</strong>
                                <input type="text" class="form-control" name="motherContact"
                                    value="<?php echo htmlspecialchars($complaint_data['motherContact'] ?? ''); ?>" required pattern="\d{11}"
                                    maxlength="11"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="container-fluid">
                            <h5 class="text-center"><b>Father</b></h5>
                            <div class="row">
                                <strong>Name:</strong>
                                <input type="text" class="form-control" name="fatherName"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['fatherName'] ?? '')); ?>" required>
                            </div>
                            <div class="row mt-3">
                                <strong>Occupation:</strong>
                                <input type="text" class="form-control" name="fatherOccupation"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['fatherOccupation'] ?? '')); ?>" required>
                            </div>
                            <div class="row mt-3">
                                <strong>Address:</strong>
                                <input type="text" class="form-control" name="fatherAddress"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['fatherAddress'] ?? '')); ?>" required>
                            </div>
                            <div class="row mt-3">
                                <strong>Contact:</strong>
                                <input type="text" class="form-control" name="fatherContact"
                                    value="<?php echo htmlspecialchars($complaint_data['fatherContact'] ?? ''); ?>" required pattern="\d{11}"
                                    maxlength="11"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" />
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <!-- complained Details -->
                <div class="container-fluid bg-white pt-2 pb-3 rounded-lg">
                    <h5 class="text-center p-2 rounded-lg"><b>Complained Details</b></h5>
                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <strong>First Name:</strong>
                            <input type="text" class="form-control" name="complainedFirstName"
                                value="<?php echo htmlspecialchars($complaint_data['complainedFirstName'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Middle Name:</strong>
                            <input type="text" class="form-control" name="complainedMiddleName"
                                value="<?php echo htmlspecialchars($complaint_data['complainedMiddleName'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Last Name:</strong>
                            <input type="text" class="form-control" name="complainedLastName"
                                value="<?php echo htmlspecialchars($complaint_data['complainedLastName'] ?? ''); ?>" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-8">
                            <strong>Date of Birth</strong>
                            <input type="date" class="form-control" name="complainedDOB"
                                value="<?php echo htmlspecialchars($complaint_data['complainedDOB'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Sex:</strong>
                            <select class="form-control" name="complainedSex" required>
                                <option value="Male" <?php echo (isset($complaint_data['complainedSex']) && $complaint_data['complainedSex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo (isset($complaint_data['complainedSex']) && $complaint_data['complainedSex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <strong>Designation/Position</strong>
                            <input type="text" class="form-control" name="complainedDesignation"
                                value="<?php echo htmlspecialchars($complaint_data['complainedDesignation'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <strong>Address:</strong>
                            <input type="text" class="form-control" name="complainedAddress"
                                value="<?php echo htmlspecialchars($complaint_data['complainedAddress'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <strong>Contact Number:</strong>
                            <input type="text" class="form-control" name="complainedContact"
                                value="<?php echo htmlspecialchars($complaint_data['complainedContact'] ?? ''); ?>" required pattern="\d{11}"
                                maxlength="11"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" />
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Complainant Details -->
                <div class="container-fluid bg-white pt-2 pb-3 rounded-lg">
                    <h5 class="text-center  p-2 rounded-lg"><b>Complainant Details</b></h5>
                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <strong>First Name:</strong>
                            <input type="text" class="form-control" name="complainantFirstName"
                                value="<?php echo htmlspecialchars($complaint_data['complainantFirstName'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Middle Name:</strong>
                            <input type="text" class="form-control" name="complainantMiddleName"
                                value="<?php echo htmlspecialchars($complaint_data['complainantMiddleName'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Last Name:</strong>
                            <input type="text" class="form-control" name="complainantLastName"
                                value="<?php echo htmlspecialchars($complaint_data['complainantLastName'] ?? ''); ?>" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <strong>Relationship to Victim</strong>
                            <input type="text" class="form-control" name="relationshipToVictim"
                                value="<?php echo htmlspecialchars($complaint_data['relationshipToVictim'] ?? ''); ?>" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <strong>Contact Number:</strong>
                            <input type="text" class="form-control" name="complainantContact"
                                value="<?php echo htmlspecialchars($complaint_data['complainantContact'] ?? ''); ?>" required pattern="\d{11}"
                                maxlength="11"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" />
                        </div>
                        <div class="col-md-6">
                            <strong>Address:</strong>
                            <input type="text" class="form-control" name="complainantAddress"
                                value="<?php echo htmlspecialchars($complaint_data['complainantAddress'] ?? ''); ?>" required>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Case Details -->
                <div class="container-fluid bg-white pt-2 pb-3 rounded-lg">
                    <h5 class="text-center text-black p-2 rounded-lg"><b>Case Details</b></h5>
                    <!-- Case Details Section -->
                    <div class="form-group">
                        <label for="caseDetails"><strong>Case Details:</strong></label>
                        <textarea class="form-control" id="caseDetails" name="caseDetails" rows="5" placeholder="Enter the details of the case..." required><?php echo htmlspecialchars($complaint_data['caseDetails'] ?? ''); ?></textarea>
                    </div>

                    <!-- Action Taken Section -->
                    <div class="form-group">
                        <label for="actionTaken"><strong>Action Taken:</strong></label>
                        <textarea class="form-control" id="actionTaken" name="actionTaken" rows="5" placeholder="Enter the details of the action taken by the school..." required><?php echo htmlspecialchars($complaint_data['actionTaken'] ?? ''); ?></textarea>
                    </div>

                    <!-- Recommendations Section -->
                    <div class="form-group">
                        <label for="recommendations"><strong>Recommendations:</strong></label>
                        <textarea class="form-control" id="recommendations" name="recommendations" rows="5" placeholder="Enter the recommendations of the school..." required><?php echo htmlspecialchars($complaint_data['recommendations'] ?? ''); ?></textarea>
                    </div>

                </div>
                <!-- Buttons -->
                <div class="form-row mt-3 mb-3 float-end">
                    <a href="complaint_delete.php?delete_id=<?php echo $complaint_id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this complaint?');">
                        <i class="bi bi-trash"></i> Delete
                    </a>
                    <!-- Save button -->
                    <button type="submit" name="save" class="btn btn-outline-success ml-2 mr-2">
                        <i class="bi bi-save"></i> Save
                    </button>

                    <!-- Hidden input for complaint ID -->
                    <input type="hidden" name="complaint_id" value="<?php echo $complaint_data['id']; ?>">

                    <!-- Print button -->
                    <button type="submit" name="print" class="btn btn-success">
                        <i class="bi bi-printer"></i> Print
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