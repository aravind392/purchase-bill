<?php 

$search = $_POST['search'];

if (!empty($search))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "purchase";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT $search From detail1 ;
 ?>