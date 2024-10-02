<?php
include 'connection.php';
$bid=$_GET['itemid'];
$q="update tblitem set status='0' where itemid='$bid'";
$s=  mysqli_query($con,$q);
if($s)
{
    echo '<script>alert("Item deleted")</script>';
   
}
else
{
    echo '<script>alert("Sorry some error occured")</script>';
  
}
 echo '<script>location.href="adminproduct.php"</script>';
?>