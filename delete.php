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
if($role == 'admin')
{
$del_id = $_GET['emailid'];
user_delete($del_id);
echo $del_id;
header('Location: index.php');
}





?>

