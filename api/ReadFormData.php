<?php

if(count($_POST)>0){
    $email = $_POST['Email'];
    $name = $_POST['Name'];
    $dob = $_POST['DOB'];
    $mobile = $_POST['Mobile'];

   /* $value = array();
    array_push($value,$email);
    array_push($value,$name);
    array_push($value,$dob);
    array_push($value,$mobile);*/
    
    $value = [
    "Name" => "{$name}",
    "Email" => "{$email}",
    "dob"=> "{$dob}",
    "Mobile"=>"{$mobile}"
    ];
    
   echo json_encode((array)$value);
    /*In react aap this array is accesible using map function.
    if this echo result is storing in variabe result. then 
    result.Name will be used to access Name*/

}else{
    echo"Error";
}
?>
