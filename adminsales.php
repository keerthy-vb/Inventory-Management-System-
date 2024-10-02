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
					<li>Sales</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Sales
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
						<form action="#" method="post" enctype="multipart/form-data">
                                                        <div class="">
                                                            Select date: <input type="date" name="sdate" >
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
    $sdate=$_REQUEST['sdate'];
   
    $q="select count(*) from tblsalesmaster where sdate='$sdate'";
    $s=  mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    if($r[0]>0)
    {
        echo '<script>location.href="adminsalesview.php?sdate='.$sdate.'"</script>';
    }
    else
    {
        echo '<script>alert("No sales on this date")</script>';
    }
}
?>
<?php
include 'footer.php';
?>
