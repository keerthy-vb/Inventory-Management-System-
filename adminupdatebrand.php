<?php
include 'connection.php';
include 'adminbase.php';
$bid=$_GET['bid'];
$q="select * from tblbrand where brandid='$bid'";
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
					<li>Brand</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Brand
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
						<form action="#" method="post">
							<div class="">
                                                            <input type="text" name="brand" placeholder="Brand" required="" value="<?php echo $r[1]; ?>">
							</div>
<!--							<div class="">
								<input class="text" type="text" name="subject" placeholder="Subject" required="">
							</div>
							<div class="">
								<input class="email" type="email" name="email" placeholder="Email" required="">
							</div>
							<div class="">
								<textarea placeholder="Message" name="message" required=""></textarea>
							</div>-->
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
    $cat=$_REQUEST['brand'];
    
        $q="update tblbrand set brandname='$cat' where brandid='$bid'";
    $s=  mysqli_query($con,$q);
    if($s)
    {
        echo '<script>alert("Brand updated")</script>';
        echo '<script>location.href="adminbrand.php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="adminbrand.php"</script>';
    }
    
}
?>
<?php
include 'footer.php';
?>
