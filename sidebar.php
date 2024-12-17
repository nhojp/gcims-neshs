<div class="w3-sidebar w3-bar-block w3-card w3-animate-left gc-green text-success" style="display:none; position: relative;" id="mySidebar">
    <button class="w3-bar-item w3-button w3-xlarge text-success text-right" onclick="w3_close()">&times;</button>

    <!-- Dashboard -->
    <a href="dashboard.php" class="w3-bar-item w3-button text-success text-decoration-none">
        <i class="fas fa-chart-line m-3"></i>Dashboard
    </a>

    <!-- Complaints -->
    <a class="w3-bar-item w3-button text-success text-decoration-none" data-toggle="collapse" href="#complaints" role="button" aria-expanded="false" aria-controls="complaints">
        <i class="fas fa-exclamation-circle m-3"></i> Complaints
    </a>
    <div class="collapse" id="complaints">
        <a href="complaint_teacher.php" class="w3-bar-item w3-button text-success pl-5 ml-5 text-decoration-none">
            <i class="fas fa-user-tie mr-2"></i> School Personnel
        </a>
        <a href="complaint_student.php" class="w3-bar-item w3-button text-success pl-5 ml-5 text-decoration-none">
            <i class="fas fa-user-graduate mr-2"></i> Student
        </a>
    </div>

    <!-- Generate Good Moral -->
    <a href="gen-goodmoral.php" class="w3-bar-item w3-button text-success text-decoration-none">
        <i class="fas fa-file-alt m-3"></i>Generate Good Moral
    </a>

    <!-- Violations -->
    <a href="violators.php" class="w3-bar-item w3-button text-success text-decoration-none">
        <i class="fas fa-ban m-3"></i>Violations
    </a>

    <!-- Students List -->
    <a href="student.php" class="w3-bar-item w3-button text-success text-decoration-none">
        <i class="fas fa-users m-3"></i>Students List
    </a>

    <!-- School -->
    <a class="w3-bar-item w3-button text-success text-decoration-none" data-toggle="collapse" href="#school" role="button" aria-expanded="false" aria-controls="school">
        <i class="fas fa-school m-3"></i> School
    </a>
    <div class="collapse" id="school">
        <a href="strands.php" class="w3-bar-item w3-button text-success pl-5 ml-5 text-decoration-none">
            <i class="fas fa-book-open mr-2"></i> Strands
        </a>
        <a href="sections.php" class="w3-bar-item w3-button text-success pl-5 ml-5 text-decoration-none">
            <i class="fas fa-chalkboard-teacher mr-2"></i> Sections
        </a>
        <a href="school_year.php" class="w3-bar-item w3-button text-success pl-5 ml-5 text-decoration-none">
            <i class="fas fa-calendar-alt mr-2"></i> School Years
        </a>
        <a href="teachers.php" class="w3-bar-item w3-button text-success pl-5 ml-5 text-decoration-none">
            <i class="fas fa-user-tie mr-2"></i> Teachers
        </a>
    </div>

    <!-- Calendar -->
    <a href="#" class="w3-bar-item w3-button text-success text-decoration-none">
        <i class="fas fa-calendar-alt m-3"></i> Calendar
    </a>

    <!-- Settings -->
    <a href="#" class="w3-bar-item w3-button text-success text-decoration-none">
        <i class="fas fa-cogs m-3"></i> Settings
    </a>

    <!-- Logout button -->
    <a href="#" class="w3-bar-item w3-button text-success text-decoration-none" style="position: absolute; bottom: 0; width: 100%;" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <i class="fas fa-sign-out-alt m-3"></i> Logout
    </a>
</div>


<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content w3-white text-center" style="width: 300px; height: 200px; margin: auto; border-radius: 15px;">
            <div class="modal-header border-0">
                <div class="w-100">
                    <!-- Leaving-themed icon -->
                    <i class="fas fa-sad-tear fa-3x text-warning"></i>
                </div>
            </div>
            <div class="modal-body">
                <h5 class="mt-2">Are you sure you want to log out?</h5>
            </div>
            <div class="modal-footer justify-content-around border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- Link to logout.php -->
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>