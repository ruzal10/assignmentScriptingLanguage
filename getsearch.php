<?php
    $con = mysqli_connect('localhost', 'root', '', 'test');
    if (!$con) {
        die("error");
    }
    $user = $_GET['input'];
    $sql = "SELECT * FROM users WHERE name LIKE '$user%'";
    if($result = mysqli_query($con,$sql))
    {
        if(mysqli_num_rows($result) > 0)
        {
            $userfound = '';
            while($row = mysqli_fetch_assoc($result))
            {
                $userfound = $userfound . $row['name'] . '<br>';
            }
            echo $userfound;
        }
    
        else{
            echo 'No name found';
        }
        
    }
    
    else
    {
        echo "Error on data fetch ". mysqli_error($con);
    }
    
    $con->close();
    
?>