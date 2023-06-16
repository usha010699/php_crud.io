<?php
    session_start();
    $db = mysqli_connect('localhost','root','','php_crud');

    if(!$db)
    {
        die("connection failed".mysqli_connect_error());
    }
    else
    {
        echo "connected";
        // print_r($db);
    }
    
    //initialization

    $name = "";
    $email = "";
    $password = "";
    $id=0;
    $update = false;
    $errors = array();

    

    if(isset($_POST['save']))
    {
        $name=  $_POST['name'];
        $email=  $_POST['email'];
        $password =  $_POST['password'];
        
        if(empty($name))
        {
            array_push($errors,"name is required");
        }
        if(empty($email))
        {
            array_push($errors,"email is required");
        }
        if(empty($password))
        {
            array_push($errors,"password is required");
        }
 
        //exist user
        $response =  mysqli_query($db,"SELECT * from user where name='$name' or email = '$email' ");
        $user = mysqli_fetch_assoc($response);

        if($user)
        {
            if($user['name'] === $name)
            {
              array_push($errors,"name is already exists");
            }
            if($user['email'] === $email)
             {
               array_push($errors,"email is already exists");
             }
             
        }

        if(count($errors) == 0)
        {
            $password = md5($password);
        mysqli_query($db,"INSERT INTO user (name,email,password) VALUES ('$name','$email','$password')");
       
        $_SESSION['message']= "Address Saved";
        header('location: ind.php');
        }

    }

    // //..
    if(isset($_POST['update']))
    {
        $id=$_POST['id'];
        $name= $_POST['name'];
        $email=$_POST['email'];
        $password =$_POST['password'];
        
        mysqli_query($db,"UPDATE user SET name = '$name',email = '$email',password = '$password' WHERE id=$id");
        $_SESSION['message']= "Address UPDATED";
        header('location: ind.php');

    }
    // //...

   
    // //...
    if(isset($_GET['del']))
    {
        $id=$_GET['del'];
        
        mysqli_query($db,"DELETE FROM user WHERE id=$id");
        $_SESSION['message']= "Address deleted";
        header('location: ind.php');

    }

    // //...


    if(isset($_POST['login']))
    {
        
        $email  =$_POST['email'];
        $password =$_POST['password'];

        if(empty($email))
        {
            array_push($errors,"email is required");

        }
        if(empty($password))
        {
            array_push($errors,"password is required");
            
        }
        if(count($errors ) == 0)
        {

            $res1 = mysqli_query($db,"SELECT * from user where email = '$email' and password = '$password' ");
            if(mysqli_num_rows($res1) == 1)
            {
                $_SESSION['message'] = $email;
                $_SESSION['success']="logged in";
                header('location: ind.php');
            }
            else
            {
               array_push($errors,"Wrong User"); 
            }
        }
    }
    
?>