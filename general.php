<?php
$Uname  = $_POST['name'];
$Registernumber = $_POST['number'];
$issues= $_POST['comment'];





if (!empty($Registernumber) || !empty($Uname) || !empty($issues)  )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "SSQS";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT Registernumber From general Where Registernumber = ? Limit 1";
  $SELECT = "SELECT Uname From general Where Uname = ? Limit 5";
  $SELECT = "SELECT issues From general Where issues = ? Limit 10";
  $INSERT = "INSERT Into general (Registernumber,Uname,issues )values(?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Uname);
     $stmt->execute();
     $stmt->bind_result($Uname);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $Uname,$Registernumber,$issues);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>