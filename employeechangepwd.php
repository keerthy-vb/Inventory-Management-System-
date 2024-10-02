<?php
session_start();
include 'connection.php';
include 'employeebase.php';

?>

<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
                                            <a href="adminhome.php">Home</a>
						<i>|</i>
					</li>
					<li>Change Password</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Change Password
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
                                                            <input type="password" name="txtCurrent" placeholder="Current Password" required="">
							</div>
                                                    <div class="">
                                                            <input type="password" name="txtNew" placeholder="New Password" required="">
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
    $email=$_SESSION["email"];
    $current=$_REQUEST['txtCurrent'];
    $new=$_REQUEST['txtNew'];
    $q="select * from tbllogin where uname='$email'";
    $s=  mysqli_query($con,$q);
    $result= mysqli_fetch_array($s);
    $pwd1=$result['pwd'];
    if($pwd1==$current)
    {
        $q="update tbllogin set pwd='$new' where uname='$email'";
        $s=mysqli_query($con,$q);
        if($s)
        {
            echo "<script>alert('Updation successfull')</script>";
            echo "<script>location.href='index.php'</script>";
        }
        else
        {
            echo "<script>alert('Sorry some error occured')</script>";
            echo "<script>location.href='employeechangepwd.php'</script>";
        }
    }
    else
        {
            echo "<script>alert('Incorrect password')</script>";
            echo "<script>location.href='employeechangepwd.php'</script>";
        }
}
?>
<?php
include 'footer.php';
?>
