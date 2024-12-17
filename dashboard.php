<?php
session_start();
ob_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

include "head.php";
include "sidebar.php";
include "conn.php";

// Filters
$filter_section = isset($_GET['section']) ? $_GET['section'] : '';
$filter_grade = isset($_GET['grade']) ? $_GET['grade'] : '';

// Complaints: Fetch the section with the most complaints
$sql_section = "SELECT complainedSection, COUNT(*) as count 
                FROM complaints_student 
                GROUP BY complainedSection 
                ORDER BY count DESC LIMIT 1";
$result_section = $conn->query($sql_section);
$most_complained_section = "";
$most_complained_section_count = 0;
if ($result_section->num_rows > 0) {
    $section_data = $result_section->fetch_assoc();
    $most_complained_section = $section_data['complainedSection'];
    $most_complained_section_count = $section_data['count'];
}

// Complaints: Fetch the grade with the most complaints
$sql_grade = "SELECT complainedGrade, COUNT(*) as count 
              FROM complaints_student
              GROUP BY complainedGrade 
              ORDER BY count DESC LIMIT 1";
$result_grade = $conn->query($sql_grade);
$most_complained_grade = "";
$most_complained_grade_count = 0;
if ($result_grade->num_rows > 0) {
    $grade_data = $result_grade->fetch_assoc();
    $most_complained_grade = $grade_data['complainedGrade'];
    $most_complained_grade_count = $grade_data['count'];
}

// Violation Summary: Fetch violation count based on filters
$filter_query = "WHERE 1";
if (!empty($filter_section)) {
    $filter_query .= " AND vr.section = '" . $conn->real_escape_string($filter_section) . "'";
}
if (!empty($filter_grade)) {
    $filter_query .= " AND vr.grade = '" . $conn->real_escape_string($filter_grade) . "'";
}

$sql_violation = "SELECT v.violation_description, COUNT(*) AS count 
                  FROM violation_reported vr
                  JOIN violation_list v ON vr.violation_description = v.id
                  $filter_query
                  GROUP BY v.violation_description 
                  ORDER BY count DESC";
$result_violation = $conn->query($sql_violation);

$violations_data = [];
$total_violations = 0;

if ($result_violation->num_rows > 0) {
    while ($row = $result_violation->fetch_assoc()) {
        $violations_data[] = $row;
        $total_violations += $row['count'];
    }
}

// Fetch distinct sections and grades for the filter dropdowns
$sections = $conn->query("SELECT DISTINCT section FROM violation_reported");
$grades = $conn->query("SELECT DISTINCT grade FROM violation_reported");

$conn->close();

?>
<div id="main">
    <?php include "header.php"; ?>

    <div class="container-fluid">
        <div class="container-fluid bg-white mt-2 rounded-lg border">
            <div class="row pt-3">
                <div class="col-md-8">
                    <div class="container-fluid pt-2">
                        <h3><strong>Dashboard</strong></h3>
                    </div>
                </div>
                <form method="get" class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <select id="section" name="section" class="form-control" onchange="this.form.submit()">
                                <option value="">All Sections</option>
                                <?php while ($section = $sections->fetch_assoc()) : ?>
                                    <option value="<?php echo htmlspecialchars($section['section']); ?>"
                                        <?php echo ($filter_section == $section['section']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($section['section']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select id="grade" name="grade" class="form-control" onchange="this.form.submit()">
                                <option value="">All Grades</option>
                                <?php while ($grade = $grades->fetch_assoc()) : ?>
                                    <option value="<?php echo htmlspecialchars($grade['grade']); ?>"
                                        <?php echo ($filter_grade == $grade['grade']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($grade['grade']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <canvas id="violationsChart"></canvas>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-success text-white text-center pt-5">
                                <div class="card-body pb-5 ">
                                    <h3>Total Violations</h3>
                                    <h1><strong><?php echo $total_violations; ?></strong></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-3">
                        <h4 class="text-center"><strong>Most Complained</strong></h4>
                        <div class="col-md-6">
                            <div class="card text-center">
                                <div class="card-header bg-outline-success text-success">
                                    <h4><strong>Section</strong></h4>
                                    <h3><strong><?php echo htmlspecialchars($most_complained_section); ?></strong></h3>
                                    <p><strong><?php echo $most_complained_section_count; ?></strong> Complaints</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-center">
                                <div class="card-header bg-outline-success text-success">
                                    <h4><strong>Grade</strong></h4>
                                    <h3><strong><?php echo htmlspecialchars($most_complained_grade); ?></strong></h3>
                                    <p><strong><?php echo $most_complained_grade_count; ?></strong> Complaints</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prepare data for the chart (Violations)
    const violationLabels = <?php echo json_encode(array_column($violations_data, 'violation_description')); ?>;
    const violationData = <?php echo json_encode(array_column($violations_data, 'count')); ?>;

    // Create the bar chart
    const ctx = document.getElementById('violationsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: violationLabels,
            datasets: [{
                label: 'Total Violation',
                data: violationData,
                backgroundColor: 'rgba(0, 128, 0, 0.5)', // Light green
                borderColor: 'rgba(0, 128, 0, 1)', // Darker green

                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Violation Type' // Label for the X-axis
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of commits' // Label for the Y-axis
                    },
                    ticks: {
                        stepSize: 1 // Set the Y-axis to increment by 1
                    }
                }
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



<script>
    function w3_open() {
        document.getElementById("main").style.marginLeft = "25%";
        document.getElementById("mySidebar").style.width = "25%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
    }

    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
</script>
<!-- Add JavaScript to trigger the toast -->
<script>
    document.getElementById("liveToastBtn").addEventListener("click", function() {
        var toast = new bootstrap.Toast(document.getElementById("liveToast"));
        toast.show();
    });
</script>