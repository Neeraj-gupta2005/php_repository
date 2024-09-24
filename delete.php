<?php
session_start();
include 'connection.php'; // Include your database connection file

if (isset($_POST['file_id']) && isset($_POST['filename'])) {
    $file_id = $_POST['file_id'];
    $filename = $_POST['filename'];

    // Path to the file
    $file_path = 'files/' . $filename;

    // Check if the file exists and delete it
    if (file_exists($file_path)) {
        unlink($file_path); // Deletes the file from the server
    }

    // Delete the record from the database
    $stmt = $conn->prepare("DELETE FROM uploaded_files WHERE id = ?");
    $stmt->bind_param("i", $file_id);
    
    if ($stmt->execute()) {
        // Success message
        $_SESSION['message-success'] = "File deleted successfully!";
    } else {
        // Error handling
        $_SESSION['message-failed'] = "Error deleting file: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to dashboard
    header("Location: dashboard.php"); // Replace 'dashboard.php' with your actual dashboard page
    exit();
} else {
    // Invalid request, redirect with error message
    $_SESSION['message-failed'] = "Invalid file selection.";
    header("Location: dashboard.php");
    exit();
}
?>
