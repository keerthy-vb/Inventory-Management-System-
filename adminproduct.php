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
					<li>Items</li>
				</ul>
			</div>
		</div>
	</div>
<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Items
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
                                                        <select name='cat'>
                                                            <option>Select category</option>
                                                            <?php
                                                            $q="select * from tblcategory where status='1'";
                                                            $s=  mysqli_query($con,$q);
                                                            while($r=  mysqli_fetch_array($s))
                                                            {
                                                                echo '<option value="'.$r[0].'">'.$r[1].'</option>';
                                                            }
                                                            ?>
                                                        </select>
							</div>
                                                    <div class="">
								<select name='brand'>
                                                            <option>Select brand</option>
                                                            <?php
                                                            $q="select * from tblbrand where status='1'";
                                                            $s=  mysqli_query($con,$q);
                                                            while($r=  mysqli_fetch_array($s))
                                                            {
                                                                echo '<option value="'.$r[0].'">'.$r[1].'</option>';
                                                            }
                                                            ?>
                                                        </select>
							</div>
							<div class="">
								<input type="text" name="item" placeholder="Item name" required="">
							</div>
							<div class="">
								<input  type="number" name="rate" placeholder="Rate" required="">
							</div>
							<div class="">
								Upload image<input type="file" name="fname" placeholder="File" required="">
							</div>
							
<input type="submit" name="btnSubmit" value="Submit">
						</form>
					</div>
					<div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
							<h4>Items</h4>
                                                        <table id="data" border="1" style="width:550px; margin-left:150px; margin-top: 50px;">
                                                            <th>ID</th>
                                                              <th>CATEGORY</th>
                                                                <th>BRAND</th>
                                                                  <th>ITEM</th>
                                                                <th>RATE</th>
                                                            <th colspan="3">IMAGE</th>
                                                        
                                                        <?php
                                                        $q="select tblbrand.*,tblcategory.*,tblitem.* from tblbrand,tblitem,tblcategory where tblitem.status='1' and tblcategory.catid=tblitem.catid and tblbrand.brandid=tblitem.brandid";
                                                        $s=  mysqli_query($con,$q);
                                                        while($r=  mysqli_fetch_array($s))
                                                        {
                                                            echo '<tr><td>'.$r['itemid'].'</td>'
                                                                    . '<td>'.$r['category'].'</td>'
                                                                    . '<td>'.$r['brandname'].'</td>'
                                                                    . '<td>'.$r['itemname'].'</td>'
                                                                    . '<td>'.$r['rate'].'</td>'
                                                                    . '<td><img src="'.$r['itemimg'].'" height="150px" width="150px"></td>'
                                                                    . '<td><a href="admindeleteitem.php?itemid='.$r['itemid'].'">Delete</a></td>'
                                                                    . '<td><a href="adminupdateitem.php?itemid='.$r['itemid'].'">Update</a></td></tr>';
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
    $cat=$_REQUEST['cat'];
    $brand=$_REQUEST['brand'];
    $item=$_REQUEST['item'];
    $rate=$_REQUEST['rate'];
    $folder='images/';
    $file=$folder.basename($_FILES['fname']['name']);
    move_uploaded_file($_FILES['fname']['tmp_name'],$file);
    $q="select count(*) from tblitem where itemname='$item' and status='1'";
    $s=  mysqli_query($con,$q);
    $r=  mysqli_fetch_array($s);
    if($r[0]>0)
    {
        echo '<script>alert("Data already exist")</script>';
    }
    else
    {
        $q="insert into tblitem (catid,brandid,itemname,rate,itemimg,status) values('$cat','$brand','$item','$rate','$file','1')";
    $s=  mysqli_query($con,$q);
    if($s)
    {
        $q="select max(itemid) from tblitem ";
        $s=  mysqli_query($con,$q);
        $r=  mysqli_fetch_array($s);
        $itemid=$r[0];
        $q="insert into tblstock (itemid,qty) values('$itemid','0') ";
        $s=  mysqli_query($con,$q);
        echo '<script>alert("Item added")</script>';
        echo '<script>location.href="adminproduct.php"</script>';
    }
 else {
        echo '<script>alert("Sorry some error occured")</script>';
        echo '<script>location.href="adminproduct.php"</script>';
    }
    }
}
?>
<?php
include 'footer.php';
?>
