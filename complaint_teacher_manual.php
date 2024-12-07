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

function calculateAge($birthdate)
{
    $today = new DateTime();
    $dob = new DateTime($birthdate);
    $age = $today->diff($dob)->y;
    return $age;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and capture the data
    $victimFirstName = htmlspecialchars($_POST['victimFirstName']);
    $victimMiddleName = htmlspecialchars($_POST['victimMiddleName']);
    $victimLastName = htmlspecialchars($_POST['victimLastName']);
    $victimDOB = htmlspecialchars($_POST['victimDOB']);
    $victimSex = htmlspecialchars($_POST['victimSex']);
    $victimGrade = htmlspecialchars($_POST['victimGrade']);
    $victimSection = htmlspecialchars($_POST['victimSection']);
    $victimAdviser = htmlspecialchars($_POST['victimAdviser']);

    $motherName = htmlspecialchars($_POST['motherName']);
    $motherOccupation = htmlspecialchars($_POST['motherOccupation']);
    $motherAddress = htmlspecialchars($_POST['motherAddress']);
    $motherContact = htmlspecialchars($_POST['motherContact']);

    $fatherName = htmlspecialchars($_POST['fatherName']);
    $fatherOccupation = htmlspecialchars($_POST['fatherOccupation']);
    $fatherAddress = htmlspecialchars($_POST['fatherAddress']);
    $fatherContact = htmlspecialchars($_POST['fatherContact']);

    $complainantFirstName = htmlspecialchars($_POST['complainantFirstName']);
    $complainantMiddleName = htmlspecialchars($_POST['complainantMiddleName']);
    $complainantLastName = htmlspecialchars($_POST['complainantLastName']);
    $relationshipToVictim = htmlspecialchars($_POST['relationshipToVictim']);
    $complainantContact = htmlspecialchars($_POST['complainantContact']);
    $complainantAddress = htmlspecialchars($_POST['complainantAddress']);
    $caseDetails = htmlspecialchars($_POST['caseDetails']);
    $actionTaken = htmlspecialchars($_POST['actionTaken']);
    $recommendations = htmlspecialchars($_POST['recommendations']);

    $complainedFirstName = htmlspecialchars($_POST['complainedFirstName']);
    $complainedMiddleName = htmlspecialchars($_POST['complainedMiddleName']);
    $complainedLastName = htmlspecialchars($_POST['complainedLastName']);
    $complainedDOB = htmlspecialchars($_POST['complainedDOB']);
    $complainedSex = htmlspecialchars($_POST['complainedSex']);
    $complainedDesignation = htmlspecialchars($_POST['complainedDesignation']);
    $complainedContact = htmlspecialchars($_POST['complainedContact']);
    $complainedAddress = htmlspecialchars($_POST['complainedAddress']);

    $victimAge = calculateAge($victimDOB);
    $complainedAge = calculateAge($complainedDOB);

    // Disable foreign key checks temporarily
    mysqli_query($conn, "SET foreign_key_checks = 0");

    // SQL Query to insert data
    $sql = "INSERT INTO `complaints` (
        `victimFirstName`, `victimMiddleName`, `victimLastName`, `victimDOB`, 
        `victimAge`, `victimSex`, `victimGrade`, `victimSection`, `victimAdviser`, 
        `motherName`, `motherOccupation`, `motherAddress`, `motherContact`, 
        `fatherName`, `fatherOccupation`, `fatherAddress`, `fatherContact`, 
        `complainantFirstName`, `complainantMiddleName`, `complainantLastName`, 
        `relationshipToVictim`, `complainantContact`, `complainantAddress`, 
        `caseDetails`, `actionTaken`, `recommendations`, 
        `complainedFirstName`, `complainedMiddleName`, `complainedLastName`, 
        `complainedDOB`, `complainedAge`, `complainedSex`, `complainedDesignation`, 
        `complainedContact`, `complainedAddress`
    ) VALUES (
        '$victimFirstName', '$victimMiddleName', '$victimLastName', '$victimDOB', 
        '$victimAge', '$victimSex', '$victimGrade', '$victimSection', '$victimAdviser', 
        '$motherName', '$motherOccupation', '$motherAddress', '$motherContact', 
        '$fatherName', '$fatherOccupation', '$fatherAddress', '$fatherContact', 
        '$complainantFirstName', '$complainantMiddleName', '$complainantLastName', 
        '$relationshipToVictim', '$complainantContact', '$complainantAddress', 
        '$caseDetails', '$actionTaken', '$recommendations', 
        '$complainedFirstName', '$complainedMiddleName', '$complainedLastName', 
        '$complainedDOB', '$complainedAge', '$complainedSex', '$complainedDesignation', 
        '$complainedContact', '$complainedAddress'
    )";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        // Success: Show success toast
        $toast_message = "Complaint successfully submitted.";
        $toast_class = "success";
    } else {
        // Error: Show error toast
        $toast_message = "Error: " . mysqli_error($conn);
        $toast_class = "Error";
    }

    // Re-enable foreign key checks
    mysqli_query($conn, "SET foreign_key_checks = 1");
}
?>


<div id="main">

    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="container-fluid bg-white mt-2 rounded-lg border">
            <div class="row pt-3">
                <div class="col-md-6">
                    <div class="container-fluid">
                        <h3 class="p-2"><strong>COMPLAINT DETAILS</strong></h3>
                    </div>
                </div>
            </div>

            <div class="container-fluid bg-white rounded-lg">
                <form action="" method="post">
                    <h5 class="text-center bg-custom text-success p-2 rounded-lg"><b>Victim Details</b></h5>
                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <strong>First Name:</strong>
                            <input type="text" class="form-control" name="victimFirstName" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Middle Name:</strong>
                            <input type="text" class="form-control" name="victimMiddleName" required>
                        </div>
                        <div class="col-md-4">
                            <strong>Last Name:</strong>
                            <input type="text" class="form-control" name="victimLastName" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-8"><strong>Date of Birth:</strong>
                            <input type="date" class="form-control" name="victimDOB" required>
                        </div>

                        <div class="col-md-4">
                            <strong>Sex:</strong>
                            <select class="form-control" name="victimSex" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mt-3 pb-4">
                        <div class="col-md-3"><strong>Grade:</strong>
                            <input type="text" class="form-control" name="victimGrade" required>
                        </div>
                        <div class="col-md-3"><strong>Section:</strong>
                            <input type="text" class="form-control" name="victimSection" required>
                        </div>
                        <div class="col-md-6"><strong>Adviser:</strong>
                            <input type="text" class="form-control" name="victimAdviser" required>
                        </div>
                    </div>

                    <hr>

                    <div class="form-row mt-3 pb-4">
                        <!-- Mother Information -->
                        <div class="col-md-6">
                            <h5 class="text-center bg-custom text-success p-2 rounded-lg"><b>Mother Details</b></h5>
                            <div class="form-row">
                                <div class="col-md-12 pb-2">
                                    <strong>Name:</strong>
                                    <input type="text" class="form-control" name="motherName" required>
                                </div>
                                <div class="col-md-12 pb-2">
                                    <strong>Occupation:</strong>
                                    <input type="text" class="form-control" name="motherOccupation" required>
                                </div>
                                <div class="col-md-12 pb-2">
                                    <strong>Address:</strong>
                                    <input type="text" class="form-control" name="motherAddress" required>
                                </div>
                                <div class="col-md-12 pb-2">
                                    <strong>Contact:</strong>
                                    <input type="text" class="form-control" name="motherContact" required pattern="\d{11}" maxlength="11" title="Please enter exactly 11 digits.">
                                </div>
                            </div>
                        </div>

                        <!-- Father Information -->
                        <div class="col-md-6">
                            <h5 class="text-center bg-custom text-success p-2 rounded-lg"><b>Father Details</b></h5>
                            <div class="form-row">
                                <div class="col-md-12 pb-2">
                                    <strong>Name:</strong>
                                    <input type="text" class="form-control" name="fatherName" required>
                                </div>
                                <div class="col-md-12 pb-2">
                                    <strong>Occupation:</strong>
                                    <input type="text" class="form-control" name="fatherOccupation" required>
                                </div>
                                <div class="col-md-12 pb-2">
                                    <strong>Address:</strong>
                                    <input type="text" class="form-control" name="fatherAddress" required>
                                </div>
                                <div class="col-md-12 pb-2">
                                    <strong>Contact:</strong>
                                    <input type="text" class="form-control" name="fatherContact" required pattern="\d{11}" maxlength="11" title="Please enter exactly 11 digits.">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="container-fluid bg-white pt-4 mt-2 rounded-lg">
                        <h5 class="text-center bg-custom text-success p-2 rounded-lg"><b>Offender Details</b></h5>
                        <div class="form-row mt-3">
                            <div class="col-md-4">
                                <strong>First Name:</strong>
                                <input type="text" class="form-control" name="complainedFirstName" required>
                            </div>
                            <div class="col-md-4">
                                <strong>Middle Name:</strong>
                                <input type="text" class="form-control" name="complainedMiddleName" required>
                            </div>
                            <div class="col-md-4">
                                <strong>Last Name:</strong>
                                <input type="text" class="form-control" name="complainedLastName" required>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col-md-8">
                                <strong>Date of Birth:</strong>
                                <input type="date" class="form-control" name="complainedDOB" required>
                            </div>

                            <div class="col-md-4">
                                <strong>Sex:</strong>
                                <select class="form-control" name="complainedSex" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col-md-12">
                                <strong>Designation/Position:</strong>
                                <input type="text" class="form-control" name="complainedDesignation" required>
                            </div>
                        </div>

                        <div class="form-row mt-3 pb-3">
                            <div class="col-md-6">
                                <strong>Address:</strong>
                                <input type="text" class="form-control" name="complainedAddress" required>
                            </div>
                            <div class="col-md-6">
                                <strong>Contact:</strong>
                                <input type="text" class="form-control" name="complainedContact" required pattern="\d{11}" maxlength="11" title="Please enter exactly 11 digits.">
                            </div>
                        </div>

                    </div>
                    <hr>

                    <div class="container-fluid bg-white pt-4 mt-2 rounded-lg">
                        <h5 class="text-center bg-custom text-success p-2 rounded-lg"><b>Complainant Details</b></h5>
                        <div class="form-row mt-3">
                            <div class="form-group col-md-4">
                                <label for="complainantFirstName"><strong>First Name:</strong></label>
                                <input type="text" class="form-control" id="complainantFirstName" name="complainantFirstName" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="complainantMiddleName"><strong>Middle Name:</strong></label>
                                <input type="text" class="form-control" id="complainantMiddleName" name="complainantMiddleName" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="complainantLastName"><strong>Last Name:</strong></label>
                                <input type="text" class="form-control" id="complainantLastName" name="complainantLastName" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="relationshipToVictim"><strong>Relationship to Victim:</strong></label>
                            <input type="text" class="form-control" id="relationshipToVictim" name="relationshipToVictim" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="complainantContact"><strong>Contact Number:</strong></label>
                                <input type="text" class="form-control" id="complainantContact" name="complainantContact" required pattern="\d{11}"
                                    maxlength="11"
                                    title="Please enter exactly 11 digits.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="complainantAddress"><strong>Address:</strong></label>
                                <input type="text" class="form-control" id="complainantAddress" name="complainantAddress" required>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="container-fluid bg-white p-4 rounded-lg mt-4">
                        <h5 class="text-center bg-custom text-success p-2 rounded-lg"><b>Details of the Case</b></h5>

                        <div class="form-group">
                            <textarea class="form-control" id="caseDetails" name="caseDetails" rows="5" placeholder="Enter the Details of the case..." required></textarea>
                        </div>

                        <h5 class="text-center bg-custom text-success p-2 rounded-lg"><b>Action Taken</b></h5>
                        <div class="form-group">
                            <textarea class="form-control" id="actionTaken" name="actionTaken" rows="5" placeholder="Enter the Details of the action taken by the school..." required></textarea>
                        </div>

                        <h5 class="text-center bg-custom text-success p-2 rounded-lg"><b>Recommendations</b></h5>
                        <div class="form-group">
                            <textarea class="form-control" id="recommendations" name="recommendations" rows="5" placeholder="Enter the recommendation of the school..." required></textarea>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit Complaint</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "toast.php";
include "footer.php";
?>