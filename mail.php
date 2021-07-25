<?php

session_start();
include("connectionclass.php");
  $sql2 = "select * from activity where status!='none' and user='$_SESSION[email]' order by id desc";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
$row2 =mysqli_fetch_array($result2);
$bully =$row2['status'];
$bullymsg=$row2['msg'];

$sql3 = "select * from profile_tb where email='$_SESSION[email]'";
$result3 = mysqli_query($con, $sql3) or die("Error in Selecting " . mysqli_error($connection));
$row3 = mysqli_fetch_array($result3);
$phone= $row3['contact'];

$url="http://akrut.in/SMS/gateway.php"; 
//$email=$_SESSION['email'];
$email="catherinecharly98@gmail.com";
$subject="Reporting Cyberbullying";
$from_name="Reporting Cyberbullying";
$msg="We suspect this user ".$_SESSION['email']." with phone number ".$phone." has been found bullying others as he has posted a ".$bully." post: ".$bullymsg. ". Please take necessary steps."; // HTML message


$message = urlencode($msg);
$ch = curl_init();
if (!$ch){die("Couldn't initialize a cURL
handle");} $ret = curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt ($ch,CURLOPT_POST, 1);
curl_setopt($ch,
CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch,CURLOPT_POSTFIELDS,"email=$email&msg=$msg&subject=$subject&title=$title");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//If you are behind proxy then please uncomment below line and provide your proxyip with port.
 // $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");
$curlresponse = curl_exec($ch); //
 if(curl_errno($ch))
echo 'curl error : '. curl_error($ch);
if (empty($ret)) {
// some kind of an error

die(curl_error($ch));
curl_close($ch); // close cURL
 } else {

$info = curl_getinfo($ch);
curl_close($ch); // close cURL

//echo $curlresponse;  

//header("location:contact.php") ;
}





?>