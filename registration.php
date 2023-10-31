<?php 
session_start();

include("function_file.php");
$role=strtolower(trim(user_find_role(strtolower(trim($_SESSION['email'])))));

if(!isset($_SESSION['email'])) { 
  header('Location: login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["logout"])){
    session_start();
    session_unset();
    session_destroy();
    header('Location: login.php');
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav a.active {
  background-color: #2196F3;
  color: white;
}
.topnav .login-container {
  float: right;
}
.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
.topnav .login-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: #555;
  color: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .login-container button:hover {
  background-color: green;
}

@media screen and (max-width: 600px) {
  .topnav .login-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <?php
if($role=='admin')
 {
  echo "<a  href='registration.php'>Registration</a>";
}
?>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <div class="login-container">

  <form method="POST" action="index.php">
<button type="logout">Logout</button>
</form>
  </div>
</div>

<div style="padding-right:16px">
  <h2>
  <?php 
  echo "Year Email Address is: ".$_SESSION['email'];
  ?>
  </h2>
</div>
<div>
<?php  
// define variables to empty values  
$usernameErr = $emailErr= $passwordErr = "";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {     
    if (empty($_POST["username"])) {  
        $usernameErr = "Username is required";  
    } else {
        $username=input_data($_POST["username"]); 
    } 
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";         
    }  else {
            $email=input_data($_POST["email"]); 
          }

    }  
    if (empty($_POST["password"])) {  
            $password = "Password is required";  
    }  else {
        $password=input_data($_POST["password"]); 
    } 
    if (empty($_POST["role"])) {  
         $role = "Role is required";  
    }  else {
         $role=input_data($_POST["role"]); 
    } 
 
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  
  
<h2>Registration Form</h2>  
<br>  
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >    
    User Name:   
    <input type="text" name="username">  
    <span class="error">* <?php echo $usernameErr; ?> </span>  
    <br><br>  
    E-mail:   
    <input type="text" name="email">  
    <span class="error">* <?php echo $emailErr; ?> </span>  
    <br><br>  
    Password:   
    <input type="password" name="password">  
    <span class="error">* <?php echo $passwordErr; ?> </span>  
    <br><br>
     User Role : 
    <select name="role">
    <option value="reader">Reader</option>
    <option value="admin">Admin</option>
    </select>
    <br><br>
    <br><br>
    <br><br>
    <input type="submit" name="submit" value="Submit">   
    <br><br>                             
</form>   
<?php  


    if(isset($_POST['submit'])) {  
    if($usernameErr == "" && $emailErr == "" && $passwordErr == "") {  
        echo "<h3 class='success'> <b>";
        echo insert_data($username,$email,$password,$role); "</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$username;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>";  
        echo "Passwordis: " .$password;
        echo "<br>";
        echo "Passwordis: " .$role;
        

        
    } else {  
        echo "<h3 class='error'> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>  

</div>
</body>
</html>
