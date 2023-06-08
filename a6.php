<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>Upload Image</div>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="photo">
        <input type="submit" name="submit">
    </form>

    <?php
    $con = mysqli_connect('localhost', 'root', '', 'test');
    if (!$con) {
        die("error");
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Check if file was uploaded without errors
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];
            $tmpname = $_FILES["photo"]["tmp_name"];

            //verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed)) {
                die("Error ! File format not supported");
            }

            //Verify file size 5MB maximum
            $maxsize = 5 * 1024 * 1024; //converted to bytes
            if ($filesize > $maxsize) {
                die("Error ! Cannot upload file larger than 5MB");
            }
            $pic = "images/" . $filename;
            move_uploaded_file($tmpname, $pic);
            // $qry = "INSERT INTO picture(picture) VALUES ('$pic')";
            // mysqli_query($con, $qry);
            // echo "The File has been uploaded";
        }
    } ?>

    <div>
        Uploded image
        <div>
            <img src="<?php echo $pic ?>" alt="">
        </div>
    </div>

</body>

</html>