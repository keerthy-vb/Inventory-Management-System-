<?php
include 'connection.php';
$catid=$_GET['catid'];
$q="update tblcategory set status='0' where catid='$catid'";
$s=  mysqli_query($con,$q);
if($s)
{
    echo '<script>alert("Category deleted")</script>';
   
}
else
{
    echo '<script>alert("Sorry some error occured")</script>';
  
}
 echo '<script>location.href="admincategory.php"</script>';
?>