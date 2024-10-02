<?php
include 'connection.php';
$empid=$_GET['empid'];
$q="update tbllogin set status='0' where uname='$empid'";
$s=  mysqli_query($con,$q);
if($s)
{
    echo '<script>alert("Employee deleted")</script>';
   
}
else
{
    echo '<script>alert("Sorry some error occured")</script>';
  
}
 echo '<script>location.href="adminemployee.php"</script>';
?>