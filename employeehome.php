<?php
session_start();
include 'connection.php';
include 'employeebase.php';

$email=$_SESSION['email'];
$q="select * from tblemployee where empemail='$email'";
$s=mysqli_query($con,$q);
$r=mysqli_fetch_array($s);
?>

<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
                                            <a href="employeehome.php">Home</a>
						<i>|</i>
					</li>
					<li>Profile</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Profile
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
						<form  >
                                                    
							<div class="">
                                                            <input type="text" name="name" placeholder="Employee name" required="" readonly="" value="<?php echo $r['empname']; ?>">
							</div>
                                                        <div class="">
								<textarea placeholder="Address" name="address" readonly="" required=""><?php echo $r['empaddress']; ?></textarea>
							</div>
							<div class="">
								<input  type="number" name="contact" placeholder="Contact number" readonly="" required="" value="<?php echo $r['empcontact']; ?>">
							</div>
							<div class="">
                                                            <input type="email" name="email" readonly="" placeholder="Email Id" required="" value="<?php echo $r['empemail']; ?>">
							</div>
							

						</form>
					</div>
					
				</div>
			</div>
			<!-- //contact -->
		</div>
	</div>

<?php
include 'footer.php';
?>
