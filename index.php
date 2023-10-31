<?php 
session_start();
include("function_file.php");
$role=strtolower(trim(user_find_role(strtolower(trim($_SESSION['email'])))));

if(!isset($_SESSION['email'])) { 
  header('Location: login.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
session_start();
session_unset();
session_destroy();
header('Location: login.php');
  }

if($_SERVER["REQUEST_METHOD"] == "GET")
{
if(isset($_POST["delete"])){

  echo $_GET["delete"];

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
<table style="width:50%">
  <tr>
    <th>SN</th>
    <th>UserName</th>
    <th>Email</th> 
    <th>Password</th>
    <th>Role</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
<?php
   
    $filename="C:\\xampp\\htdocs\\Assignment_05\\user_list.txt";
    $data=file($filename);
    $data_total=count($data);
    for($i=0;$i<$data_total;$i++){
      $userarry=explode(",",$data[$i]);
      $n=$i+1;
     echo "<tr><td>$n</td>";
     echo "<td>$userarry[0]</td>";
     echo "<td>$userarry[1]</td>";
     echo "<td>$userarry[2]</td>";
     echo "<td>$userarry[3]</td>";
     echo "<td> <a class='button' href='UserEdit.php? email_update=".$userarry[1]."'>Edit</a> </td>";
     echo "<td> <a class='button' href='delete.php? emailid=".$userarry[1]."'>Delete</a> </td></tr>";
    }
?>


</form>
</div>
</body>
</html>
