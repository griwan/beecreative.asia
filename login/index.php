<?php
   session_start();
   include("Config/config.php");
   include("encrypt_decrypt.php");
   

   $encryptor = new Encryption();

   $error = " ";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $mypassword = $encryptor->encode($mypassword);
      
      $sql = "SELECT id, TeacherID FROM admin WHERE username = '$myusername' AND passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      $_SESSION['teacherid'] = $row['TeacherID'];
      //echo $row['id'];
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $sql = "SELECT PID FROM admin WHERE id = $row[id]";
         $privilege = mysqli_query($db, $sql);
         $privilege = mysqli_fetch_array($privilege, MYSQLI_ASSOC);
         $_SESSION['login_user'] = $myusername;
         $_SESSION['privilege'] = $privilege['PID'];

         if($_SESSION['privilege'] == 2)
            header("location: /beecreative.asia/teachers/");
         else if($_SESSION['privilege'] == 1)
            header("location: main.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#ff0000; color:#FFFFFF; padding:3px;"><b><center> Login </center></b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px;"> <?php echo $error; ?>    
               </div>
					
            </div> 
				
         </div>
			
      </div>

   </body>
</html>
