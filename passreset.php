<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>passreset</title>
</head>

<body>
    <form action="" method="post">
        <input type="password" placeholder="Password" name="pass"><br>
        <input type="submit" name="submit">
    </form>
    <?php
    $email = $_GET['email'];
    $con = mysqli_connect('localhost', 'root', '', 'test');
    if (!$con) {
        die("error");
    }
    if (isset($_POST['submit'])) {
        $pass = $_POST['pass'];
        $qry = "UPDATE users SET password = '$pass' WHERE email = '$email'";
        if (mysqli_query($con, $qry)) {

            echo "Password Reseted";
        } else {
            echo "Error";
        }
    }
    ?>
</body>

</html>