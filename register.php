<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div>
        <h1>User Registration</h1>
        <form action="" method="post">
            <input type="text" placeholder="Username" name="user"><br>
            <input type="email" placeholder="Email" name="email"><br>
            <input type="password" placeholder="Password" name="pass"><br>
            <input type="submit" name="submit">
        </form>
    </div>

    <?php
    $con = mysqli_connect('localhost', 'root', '', 'test');
    if (!$con) {
        die("error");
    }
    if (isset($_POST['submit'])) {
        $name = $_POST['user'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $qry2 = "SELECT id FROM users WHERE name='$name' OR email = '$email'";
        $qry = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$pass')";
        $row = mysqli_query($con, $qry2);
        if (mysqli_num_rows($row) > 0) {

            echo "Username and email already exists";
        } else {
            mysqli_query($con, $qry);
            echo "you are registered";
        }
    }
    ?>
</body>

</html>