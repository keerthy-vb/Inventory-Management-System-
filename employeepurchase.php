<?php
include 'connection.php';
include 'employeebase.php';
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
					<li>Purchase</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Purchase
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
                                                            <input type="text" name="dealer" id='dealer' placeholder="Dealer name" required="">
							</div>
                                                        
							<div class="">
								Purchase Date<br><input  type="date" id='pdate' name="pdate" placeholder="Purchase Date" required="" >
							</div>
<!--							<div class="">
                                                            <input type="email" name="email" readonly="" placeholder="Email Id" required="" value="<?php echo $r['empemail']; ?>">
							</div>-->
<hr>
                                                        
                                                        
                                                        <input type="submit" id='btnSelect' name="btnSubmit" value="Add Items">
                                                      
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
    $dealer=$_REQUEST['dealer'];
    $pdate=$_REQUEST['pdate'];
    $q="insert into tblpurchasemaster (dealer,pdate,total) values('$dealer','$pdate','0')";
    $s=mysqli_query($con,$q);
    if($s)
    {
        
        
        
        echo '<script>location.href="employeepurchaseitems.php"</script>';
    
    }
    else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="employeepurchase.php"</script>';
    }
    
}
?>
<?php
include 'footer.php';
?>
