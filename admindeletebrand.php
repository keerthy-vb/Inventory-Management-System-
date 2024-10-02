<?php
include 'connection.php';
$bid=$_GET['bid'];
$q="update tblbrand set status='0' where brandid='$bid'";
$s=  mysqli_query($con,$q);
if($s)
{
    echo '<script>alert("Brand deleted")</script>';
   
}
else
{
    echo '<script>alert("Sorry some error occured")</script>';
  
}
 echo '<script>location.href="adminbrand.php"</script>';
?>