<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-toilet login</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, 
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- /google fonts-->
    <!--<script>
        // Defining a function to display error message
        
        // Defining a function to validate form 
        function validateForm(){
            // Retrieving the values of form element
           
            var uname = document.regiform.username.value;
            var pswd = document.regiform.pswd.value;
          
            // Defining error variables with a default value
            var unameErr = pswdErr  = true;
           
          
         
            // Validate Username
            if(uname == "") {
                printError( "Please enter your Username");
                document.regiform.uname.focus();
            } else {
                var regex = /^[0-9a-zA-Z]+$/;             
                if(regex.test(uname) === false) {
                    alert( "Please enter a valid Username Spaces In Name Is Not Allowed");
                } else {
                    
                    unameErr = false;
                }
            }
            // Validate Confirm User name
            
        
        
            // Validate Password
                if(pswd == "") {
                printError("Please enter your Password");
            } else {
                var regex = /^[0-9a-zA-Z]+$/;                
                if(regex.test(pswd) === false) {
                    alert( "Please enter a valid Password");
                } else {
                    pswdErr = false;
                }
            }
        }
        </script>-->

</head>


<body>
    <?php
    require("db.class.php");
    $ob=new db_operations();
    $message=" ";
    if(isset($_POST['sub']))
    {
        $username=$_POST['email'];
        $pass=$_POST['pswd'];
        $select1="select * from login where email='$username'";
        $result=$ob->db_read($select1);
        $arr=mysqli_fetch_array($result);
        if(mysqli_num_rows($result)<=0)
        {
            $message="User not found";
        }
        else if($pass==$arr['1'])
        {
            $_SESSION['email']=$arr['0'];
            if($arr['2']==0)
            {
                $_SESSION['nactive'] = '1';
                header("Location:../../userprofile1/examples/userprofile.php");
            }
            else if($arr['2']==1)
            {
             $_SESSION['mactive'] = '1';
             header("Location:../../userprofile2/examples/userprofile.php");   
            }
            else if($arr['2']==2)
            {
              $_SESSION['muactive'] = '1';
              header("Location:../../userprofile3/examples/userprofile.php");  
            }
            else 
            {
              $_SESSION['aactive'] = '1';
              header("Location:../../admin/examples/userprofile.php");  
            }
        }
        else
        {
            $message="Invalid username or password";
        }
    }
    ?>

    <h1>E-toilet </h1>
    <div class=" w3l-login-form">
        <h2>Sign In Here</h2>
         <?php
              if(isset($_GET['error']))
              {
                if ($_GET['error'] == "psuccess")
                {
                    echo '<p class="perror" style="color: #ff0000">Password Reset Successfull</p>';
                }
             }  
            ?>
        <form action="" name="regiform"  method="POST">

            <div class=" w3l-form-group">
                <label>Email</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="email" id="email" pattern="[0-9a-z._%+-]+@[0-9a-z.-]+\.[a-z]{3,}$"placeholder="Email" minlength="6" required="required" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" name="pswd" id="pswd"  class="form-control" placeholder="Password" size="20"  maxlength="20" minlength="8" required="required" />
                </div>
            </div>
            <center>
            <h4><font color="white">
            <?php
            echo $message
            ?>
        </font></h4>
    </center>
            <div class="forgot">
                <!-- <a href="../../recemail/rec/web/rec.php">Forgot Password?</a> -->
                <p><input type="checkbox">Remember Me</p>
            </div>
            <button name="sub" type="submit">Sign In</button>
        </form>
        <p class=" w3l-register-p">Don't have an account?<a href="../../home/web/index.php" class="register"> Register</a></p>
    </div>
    <footer>
        <!-- <p class="copyright-agileinfo"> &copy; 2018 Material Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p> -->
    </footer>

</body>

</html>