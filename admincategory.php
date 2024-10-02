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
					<li>Category</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Category
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
								<input type="text" name="category" placeholder="Category" required="">
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
					<div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
							<h4>Categories</h4>
                                                        <table id="data" border="1" style="width:550px; margin-left:150px; margin-top: 50px;">
                                                            <th>ID</th>
                                                            <th colspan="3">CATEGORY</th>
                                                        
                                                        <?php
                                                        $q="select * from tblcategory where status='1'";
                                                        $s=  mysqli_query($con,$q);
                                                        while($r=  mysqli_fetch_array($s))
                                                        {
                                                            echo '<tr><td>'.$r[0].'</td>'
                                                                    . '<td>'.$r[1].'</td>'
                                                                    . '<td><a href="admindeletecategory.php?catid='.$r[0].'">Delete</a></td>'
                                                                    . '<td><a href="adminupdatecategory.php?catid='.$r[0].'">Update</a></td></tr>';
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
    $cat=$_REQUEST['category'];
    $q="select count(*) from tblcategory where category='$cat' and status='1'";
    $s=  mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    if($r[0]>0)
    {
        echo '<script>alert("Data already exist")</script>';
    }
    else
    {
        $q="insert into tblcategory (category,status) values('$cat','1')";
    $s=  mysqli_query($con,$q);
    if($s)
    {
        echo '<script>alert("Category added")</script>';
        echo '<script>location.href="admincategory.php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="admincategory.php"</script>';
    }
    }
}
?>
<?php
include 'footer.php';
?>
