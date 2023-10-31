<?php
session_start();
include "function_file.php";
$errormsg="";


if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(check_user_pass($_POST['email'], $_POST['password']))
{
  
  $_SESSION['email']=$_POST['email'];
  header('Location: index.php');
}
else{
$errormsg="Please try Again, cheak your user ID and Password";
}
}
//echo  $_SESSION['email'];
//echo $_POST['email']. $_POST['password']."<br>";
//echo check_user_pass($_POST['email'], $_POST['password']);
//echo check_user_pass('bibhash.ict@gmail.com','1234');

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
.erormsg{
  font-style: italic;
  color: rebeccapurple;
  position: absolute;
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
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <div class="login-container">
    <form method="POST" action="login.php">

      <input type="text"  name="email"   placeholder="exmaple@dmain.com">
      <input type="password"  name="password" placeholder="password">
      <button type="submit">Login</button>
    </form>
  </div>
</div>
<h3 class="erormsg" >
<?php
echo $errormsg;
?>
</h3>


</body>
</html>


