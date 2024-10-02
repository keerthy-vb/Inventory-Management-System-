<?php
include 'connection.php';
include 'adminbase.php';
$empid=$_GET['empid'];
$q="select * from tblemployee where empid='$empid'";
$s=mysqli_query($con,$q);
$r=mysqli_fetch_array($s);
?>
<style>
    #data th{
        background-color: #1accfd;
        padding: 5px 5px 5px 5px;
        color: white;
    }
    #data td{
         padding: 5px 5px 5px 5px;
    }
</style>
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
                                            <a href="adminhome.php">Home</a>
						<i>|</i>
					</li>
					<li>Employee</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Employees
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
                                                            <input type="text" name="name" placeholder="Employee name" required="" value="<?php echo $r['empname']; ?>">
							</div>
                                                        <div class="">
								<textarea placeholder="Address" name="address" required=""><?php echo $r['empaddress']; ?></textarea>
							</div>
							<div class="">
								<input  type="number" name="contact" placeholder="Contact number" required="" value="<?php echo $r['empcontact']; ?>">
							</div>
							<div class="">
                                                            <input type="email" name="email" readonly="" placeholder="Email Id" required="" value="<?php echo $r['empemail']; ?>">
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
    $name=$_REQUEST['name'];
    $address=$_REQUEST['address'];
    $contact=$_REQUEST['contact'];
    $email=$_REQUEST['email'];
    
    
        $q="update tblemployee set empname='$name',empaddress='$address',empcontact='$contact' where empid='$empid'";
    $s=  mysqli_query($con,$q);
    if($s)
    {
        
        
        echo '<script>alert("Employee updated")</script>';
        echo '<script>location.href="adminemployee.php"</script>';
    
    }
    else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="adminemployee.php"</script>';
    }
    
}
?>
<?php
include 'footer.php';
?>
