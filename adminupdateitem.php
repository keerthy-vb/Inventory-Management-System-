<?php
include 'connection.php';
include 'adminbase.php';
$bid=$_GET['itemid'];
$q="select * from tblitem where itemid='$bid'";
$s=  mysqli_query($con,$q);
$r=  mysqli_fetch_array($s);
?>

<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
                                            <a href="adminhome.php">Home</a>
						<i>|</i>
					</li>
					<li>Items</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Items
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
                                            <form action="#" method="post" >
                                                    <div class="">
                                                        <select name='cat'>
                                                            <option>Select category</option>
                                                            <?php
                                                            $q="select * from tblcategory where status='1'";
                                                            $s=  mysqli_query($con,$q);
                                                            while($res=  mysqli_fetch_array($s))
                                                            {
                                                                if($r['catid']==$res['catid'])
                                                                {
                                                                    echo '<option value="'.$res[0].'" selected >'.$res[1].'</option>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<option value="'.$res[0].'">'.$res[1].'</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
							</div>
                                                    <div class="">
								<select name='brand'>
                                                            <option>Select brand</option>
                                                            <?php
                                                            $q="select * from tblbrand where status='1'";
                                                            $s=  mysqli_query($con,$q);
                                                            while($res=  mysqli_fetch_array($s))
                                                            {
                                                                if($r['brandid']==$res['brandid'])
                                                                {
                                                                    echo '<option value="'.$res[0].'"selected>'.$res[1].'</option>';
                                                                }
                                                                else 
                                                                {
                                                                    echo '<option value="'.$res[0].'">'.$res[1].'</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
							</div>
							<div class="">
								<input type="text" name="item" placeholder="Item name" required="" value='<?php echo $r['itemname']; ?>'>
							</div>
							<div class="">
								<input  type="number" name="rate" placeholder="Rate" required="" value='<?php echo $r['rate']; ?>'>
							</div>
							
							
<input type="submit" name="btnSubmit" value="Submit">
						</form>
					</div>
					
				</div>
			</div>
			<!-- //contact -->
		</div>
	</div>
<?php
if(isset($_REQUEST['btnSubmit']))
{
    $cat=$_REQUEST['cat'];
    $brand=$_REQUEST['brand'];
    $item=$_REQUEST['item'];
    $rate=$_REQUEST['rate'];
    
        $q="update tblitem set catid='$cat',brandid='$bid',itemname='$item',rate='$rate' where itemid='$bid'";
    $s=  mysqli_query($con,$q);
    if($s)
    {
        echo '<script>alert("Item updated")</script>';
        echo '<script>location.href="adminproduct.php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="adminproduct.php"</script>';
    }
   
}
?>
<?php
include 'footer.php';
?>
