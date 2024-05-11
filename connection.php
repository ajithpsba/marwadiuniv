<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="./images/favicon-removebg-preview.png" type="image/icon type">
    <style>
        .button{
        border-radius: 25px;
		padding: 10PX;
		width: 200px;
		color: white;
		background:rgb(221, 56, 56);
        margin-top:20%;
        }
    </style>
</head>
<body>
    

<?php
include "config.php"; 

$firstname=$_POST['first-name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];
$country=$_POST['country'];

// $servername="localhost";
// $username="root";
// $password="";
// $dbname="marwadiuni";

$conn = @new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die('Connection Failed :'.$conn->connect_error);
}
else
{
    $stmt=$conn->prepare("insert into contact(firstname,email,mobile,city,country) values(?,?,?,?,?)");
    $stmt->bind_param("ssiss",$firstname,$email,$mobile,$city,$country);
    echo "<script>window.location.href='index.html';</script>";
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
    

