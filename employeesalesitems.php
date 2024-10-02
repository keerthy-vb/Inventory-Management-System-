<?php
include 'connection.php';
include 'employeebase.php';
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
						<form action="#" method="post" >
<div class="">
    <input  type="text" readonly="" value="<?php echo $r['customer']; ?>"  >
							</div>
                                                    <div class="">
                                                        <input  type="text"  readonly="" value="<?php echo $r['sdate']; ?>"  >
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
                                                        $q="select tblsaleschild.*,tblitem.itemname from tblsaleschild,tblitem where tblsaleschild.sid='$pid' and tblsaleschild.itemid=tblitem.itemid";
                                                        $s=  mysqli_query($con,$q);
                                                        while($r=  mysqli_fetch_array($s))
                                                        {
                                                            echo '<tr><td>'.$r['scid'].'</td>'
                                                                    . '<td>'.$r['itemname'].'</td>'
                                                                    . '<td>'.$r['qty'].'</td>'
                                                                    . '<td>'.$r['price'].'</td>'
                                                                    . '<td><a href="employeeremoveitemsales.php?pcid='.$r['scid'].'">Delete</a></td>';
                                                                   
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
    $s=mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    $rate=$r['rate'];
    $price=$qty*$rate;
    
    $q="select qty from tblstock where itemid='$item'";
        $s=mysqli_query($con,$q);
        $m=  mysqli_fetch_array($s);
        $stock=$m[0];
    if($stock>=$qty)
    {
    $q="insert into tblsaleschild (sid,itemid,qty,price) values('$pid','$item','$qty','$price')";
    $s=mysqli_query($con,$q);
    if($s)
    {
        echo '<script>location.href="employeesalesitems.php"</script>';
//    echo $q;
    }
    else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="employeesalesitems.php"</script>';
    }
    }
    else {
        echo '<script>alert("Out of stock")</script>';
        echo '<script>location.href="employeesalesitems.php"</script>';
    }
}
if(isset($_REQUEST['btnFinish']))
{
    $q="select * from tblsaleschild where sid='$pid'";
    $s=mysqli_query($con,$q);
    while($res=  mysqli_fetch_array($s))
    {
        $itemid=$res['itemid'];
        $qty=$res['qty'];
        $q="select qty from tblstock where itemid='$itemid'";
        $s=mysqli_query($con,$q);
        $m=  mysqli_fetch_array($s);
        $stock=$m[0];
        $stock=$stock-$qty;
        $q="update tblstock set qty='$stock' where itemid='$itemid'";
        $s=mysqli_query($con,$q);
    }
    
    $q="select sum(price) from tblsaleschild where pid='$pid'";
    $s=mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    $total=$r[0];
    
    $q="update tblsalesmaster set totamount='$total' where sid='$pid'";
    $s=mysqli_query($con,$q);
    if($s)
    {
            //echo '<script>alert("Sales completed")</script>';
            echo '<script>location.href="employeebill.php?sid='.$pid.'"</script>';
    }
}
?>
<?php
include 'footer.php';
?>
