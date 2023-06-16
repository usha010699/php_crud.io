<?php include('php_code1.php') ?>
<?php 
 if(isset($_GET['edit']))
 {
    $id=$_GET['edit'];
    $update = true;
    $record = mysqli_query($db,"SELECT * from user where id=$id");
    if(count($record) == 1)
    {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $email = $n['email'];
        $password = $n['password'];
    }
 }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Crud</title>
    </head>
    <body>
        <form method="post" action="php_code1.php">
            <table>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td> <input type="text" name="name" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td> <input type="email" name="email" value="<?php echo $email; ?>"></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td> <input type="password" name="password" value="<?php echo $password; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php  if($update == true) :?>
                        <button type="submit" name="update">update </button>
                        <?php else :?>
                        <button type="submit" name="save">save </button>
                        <?php endif ?>
                    </td>
                </tr>
            </table>
        </form>
        


      <?php  if(isset($_SESSION['message'])) :?>
        <?php echo $_SESSION['message'];
              unset($_SESSION['message']);
        
        ?>
        <?php endif ?>
       
 

       <?php $res = mysqli_query($db,"SELECT * FROM user"); ?>
       <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>Password</th>
                <th colspan ="2">Action</th>
            </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($res)) {?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <a href="ind1.php?edit=<?php echo $row['id'];?>">edit</a>
                    <a href="php_code1.php?del=<?php echo $row['id'];?>">delete</a>
                </td>
            </tr>
            
        <?php  } ?>
      </tbody>
      </table>


    </body>
</html>

