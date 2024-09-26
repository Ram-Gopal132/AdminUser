<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert image</title>

</head>
<body>
<form action="insertimage.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="file"><br>
    <input type="submit" name="btn" value="Upload">
</form>

<?php
if(isset($_POST['btn']))
{


    $conn=mysqli_connect("localhost","root","","mynewdata");

    
    
        // Prepare SQL query to insert file
        $sql = "INSERT INTO image (name, type, size) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);

        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];
            $fileSize = $_FILES['file']['size'];
            $fileTmpName = $_FILES['file']['tmp_name'];
        
            // Read file content into a variable
            $fileContent = file_get_contents($fileTmpName);

        // Bind parameters
    $stmt->bind_param('ssi', $fileName,$fileType,$fileSize);
    
   

    // Execute the query
    if ($stmt->execute()) {
        echo "File uploaded and inserted successfully!";
    } else {
        echo "Failed to upload and insert file.";
    }
} else {
    echo "No file uploaded or there was an error uploading the file.";
}
   

}


?>

</body>
</html>