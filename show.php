<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    
    , initial-scale=1.0">
    <title>Document</title>

    <style>

#display-image{
    width: 100%;
    justify-content: center;
    padding: 5px;
    margin: 15px;
}
img{
    margin: 5px;
    width: 350px;
    height: 250px;
}
    </style>
</head>
<body>
    

<div id="display-image">

<?php

$conn=mysqli_connect("localhost","root","","mynewdata");
    
        $query = " select * from files";
        $result = mysqli_query($conn, $query);

        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <img src="./image/<?php echo $data['filename']; ?>">

        <?php
        }
        ?>

    </div>
</body>
</html>