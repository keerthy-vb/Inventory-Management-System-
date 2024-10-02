<?php
include 'connection.php';
include 'employeebase.php';
$sid=$_GET['sid'];
    $q="select max(sid) from tblsalesmaster";
    $s=mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    $pid=$r[0];
    $q="select * from tblsalesmaster where sid='$pid'";
    $s=mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
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
			<h3 class="tittle-w3l">Bill
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
    <input  type="text" readonly="" value="<?php echo $sid; ?>"  >
							</div>
<div class="">
    <input  type="text" readonly="" value="<?php echo $r['customer']; ?>"  >
							</div>
                                                    <div class="">
                                                        <input  type="text"  readonly="" value="<?php echo $r['sdate']; ?>"  >
							</div>

                                                </form>
                                            </div>
                                    <div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
							<h4>Purchased items</h4>
                                                        <table id="data" border="1" style="width:550px; margin-left:150px; margin-top: 50px;">
                                                            <th>ID</th>
                                                            <th>ITEM</th>
                                                            <th>QUANTITY</th>
                                                            <th colspan="2">PRICE</th>
                                                        
                                                        <?php
                                                        $q="select tblsaleschild.*,tblitem.itemname from tblsaleschild,tblitem where tblsaleschild.sid='$pid' and tblsaleschild.itemid=tblitem.itemid";
                                                        $s=  mysqli_query($con,$q);
                                                        while($r=  mysqli_fetch_array($s))
                                                        {
                                                            echo '<tr><td>'.$r['scid'].'</td>'
                                                                    . '<td>'.$r['itemname'].'</td>'
                                                                    . '<td>'.$r['qty'].'</td>'
                                                                    . '<td>'.$r['price'].'</td>';
                                                                    
                                                                   
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

<a class="print_btn" href="" onclick="window.print();">Print</a>
<?php
include 'footer.php';
?>
