<?php
session_start();
$db  = mysqli_connect('localhost','root','','php_crud');

if(!$db)
{
    die("connection failed".mysqli_connect_error());
}
else{
    echo "connected";
}

//initialization

$name="";
$email="";
$password="";
$id=0;
$update=false;

//insert

if(isset($_POST['save']))
{
    $name=$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($db,"INSERT INTO user (name,email,password)VALUES('$name','$email','$password')");
    $_SESSION['message']="Address Saved";
    header('location:ind1.php');
}

//update
if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($db,"UPDATE user SET name='$name',email='$email',password='$password' where id=$id");
    $_SESSION['message']="Address Updated";
    header('location:ind1.php');
}

//delete

if(isset($_GET['del']))
{
    $id=$_GET['del'];


    mysqli_query($db,"DELETE from user where id=$id");
    $_SESSION['message']="Address Deleted";
    header('location:ind1.php');
}

?>