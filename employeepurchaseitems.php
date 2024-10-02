<?php
include 'connection.php';
include 'employeebase.php';
    $q="select max(pid) from tblpurchasemaster";
    $s=mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    $pid=$r[0];
    $q="select * from tblpurchasemaster where pid='$pid'";
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
    <input  type="text" readonly="" value="<?php echo $r['dealer']; ?>"  >
							</div>
                                                    <div class="">
                                                        <input  type="text"  readonly="" value="<?php echo $r['pdate']; ?>"  >
							</div>
<div class="">
								<select name='item'>
                                                            <option>Select Item</option>
                                                            <?php
                                                            $q="select * from tblitem where status='1'";
                                                            $s=  mysqli_query($con,$q);
                                                            while($r=  mysqli_fetch_array($s))
                                                            {
                                                                echo '<option value="'.$r[0].'">'.$r[3].'</option>';
                                                            }
                                                            ?>
                                                        </select>
							</div>
                                                        <div class="">
								<input  type="number" name="qty" placeholder="Quantity"  >
							</div>
                                                    <input type="submit" id='btnNext' name="btnNext" value="Next">
                                                    <input type="submit" id='btnFinish' name="btnFinish" value="Finish">
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
                                                        $q="select tblpurchasechild.*,tblitem.itemname from tblpurchasechild,tblitem where tblpurchasechild.pid='$pid' and tblpurchasechild.itemid=tblitem.itemid";
                                                        $s=  mysqli_query($con,$q);
                                                        while($r=  mysqli_fetch_array($s))
                                                        {
                                                            echo '<tr><td>'.$r['pcid'].'</td>'
                                                                    . '<td>'.$r['itemname'].'</td>'
                                                                    . '<td>'.$r['qty'].'</td>'
                                                                    . '<td>'.$r['price'].'</td>'
                                                                    . '<td><a href="employeeremoveitempurchase.php?pcid='.$r['pcid'].'">Delete</a></td>';
                                                                   
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

if(isset($_REQUEST['btnNext']))
{
    $item=$_REQUEST['item'];
    $qty=$_REQUEST['qty'];
    $q="select * from tblitem where itemid='$item'";
    $s = mysqli_query($con,$q);
    $r = mysqli_fetch_array($s);
    $rate=$r['rate'];
    $price=$qty*$rate;
    
    
    
    $q="insert into tblpurchasechild (pid,itemid,qty,price) values('$pid','$item','$qty','$price')";
    $s=mysqli_query($con,$q);
    if($s)
    {
        echo '<script>location.href="employeepurchaseitems.php"</script>';
//    echo $q;
    }
    else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="employeepurchaseitems.php"</script>';
    }
    
}
if(isset($_REQUEST['btnFinish']))
{
    $qry="select * from tblpurchasechild where pid='$pid'";
    $res = mysqli_query($con,$qry);
    while($row = mysqli_fetch_array($res))
    {
        $itemid=$row['itemid'];
        $qty=$row['qty'];
        $q="select qty from tblstock where itemid='$itemid'";
        $s=mysqli_query($con,$q);
        $m=  mysqli_fetch_array($s);
        $stock=$m[0];
        $stock=$stock+$qty;
        $q="update tblstock set qty='$stock' where itemid='$itemid'";
        $s=mysqli_query($con,$q);
    }
    
    $q="select sum(price) from tblpurchasechild where pid='$pid'";
      
    $s=mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    $total=$r[0];
    
    $q="update tblpurchasemaster set total='$total' where pid='$pid'";
    $s=mysqli_query($con,$q);
    if($s)
    {
            echo '<script>alert("Purchase completed")</script>';
            // echo '<script>location.href="employeepurchase.php"</script>';
    }
}
?>
<?php
include 'footer.php';
?>
