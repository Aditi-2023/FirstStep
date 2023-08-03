<?php
$insert=false;
if(isset($_POST['email']))
{
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("Connection to this database failed due to ".mysqli_connect_error());
    }

    //echo "Successfully connected to the database!";

    $email=$_POST['email'];
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $roll=$_POST['roll'];
    $dep;
    $section;

    $sql = "INSERT INTO `placements_db`.`student_details` (`email`, `name`, `contact`, `roll`, `time`) 
    VALUES ('$email', '$name', '$contact', '$roll',  current_timestamp())";
    //echo $sql;

    if($con->query($sql)==true)
    {
        $insert=true;
        //echo "Successfully Inserted";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <form action="form.php" method="post">
        Email: <input type="email" name="email" required>
        Name: <input type="text" name="name" required>
        Contact Number: <input type="text" name="contact" required>
        Roll Number: <input type="text" name="roll" id="">
        <button>Submit</button>                                                                                         
    </form>
    <?php
    if($insert==true){
        echo "Thanks for submitting";
    }
     
     ?>
</body>
</html>