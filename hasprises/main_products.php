<?php
include("connection.php");
session_start();
if(!isset($_SESSION['user']))
{
	header('location:index.php');
}

// $parent_id=$_GET['pcatid'];
// $parent_name=$_GET['pcatname'];
?>

<!DOCTYPE html lang="en">

<html>
<head>

<meta charset="utf-8" name="viewport" content="width=device-width" initial-scale="1" />

<!--JavaScript Custom Functions-->
<script src="functions.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
function mydel(id)
{
	if(confirm("You are about to delete a Category and all of it's contents. This will not be reversable. \nAre you sure you want to proceed?") == true)
	{
		$("#"+id).css("display","none");
		
		$.ajax({
		url: "product_delete.php?id="+id, method: "post", dataType: "text", success: function(result) {
			
			alert(result);
			console.log(result);
		}
		});
	}
		
	else
	{
		return false;
	}

}
</script>

<title>Control Panel - Admin</title>
</head>

<body>

<div class="container">
<strong><a href="admin.php">Parent Categories</a> > Main Products</strong>
<div style="float:right;">
<a href="logout.php">Logout</a>
</div>
<div>
<h3>Main Products</h3>

<br>
<?php echo "<a href='add_product.php?pcatid=0&pro_code=MAIN'>"; ?> <div class="btn btn-default">Add New</div></a>
<br><br>

<div class="table-responsive">
<table class="table table-striped table-bordered">
<tr>
<th>ID</th><th>Name</th><th>Code</th><th>Description</th><th>Image1</th><th>Image2</th><th>Image3</th><th>Image4</th><th>Action</th>
</tr>

<?php

/* Category 28 for Top Products */

$sql=mysql_query("SELECT * FROM products WHERE product_code='MAIN-PRODUCT'");

$count = mysql_num_rows($sql);

if($count==0)
{
	echo '<tr><td colspan="9" align="center">No Record Found.</td></tr>';
}
else
{

while($select=mysql_fetch_array($sql))
{
	
	$id=$select['id'];
	$catid=$select['category'];
	$name=$select['product_name'];
	$code=$select['product_code'];
	$desc=$select['product_desc'];
	$proimg1=$select['product_image1']; if($proimg1=="") {$proimg1="noimg.jpg";}
	$proimg2=$select['product_image2'];	if($proimg2=="") {$proimg2="noimg.jpg";}
	$proimg3=$select['product_image3'];	if($proimg3=="") {$proimg3="noimg.jpg";}
	$proimg4=$select['product_image4'];	if($proimg4=="") {$proimg4="noimg.jpg";}
	$img1="../images/products/".$proimg1;
	$img2="../images/products/".$proimg2;
	$img3="../images/products/".$proimg3;
	$img4="../images/products/".$proimg4;

echo "
<tr id='$id'>
<td>".$id."</td><td>".$name."</td><td>".$code."</td><td>".$desc."</td><td><img src='".$img1."' width='60px' height='60px' alt='Image-1'/></td><td><img src='".$img2."' width='60px' height='60px' alt='Image-2'/></td><td><img src='".$img3."' width='60px' height='60px' alt='Image-3'/></td><td><img src='".$img4."' width='60px' height='60px' alt='Image-4'/></td>
<td><a href='product_edit.php?proid=$id&pcatid=0&catid=$catid'><div class='btn btn-primary btn-sm'> Edit </div></a> &nbsp;
<a href='#' onclick='mydel($id)'><div class='btn btn-danger btn-sm'> Delete </div></a></td></tr>";
}

}
?>

</table>
</div>
</div>

</div>
</body>