<?php
include 'connection.php';
session_start();
?>
<?php
if(isset($_POST['register'])){
    $s_name=$_POST['s_name'];
    $s_email=$_POST['s_email'];
    $s_contact=$_POST['s_contact'];
    $s_password=$_POST['s_password'];
    $s_re_pass=$_POST['s_re_pass'];
    $roles=2;
    $query1="SELECT * FROM `sign_in_up` where `email`='$s_email' or `user_name`='$s_name'";
    $select1=mysqli_query($connect,$query1);
    $rows=mysqli_num_rows($select1);
    if($rows>0)
    {
        echo'<script>alert("Account Already Registered")</script>';
    }
    else if($s_password==$s_re_pass)
    {
        $query2="INSERT INTO `sign_in_up`(`id`, `user_name`, `email`, `contact`,
         `password`, `confirm_password`, `roles`)
        VALUES (null,'$s_name','$s_email','$s_contact',
        '$s_password','$s_re_pass','$roles')";
        mysqli_query($connect,$query2);
        echo'<script>alert("Account Registered Successfully")</script>'; 
    }
    else
    {
        echo'<script>alert("Password does not match")</script>'; 
    }
}
?>

<?php
if(isset($_POST['login'])){
    $l_email=$_POST['l_email'];
    $l_password=$_POST['l_password'];
    $query2="SELECT * FROM `sign_in_up` where `email`='$l_email'";
    $select2=mysqli_query($connect,$query2);
    $rows=mysqli_num_rows($select2);
    $fetch=mysqli_fetch_assoc($select2);

    $query3="SELECT * FROM `cagent` where `email`='$l_email'";
    $select3=mysqli_query($connect,$query3);
    $rows2=mysqli_num_rows($select3);
    $fetch2=mysqli_fetch_assoc($select3);

    if($rows==1)
    {
        if($l_password==$fetch['password'])
        {
         if($fetch['roles']==1)
         {
          $_SESSION['name1']=$fetch['user_name'];
          header("location:admin/index.php");
         }
         else
         {
          $_SESSION['name']=$fetch['user_name'];
          header("location:user/index.php");
         }
        }
        else
        {
        echo'<script>alert("Incorrect Password")</script>'; 
        }
    }

    if($rows2==1)
    {
        if($l_password==$fetch2['password'])
        {
         if($fetch2['roles']==3)
         {
          $_SESSION['agent']=$fetch2['user_name'];
          header("location:agent/index.php");
         }
        }
        else
        {
        echo'<script>alert("Incorrect Password")</script>'; 
        }
    }
  
    else
    {
        echo'<script>alert("User not registered")</script>'; 
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo'<link rel="stylesheet" href="form.css">'?>
    <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="#" class="sign-in-form" method="POST">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" name="l_email"  required autocomplete="off"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="l_password" required autocomplete="off"/>
            </div>
            <input type="submit" value="Login" class="btn solid" name="login"/>
         
            <div class="social-media">
            
            </div>
          </form>


          <form action="#" class="sign-up-form" method="POST">
            <h2 class="title">Sign up</h2>
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="USERNAME" name='s_name' pattern="[A-Za-z]{1,50}[1-9]{1,50}" title="[A-Za-z][1-9] e.g usman131 OR Usman121" required autocomplete="off"/>
              
            </div>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="EMAIL" name='s_email' pattern="[a-z1-9]+@Cservice.com" title="[a-z1-9]@Cservice.com" required autocomplete="off"/>
              
            </div>
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="tel" placeholder="CONTACT" name='s_contact' pattern="[0-9]{4}-[0-9]{7}" title="follow this pattern[0-9]{4}-[0-9]{4}" required autocomplete="off"/>
              
            </div>
            
          
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="password" placeholder="PASSWORD" name='s_password' required autocomplete="off"/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="CONFIRM_PASSWORD" name='s_re_pass' required autocomplete="off"/>
            </div>

            <input type="submit" class="btn" value="Sign up" name='register'/>
            <div class="social-media">
            
            
            
            </div>
          </form>
        </div>
      </div>
         

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
          <h2>Geo <span class="ser">Warehouse</span></h2>
          <br>
          <br>
            <h3>New User ?</h3>
            <p>
              Click the Sign up button below to have an account creation request submitted
            </p>
           
          </div>
        </div>
        
        
       
        <div class="panel right-panel">
          <div class="content">
          <br>
          <br>
          <h3>Already a User ?</h3>
            <p>
              Please click the sign in button below to access your account
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
            </div>
        </div>
          </div>
        </div>
      </div>
    </div>
<?php
echo '<script src="form.js"></script>
<script>
if(window.history.replaceState){
window.history.replacestate(null,null,window.location.href);
}

</script>

';
?>
</body>
</html>