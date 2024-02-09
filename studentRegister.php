<?php
// echo "Hello";
include "connection.php";

$fanme = $_POST["fname"];
$lname = $_POST["lname"];
$nic = $_POST["nic"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];
$course = $_POST["course"];


if(empty($fanme)){
    echo("enter student first Name");

}else if(empty($lname)){
    echo("enter student last Name");
}else if(empty($nic)){
    echo("enter student NIC Number");
}else if(empty($line1)){
    echo("enter student Address line1");
}else if(empty($line2)){
    echo("enter student Address line2");
}else if(empty($mobile)){
    echo("enter student mobile Number");
}else if(strlen($mobile)!=10){
    echo("Invalid Mobile Number less than 10 characters.");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo("Invalid Mobile Number please check it.");
}else{
    $id = uniqid();
    $date = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $date->setTimezone($tz);
    $d = $date->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `student`(`uniq_id`,`fname`,`lname`,`nic`,`line1`,`line2`,`mobile`,`status`,`date`,`gender_id`,`course_course_id`)
    VALUES('".$id."' ,'".$fanme."','".$lname."', '".$nic."', '".$line1."', '".$line2."', '".$mobile."','1','".$d."', '".$gender."','".$course."');");

    echo("Done");

    
    
}
?>
