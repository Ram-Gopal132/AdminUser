<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

table{ 
    margin-left:10%;
    width:80%;
    border-style: inset;
    border-color: #96D4D4;
}
 th, td {
    
  border-color: red;
  background-color:lightyellow;
  border-style: inset;
}


    </style>
</head>
<body>

<div>
<table border=10>
            <thead>
                <th>ID</th>
                <th>Image</th>
                <th>FileName</th>
                <th>FileType</th>
                <th>FileSize</th>
                <th>Upload Time</th>
                <th></th>
            </thead>
            <tbody>

<?php

$dbo=mysqli_connect("localhost","root","","mynewdata");
$sql= "SELECT * FROM image";
$result=mysqli_query($dbo,$sql);

//echo "<table border=2>";

while($row=mysqli_fetch_array($result))
{

?>

<tr>
         <td><?php echo $row['id']; ?></td>
        <td> <img src="<?php echo $row['name']; ?>" height="100"width="100"><?php</td>
        <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['type']; ?></td>
         <td><?php echo $row['size']; ?></td>
         <td><?php echo $row['upload_time']; ?></td>
         <td><a href="showimage.php?id=<?php echo $row['id'] ?>">Download</a></td>
</tr>         
  <?php
                    }
                ?>
            </tbody>
        </table>  
        </div>


        

   
</body>
</html>








