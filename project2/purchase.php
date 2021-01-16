<?php

$id = $_POST['id'];
$name  = $_POST['name'];
$rate = $_POST['rate'];
$quantity = $_POST['quantity'];
$name1 = $_POST['name1'];
$addr = $_POST['addr'];
$email = $_POST['email'];


$total=$rate*$quantity;


if (!empty($id) || !empty($name) || !empty($rate) || !empty($quantity) || !empty($name1) || !empty($addr) || !empty($email))
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
  $SELECT = "SELECT id From detail1 Where id = ? Limit 1";
  $INSERT = "INSERT Into detail1 (id , name ,rate,quantity,total,name1,addr,email )values(?,?,?,?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $id);
     $stmt->execute();
     $stmt->bind_result($id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("isiiisss", $id,$name,$rate,$quantity,$total,$name1,$addr,$email);
      $stmt->execute();
      echo "New Entry Inserted Successfully";
     } else {
      echo "Already Used Id";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
<br>
<br>
<!DOCTYPE html>
<html>
<head>
  <title>Purchase</title>
</head>
<body>
  
<a href="index.html"><button>To Add Another One</button></a>
<h4>If you want see the details</h4>
<input type="text" name="check" placeholder="Enter Id (or) Name">
<a href=""><button>Search</button></a>
</body>
</html>