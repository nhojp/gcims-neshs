<?php
ob_start();

include "head.php";
include "sidebar.php";
include "conn.php";

function calculateAge($birthdate)
{
    $today = new DateTime();
    $dob = new DateTime($birthdate);
    $age = $today->diff($dob)->y;
    return $age;
}


if (isset($_POST['save'])) {
    // Calculate ages
    $victimAge = calculateAge($_POST['victimDOB']);
    $complainedAge = calculateAge($_POST['complainedDOB']);

    $conn->query("SET foreign_key_checks = 0");

    // First, find the last inserted ID
    $sql = "SELECT MAX(id) AS last_id FROM complaints";
    $result = $conn->query($sql);
    $latest_id = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $latest_id = $row['last_id'];
    }


    // Increment the latest ID for the new record
    $new_id = $latest_id + 1;  // Or whatever logic you need to increment

    // Prepare SQL statement
    $sql = "INSERT INTO complaints (
        id, 
        victimFirstName, victimMiddleName, victimLastName, victimDOB, victimAge, victimSex, victimGrade, victimSection, victimAdviser, 
        motherName, motherOccupation, motherAddress, motherContact, 
        fatherName, fatherOccupation, fatherAddress, fatherContact, 
        complainantFirstName, complainantMiddleName, complainantLastName, relationshipToVictim, complainantContact, complainantAddress, 
        complainedFirstName, complainedMiddleName, complainedLastName, complainedDOB, complainedAge, complainedSex, complainedDesignation, complainedAddress, complainedContact, 
        caseDetails, actionTaken, recommendations, status
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending'
    )";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "issssissssssssssssssssssssssisssssss",  // 37 bind variables to match the 37 placeholders
            $new_id,
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
            $_POST['recommendations']
        );

        if ($stmt->execute()) {
            // Success: Set message and redirect to pending_sp.php with the ID
            $toast_message = "Saved successfully!";
            $toast_class = "success";

            // Get the ID of the last inserted record
            $new_id = $conn->insert_id;

            // Redirect to pending_sp.php with the ID
            header("Location: pending_sp.php?id=" . $new_id);
            exit(); // Make sure no further code is executed
        } else {
            $toast_message = "Error: " . $stmt->error;
            $toast_class = "error";
        }
        $stmt->close();
    } else {
        $toast_message = "Error preparing statement!";
        $toast_class = "error";
    }
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
                                value="<?php echo htmlspecialchars($complaint_data['victimFirstName'] ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <strong>Middle Name:</strong>
                            <input type="text" class="form-control" name="victimMiddleName"
                                value="<?php echo htmlspecialchars($complaint_data['victimMiddleName'] ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <strong>Last Name:</strong>
                            <input type="text" class="form-control" name="victimLastName">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <strong>Date of Birth:</strong>
                            <input type="date" class="form-control" name="victimDOB"
                                value="<?php echo htmlspecialchars($complaint_data['victimDOB'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <strong>Sex:</strong>
                            <select class="form-control" name="victimSex">
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
                                value="<?php echo htmlspecialchars($complaint_data['victimSection'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6"><strong>Adviser:</strong>
                            <input type="text" class="form-control" name="victimAdviser"
                                value="<?php echo htmlspecialchars($complaint_data['victimAdviser'] ?? ''); ?>">
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
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['motherName'] ?? '')); ?>">
                            </div>
                            <div class="row mt-3">
                                <strong>Occupation:</strong>
                                <input type="text" class="form-control" name="motherOccupation"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['motherOccupation'] ?? '')); ?>">
                            </div>
                            <div class="row mt-3">
                                <strong>Address:</strong>
                                <input type="text" class="form-control" name="motherAddress"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['motherAddress'] ?? '')); ?>">
                            </div>
                            <div class="row mt-3">
                                <strong>Contact:</strong>
                                <input type="tel" class="form-control" name="motherContact"
                                    value="09" pattern="\d{11}"
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
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['fatherName'] ?? '')); ?>">
                            </div>
                            <div class="row mt-3">
                                <strong>Occupation:</strong>
                                <input type="text" class="form-control" name="fatherOccupation"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['fatherOccupation'] ?? '')); ?>">
                            </div>
                            <div class="row mt-3">
                                <strong>Address:</strong>
                                <input type="text" class="form-control" name="fatherAddress"
                                    value="<?php echo ucwords(htmlspecialchars($complaint_data['fatherAddress'] ?? '')); ?>">
                            </div>
                            <div class="row mt-3">
                                <strong>Contact:</strong>
                                <input type="tel" class="form-control" name="fatherContact"
                                value="09" pattern="\d{11}"
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
                                value="<?php echo htmlspecialchars($complaint_data['complainedFirstName'] ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <strong>Middle Name:</strong>
                            <input type="text" class="form-control" name="complainedMiddleName"
                                value="<?php echo htmlspecialchars($complaint_data['complainedMiddleName'] ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <strong>Last Name:</strong>
                            <input type="text" class="form-control" name="complainedLastName"
                                value="<?php echo htmlspecialchars($complaint_data['complainedLastName'] ?? ''); ?>">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <strong>Date of Birth</strong>
                            <input type="date" class="form-control" name="complainedDOB"
                                value="<?php echo htmlspecialchars($complaint_data['complainedDOB'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <strong>Sex:</strong>
                            <select class="form-control" name="complainedSex">
                                <option value="Male" <?php echo (isset($complaint_data['complainedSex']) && $complaint_data['complainedSex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo (isset($complaint_data['complainedSex']) && $complaint_data['complainedSex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <strong>Designation/Position</strong>
                            <input type="text" class="form-control" name="complainedDesignation"
                                value="<?php echo htmlspecialchars($complaint_data['complainedDesignation'] ?? ''); ?>">
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <strong>Address:</strong>
                            <input type="text" class="form-control" name="complainedAddress"
                                value="<?php echo htmlspecialchars($complaint_data['complainedAddress'] ?? ''); ?>">
                        </div>
                        <div class="col-md-6">
                            <strong>Contact Number:</strong>
                            <input type="text" class="form-control" name="complainedContact"
                            value="09" pattern="\d{11}"
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
                                value="<?php echo htmlspecialchars($complaint_data['complainantFirstName'] ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <strong>Middle Name:</strong>
                            <input type="text" class="form-control" name="complainantMiddleName"
                                value="<?php echo htmlspecialchars($complaint_data['complainantMiddleName'] ?? ''); ?>">
                        </div>
                        <div class="col-md-4">
                            <strong>Last Name:</strong>
                            <input type="text" class="form-control" name="complainantLastName"
                                value="<?php echo htmlspecialchars($complaint_data['complainantLastName'] ?? ''); ?>">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <strong>Relationship to Victim</strong>
                            <input type="text" class="form-control" name="relationshipToVictim"
                                value="<?php echo htmlspecialchars($complaint_data['relationshipToVictim'] ?? ''); ?>">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <strong>Contact Number:</strong>
                            <input type="tel" class="form-control" name="complainantContact"
                            value="09" pattern="\d{11}"
                                maxlength="11"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);" />

                        </div>
                        <div class="col-md-6">
                            <strong>Address:</strong>
                            <input type="text" class="form-control" name="complainantAddress"
                                value="<?php echo htmlspecialchars($complaint_data['complainantAddress'] ?? ''); ?>">
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
                        <textarea class="form-control" id="caseDetails" name="caseDetails" rows="5" placeholder="Enter the details of the case..."><?php echo htmlspecialchars($complaint_data['caseDetails'] ?? ''); ?></textarea>
                    </div>

                    <!-- Action Taken Section -->
                    <div class="form-group">
                        <label for="actionTaken"><strong>Action Taken:</strong></label>
                        <textarea class="form-control" id="actionTaken" name="actionTaken" rows="5" placeholder="Enter the details of the action taken by the school..."><?php echo htmlspecialchars($complaint_data['actionTaken'] ?? ''); ?></textarea>
                    </div>

                    <!-- Recommendations Section -->
                    <div class="form-group">
                        <label for="recommendations"><strong>Recommendations:</strong></label>
                        <textarea class="form-control" id="recommendations" name="recommendations" rows="5" placeholder="Enter the recommendations of the school..."><?php echo htmlspecialchars($complaint_data['recommendations'] ?? ''); ?></textarea>
                    </div>

                </div>
                <!-- Buttons -->
                <div class="form-row mt-3 mb-3 float-end">
                    <!-- Save button -->
                    <button type="submit" name="save" class="btn btn-success mr-2">
                        <i class="bi bi-save"></i> Save
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