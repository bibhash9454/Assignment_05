<?php

function insert_data($username, $email,$password,$role){
    $username=strtolower($username);
    $email=strtolower($email);
    $filename="C:\\xampp\\htdocs\\Assignment_05\\user_list.txt";
    $fp=fopen($filename,"r");
    $ifwrite=1;
    while($userlist=fgetcsv($fp)) {
        if($userlist[1]==$email){
        $ifwrite=0;   
        break;
        }   
        }
if($ifwrite){
    $fp=fopen($filename,"a");
    fwrite($fp,"$username,$email,$password,$role\n");
    fclose($fp);
    return "You have sucessfully registered.";
}
else{
    return "User already exist this System";
}

}

///echo insert_data('bib','bibhash.it@gmail.com','1122211','admin');



function check_user_pass($email,$password){
$email=strtolower(trim($email));
$filename="C:\\xampp\\htdocs\\Assignment_05\\user_list.txt";
$fp=fopen($filename,"r");
$ret=false;
while($userlist=fgetcsv($fp)) {
if($userlist[1]==$email && $userlist[2]==$password){
    $ret=true;
    break;
}   
}
fclose($fp);

return $ret;
}

//echo check_user_pass('bibhash.ict@gmail.com','1234');


function user_update($emailIN,$username,$email,$password,$role)
{
    $username=strtolower(trim($username));
    $filename="C:\\xampp\\htdocs\\Assignment_05\\user_list.txt";
    $data=file($filename);
    $data_total=count($data);
    for($i=0;$i<$data_total;$i++){
      $userarry=explode(",",$data[$i]);
      if($userarry[1]==$emailIN)
      {
        $data[$i]="$username,$email,$password,$role\n";
       $fp=fopen($filename,"w");
       foreach($data as $line){
         fwrite($fp,$line);
          }
          echo "Update Successfull !";
        break;
      }
    }
}


///user_update('bibhash.it@gmail.com','salauddin','mmmmbd@gmail.com','9454@gmail','editor');



function user_delete($email)
{
  $email=strtolower(trim($email));
    $filename="C:\\xampp\\htdocs\\Assignment_05\\user_list.txt";
    $data=file($filename);
    $data_total=count($data);
    for($i=0;$i<$data_total;$i++){
      $userarry=explode(",",$data[$i]);
      if($userarry[1]==$email)
      {
       unset($data[$i]);
       $fp=fopen($filename,"w");
       foreach($data as $line){
         fwrite($fp,$line);
          }
        break;
      }
    }
}
//echo user_delete('bibhash.bd@gmail.com');

function user_find_role($email)
{
  $email=strtolower(trim($email));
    $filename="C:\\xampp\\htdocs\\Assignment_05\\user_list.txt";
    $data=file($filename);
    $data_total=count($data);
    for($i=0;$i<$data_total;$i++)
    {
      $userarry=explode(",",$data[$i]);

      if($userarry[1]==$email)
      {
      return $userarry[3];
      break;
      }
        
      }
}

//echo user_find_role("bibhash.bd@gmail.com");


function user_find_info($email)
{
  $email=strtolower(trim($email));
    $filename="C:\\xampp\\htdocs\\Assignment_05\\user_list.txt";
    $data=file($filename);
    $data_total=count($data);
    for($i=0;$i<$data_total;$i++)
    {
      $userarry=explode(",",$data[$i]);  //user_find_info

      if($userarry[1]==$email)
      {
      return $userarry[0].",".$userarry[1].",".$userarry[2].",".$userarry[3];
      break;
      } 
      }
    
}

///echo user_find_info("manikuddin@gmail.com");


?>