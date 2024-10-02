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
					
					<div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
						
                                                        <table id="data" border="1" style="width:550px; margin-left:150px; margin-top: 50px;">
                                                            <th>BILL NO</th>
                                                            <th>CUSTOMER</th>
                                                            <th colspan="2">AMOUNT</th>
                                                           
                                                        <?php
                                                        $sdate=$_GET["sdate"];
                                                        $q="select * from tblsalesmaster where sdate='$sdate'";
                                                        $s=  mysqli_query($con,$q);
                                                        while($r=  mysqli_fetch_array($s))
                                                        {
                                                            echo '<tr><td>'.$r[0].'</td>'
                                                                    . '<td>'.$r[2].'</td>'
                                                                    . '<td>'.$r[3].'</td>'
                                                                    . '<td><a href="adminsalesdetails.php?sid='.$r[0].'">View Details</a></td></tr>';
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
include 'footer.php';
?>
