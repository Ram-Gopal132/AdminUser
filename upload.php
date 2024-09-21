<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
<center>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Select a file to upload:</label>
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>


<?php
if(isset($_POST['submit'])){
    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'mynewdata');

    // Check if the form is submitted and file is uploaded
    if(!empty($_FILES['file']['name'])){
        // Get file info
        $fileName = basename($_FILES['file']['name']);
        $fileType = $_FILES['file']['type'];
        $fileSize = $_FILES['file']['size'];
        $folder = "./image/" . $filename;
        
        // Define the upload directory
       // $uploadDir = 'uploads/';
       // $filePath = $uploadDir . $fileName;
        
        // Move the uploaded file to the server directory
       // if(move_uploaded_file($_FILES['file']['tmp_name'], $filePath)){
            // Insert file information into the database
            $stmt = $conn->prepare("INSERT INTO files (filename, filesize, filetype) VALUES (?, ?, ?)");
            $stmt->bind_param("sis", $fileName,$fileSize,$fileType);
            
            if($stmt->execute()){
                echo "File uploaded successfully!";
            } else {
                echo "Failed to upload file to the database.";
            }
            $stmt->close();
    //     } else {
    //         echo "Failed to move the file.";
    //     }
    // } else {
    //     echo "Please select a file to upload.";
     }

    // Close the database connection
    $conn->close();
}
?>

</center>  
</body>
</html>