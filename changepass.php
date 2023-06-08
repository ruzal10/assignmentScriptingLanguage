<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change pass</title>
</head>

<body>
    <form action="" method="post">

        <input type="text" placeholder="Username" name="user"><br>
        <input type="email" placeholder="Enter email" name="email">
        <input type="submit" name="submit">
    </form>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'test');
    if (!$con) {
        die("error");
    }
    if (isset($_POST['submit'])) {
        $name = $_POST['user'];
        $email = $_POST['email'];

        $qry2 = "SELECT id FROM users WHERE name='$name' OR email = '$email'";
        $row = mysqli_query($con, $qry2);
        if (mysqli_num_rows($row) == 0) {

            echo "Username and email doesnot exists";
        } else {
            $to = $email;
            $message = "Here you can reset password,http://localhost/test123/passreset.php?email=$email";
            $subject = "Password Reset";
            $header = "From:admin@gmail.com";

            $sendmail = mail($to, $subject, $message, $header);
            if ($sendmail) {
                echo "Email sent successfully. Please check your inbox for further instructions.";
            } else {
                echo "Failed to send the email. Please try again later.";
            }
        }
    }
    ?>
</body>

</html>