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
                                            <a href="employeehome.php">Home</a>
						<i>|</i>
					</li>
					<li>Stock</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Stock
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
							
                                                        <table id="data" border="1" style="width:550px; margin-left:250px; ">
                                                           
                                                            <th>ITEM</th>
                                                            <th>STOCK</th>
                                                        <?php
                                                        $q="select tblitem.*,tblstock.* from tblitem,tblstock where tblitem.itemid=tblstock.itemid order by tblitem.itemname";
                                                        $s=  mysqli_query($con,$q);
                                                        while($r=  mysqli_fetch_array($s))
                                                        {
                                                            if($r['qty']==0)
                                                            {
                                                                echo '<tr><td>'.$r['itemname'].'</td>'
                                                                    . '<td style="color:red;">OUT OF STOCK!!!</td>';
                                                            }
                                                            else
                                                            {
                                                            echo '<tr><td>'.$r['itemname'].'</td>'
                                                                    . '<td>'.$r['qty'].'</td>';
                                                            }      
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
