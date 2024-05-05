<?php
// Check if the filename is provided as a GET parameter
if(isset($_GET['filename'])) {
    // Define the directory where your files are stored
    $directory = 'files/';

    // Sanitize the filename to prevent directory traversal attacks
    $filename = basename($_GET['filename']);
    $file_path = $directory . $filename;

    // Check if the file exists
    if(file_exists($file_path)) {
        // Set appropriate headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($file_path));

        // Read the file and output its contents
        readfile($file_path);
        exit;
    } else {
        // File not found
        http_response_code(404);
        echo 'File not found.';
        exit;
    }
} else {
    // Filename not provided
    http_response_code(400);
    echo 'Filename not provided.';
    exit;
}
?>
