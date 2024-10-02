<?php
include 'connection.php';
include 'adminbase.php';
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
								<input type="text" name="name" placeholder="Employee name" required="">
							</div>
                                                        <div class="">
								<textarea placeholder="Address" name="address" required=""></textarea>
							</div>
							<div class="">
								<input  type="number" name="contact" placeholder="Contact number" required="">
							</div>
							<div class="">
								<input type="email" name="email" placeholder="Email Id" required="">
							</div>
							
<input type="submit" name="btnSubmit" value="Submit">
						</form>
					</div>
					<div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
							<h4>Employees</h4>
                                                        <table id="data" border="1" style="width:550px; margin-left:150px; margin-top: 50px;">
                                                            <th>ID</th>
                                                              <th>NAME</th>
                                                                <th>ADDRESS</th>
                                                                  <th>CONTACT</th>
                                                                
                                                            <th colspan="3">EMAIL</th>
                                                        
                                                        <?php
                                                        $q="select * from tblemployee where empemail in(select uname from tbllogin where status='1')";
                                                        $s=  mysqli_query($con,$q);
                                                        while($r=  mysqli_fetch_array($s))
                                                        {
                                                            echo '<tr><td>'.$r['empid'].'</td>'
                                                                    . '<td>'.$r['empname'].'</td>'
                                                                    . '<td>'.$r['empaddress'].'</td>'
                                                                    . '<td>'.$r['empcontact'].'</td>'
                                                                    . '<td>'.$r['empemail'].'</td>'
                                                                    . '<td><a href="admindeleteemployee.php?empid='.$r['empemail'].'">Delete</a></td>'
                                                                    . '<td><a href="adminupdateemployee.php?empid='.$r['empid'].'">Update</a></td></tr>';
                                                        }
                                                        ?>
                                                            </table>
						</div>
						
						<div class="clearfix"> </div>
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
    
    $q="select count(*) from tbllogin where uname='$name'";
    $s=  mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    if($r[0]>0)
    {
        echo '<script>alert("Data already exist")</script>';
    }
    else
    {
        $q="insert into tblemployee (empname,empaddress,empemail,empcontact) values('$name','$address','$email','$contact')";
    $s=  mysqli_query($con,$q);
    if($s)
    {
        
        $q="insert into tbllogin (uname,pwd,utype,status) values('$email','$email','employee',1) ";
        $s=  mysqli_query($con,$q);
        if($s)
    {
        echo '<script>alert("Employee added")</script>';
        echo '<script>location.href="adminemployee.php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="adminemployee.php"</script>';
    }
    }
    else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="adminemployee.php"</script>';
    }
    }
}
?>
<?php
include 'footer.php';
?>
