<?php
$Uname  = $_POST['name'];
$Registernumber = $_POST['Registernumber'];

$Issues= $_POST['Issues'];





if (!empty($Registernumber) || !empty($Uname) || !empty($Issues)  )
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
  $SELECT = "SELECT Registernumber From feedback Where Registernumber = ? Limit 1";
  $SELECT = "SELECT Issues From feedback Where Issues = ? Limit 1";
  $INSERT = "INSERT feedback (Registernumber , Uname,Issues )values(?,?,?)";

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
      $stmt->bind_param("sss", $Registernumber,$Uname,$Issues);
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