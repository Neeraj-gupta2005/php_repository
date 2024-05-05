<?php
    include("connection.php");
    session_start();
    $username = $_SESSION['username'] ;
    if(!isset($username)){
        header('location:signin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dash.css">
</head>
<body>
    <div class="navbar">
        <div class="logopart">
            <h1 class="logo">YourREPO</h1>
        </div>
        
        <form action="#" method="post">            
                <div class="bar">
                    <input type="search" name="search" class="searchbar" placeholder="Search in YourREPO">
                    <button type="submit" class="searchbtn"><i class="fas fa-search"></i></button>
                </div>
        </form>
        <div class="sign-out-div">
            <a href="logout.php"><button class="sign-out-btn">Sign Out</button></a>
        </div>
    </div>
    <!-- file will be showed here -->
    <div class="main">
        <!-- left part of the main-->
        <div class="left-part">
            <?php echo '<p class="welcome">Welcome, ' . ucfirst($_SESSION["username"]) . '</p>'; ?>
 
            <!-- folders will appear in this  -->
            <div class="folder">
            <?php
                // Function to format file size
                function formatSize($bytes) {
                $kb = $bytes / 1024;
                    if ($kb < 1024) {
                        return round($kb, 2) . ' KB'; // If size is less than 1 MB, display in KB
                    } else {
                        return round($kb / 1024, 2) . ' MB'; // If size is 1 MB or more, display in MB
                    }
                }

                // Prepare SQL statement to retrieve file details for the signed-in user
                $query = "SELECT * FROM uploaded_files WHERE user_id = (SELECT id FROM register WHERE username = '$username')";
                            
                // Execute SQL statement
                $result = mysqli_query($conn, $query);

                // Display uploaded files as cards
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Display file details as a card
                        echo '
                            <div class="cards">
                                <div class="upper">
                                    <div class="name">
                                        <span class="icon"><i class="fa-solid fa-file"></i></span>
                                        <span class="text">' . $row["filename"] . '</span>
                                    </div>
                                    <div class="download">
                                        <form  method="post">
                                            <button type="submit" value="donwload"><i class="fa-solid fa-download"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="photo">
                                    <img src="files/' . $row["filename"] . '"  alt="File Image">
                                </div>
                                <div class="lower">
                                    <div class="lower-left">
                                        <p>You uploaded ' .date("Y-m-d", strtotime($row["upload_date"])). '</p>
                                    </div>
                                    <div class="lower-right">
                                        <p>Size ' .formatSize($row["filesize"]). '</p>
                                    </div>   
                                </div>
                            </div>';
                }}
            ?>
            </div>
        </div>
        <!-- right part of the main  -->
        <div class="right-part">
            <!-- php script to upload a file -->
            <form action="#" method="post" enctype="multipart/form-data" >
                <input type="file" name="file" class="choose">
                <button type="submit" name="submit" class="upload-btn"><i class="fa-solid fa-plus"></i> Upload</button>
                <?php
            if(isset($_POST['submit'])) {
                // Check if a file is selected for upload
                if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                    // Process file upload
                    $filename = $_FILES['file']['name'];
                    $filesize = $_FILES['file']['size'];
                    $temp_name = $_FILES['file']['tmp_name'];
            
                    // Move uploaded file to destination folder
                    $folder = __DIR__ . "/files/" . $filename;
                    if(move_uploaded_file($temp_name, $folder)) {
                        // Check if file already exists for the user
                        $query = "SELECT * FROM uploaded_files WHERE filename = '$filename' AND user_id = (SELECT id FROM register WHERE username = '$username')";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) == 0) {
                            // Insert file details into the uploaded_files table
                            $query = "INSERT INTO uploaded_files (filename, filesize, upload_date, user_id) VALUES ('$filename', '$filesize', NOW(), (SELECT id FROM register WHERE username = '$username'))";
                            if(mysqli_query($conn, $query)) {
                                // Update upload count
                                $query = "UPDATE register SET uploads = uploads + 1 WHERE username = '$username'";
                                mysqli_query($conn, $query);
                                echo "File uploaded successfully.";
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        } else {
                            echo '  <div class="error-box">
                                        <p class="error-message">Error: File already exists.</p>
                                    </div>';
                        }
                    } else {
                        echo "Error uploading file.";
                    }
                } else {
                    echo "No file selected for upload.";
                }
            }
            
        ?>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/9dd236e792.js" crossorigin="anonymous"></script>
    <script src="js/hover.js"></script>
</body>
</html>

