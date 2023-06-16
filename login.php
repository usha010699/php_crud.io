<?php include('php_code.php'); ?>
<form method="post" action="login.php">
<?php include('errors.php') ?>
          
          <table>
        
              <tr>
                  <td>email</td>
                  <td>
                      <input type="email" name="email"  >
                  </td>
              </tr>
              <tr>
                  <td>password</td>
                  <td>
                      <input type="password" name="password"   >
                  </td>
              </tr>
              <tr>
               
                  <td>
                  <button class="btn" type="submit" name="login" >login</button>
                 <br>
                 <br>
                 <hr>
                 <p>
  		Not yet a member? <a href="ind.php">Sign up</a>
  	</p>          
                              
                  </td>
              </tr>
          </table> 

      </form>