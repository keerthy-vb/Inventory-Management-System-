<?php
include 'connection.php';
$pcid=$_GET['pcid'];
$q="delete from tblpurchasechild where pcid='$pcid'";
$s=  mysqli_query($con,$q);
if($s)
{
    echo '<script>alert("Item deleted")</script>';
   
}
else
{
    echo '<script>alert("Sorry some error occured")</script>';
  
}
 echo '<script>location.href="employeepurchaseitems.php"</script>';
?>