<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "BhanuPratap2505";
    $database = "trip";

    $con = mysqli_connect($server,$username,$password,$database);

    if(!$con){
        die("Connection failed ".mysqli_connect_error());
    }
    // echo "Successfully connected to ".$server;
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];



    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES 
    ('$name', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP);";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin Sans">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Greece">
    <div class = "container">
        <h1> Welcome to Travel Form </h1>
        <p> Enter your details and submit this form to confirm your participation in the trip.</p>
        <?php
            if($insert == true){
                echo "<p class ='submitMsg'> Thanks for Submitting the form.</p>";
            }    
        ?>
        <form action="index.php" method = "post">
            <input type="text" name ="name" id ="name" placeholder="Enter Your Name">
            <input type="text" name ="age" id ="age" placeholder="Enter Your Age">
            <input type="text" name ="gender" id ="gender" placeholder="Enter Your gender">
            <input type="text" name ="email" id ="email" placeholder="Enter Your email">
            <input type="text" name ="phone" id ="phone" placeholder="Enter Your phone">
            <textarea name="desc" id="desc" cols="30" rows=""10
            placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src = "index.js"></script>
    
</body>
</html>