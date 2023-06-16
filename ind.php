<?php include('php_code.php'); ?>
<?php
  if(isset($_GET['edit']))
  {
      $id=$_GET['edit'];
      $update=true;
      $record = mysqli_query($db,"SELECT * FROM user where id=$id");

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
        <title>Php Crud Operations</title>
    </head>
    <body>
        <form method="post" action="ind.php">
            <?php include('errors.php')?>
          
            <table>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>
                        <input type="email" name="email" value="<?php echo $email; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>password</td>
                    <td>
                        <input type="password" name="password" value="<?php echo $password; ?>"  >
                    </td>
                </tr>
                <tr>
                 
                    <td colspan="2">
                       
                         
                    <?php if ($update == true): ?>
                    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save" >Save</button>
                <?php endif ?>
                                
                    </td>
                </tr>
            </table> 

        </form>

        <?php if (isset($_SESSION['message'])): ?>
	
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	
      <?php endif ?>

        <?php $results  = mysqli_query($db,"SELECT * FROM user" );?>
        <table>
        <thead>
            <tr>
               
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  while($row = mysqli_fetch_array($results)) { ?>
                <tr>
                <td> <?php  echo $row['name']?> </td>
                <td> <?php  echo $row['email']?> </td>
                <td> <?php  echo $row['password']?> </td>
                <td>
                    <a href="ind.php?edit=<?php echo $row['id']; ?>">Edit</a>

                    <a href="php_code.php?del=<?php echo $row['id']; ?>">Delete</a>
                </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>