<?php
// Assuming you already have a database connection $conn
include "conn.php";
session_start(); // Start the session to use session variables

// Check if the 'delete' action was triggered via GET request
if (isset($_GET['delete_id'])) {
    $complaint_id = $_GET['delete_id'];

    // Prepare the DELETE query to remove the record from the database
    $query = "DELETE FROM complaints WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $complaint_id);  // 'i' is for integer (id)
    
    // Execute the query
    if ($stmt->execute()) {
        // Set the success toast message and class in the session
        $_SESSION['toast_message'] = "Complaint deleted successfully!";
        $_SESSION['toast_class'] = "success";  // Bootstrap success class

        // Redirect after deletion to avoid resubmission
        header("Location: complaint_teacher.php");  // Adjust to your page
        exit();
    } else {
        // Set the error toast message
        $_SESSION['toast_message'] = "Error deleting complaint!";
        $_SESSION['toast_class'] = "danger";  // Bootstrap danger class

        // Redirect after failure
        header("Location: complaint_teacher.php");  // Adjust to your page
        exit();
    }
}
?>
