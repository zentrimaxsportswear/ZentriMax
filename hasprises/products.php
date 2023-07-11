<?php
session_start();

include("connection.php");

if(!isset($_SESSION['user']))
{
	header('location:index.php');
}

include("header_admin.php");

?>

		<nav class="wsmenu clearfix">
			<ul class="mobile-sub wsmenu-list">
			  <li><a href="admin.php">Home</a></li>
			
			  <li><a class="active" href="products.php">Manage Products</a></li>
			  
			  
			  
			</ul>
		</nav>
              </div>
           </div>
           
        </div>
      </div>
    </div>
	
	<hr class="set-nav">
    
  </header>

<div class="container">

<?php echo "<a href='add_product.php'>"; ?> <div class="btn btn-default">Add New</div></a>
<br><br>




<br>


<?php
if(isset($_POST['get_cat']))
{

	$category = $_POST['cat'];
	
	if($category=="all")
	{
		$sql=mysql_query("SELECT * FROM products");
	}
	else
	{
		$sql=mysql_query("SELECT * FROM products WHERE category='$category'");
	}
}
else
{
	$sql=mysql_query("SELECT * FROM products");
	
	$category="all";
}
?>

<div class="table-responsive">
<table class="table table-striped table-bordered">
<tr><th colspan="9" style="text-align:center;">Showing Category: <?php echo $category; ?></th></tr>
<tr>
<th>ID</th><th>Name</th><th>Model</th><th>Color</th><th>Image</th><th>Action</th>
</tr>

<?php

$count = mysql_num_rows($sql);

if($count==0)
{
	echo '<tr><td colspan="9" align="center">No Record Found.</td></tr>';
}
else
{

while($select=mysql_fetch_array($sql))
{
	$id=$select['pro_id'];
	$cat=$select['category'];
	$name=$select['pro_name'];
	$model=$select['model'];
	$color=$select['color'];
	// $size=$select['size'];
	
	$proimg=$select['pro_img']; if($proimg=="") {$proimg="noimg.jpg";}
	$img="../images/products/".$proimg;

echo "
<tr id='$id'>
<td>".$id."</td><td>".$name."</td><td>".$model."</td><td>".$color."</td><td><img src='".$img."' width='60px' height='60px' alt='Image'/></td>
<td>
<a href='#' onclick='productdel($id)'><div class='btn btn-danger btn-sm'> Delete </div></a></td></tr>";
}

}
?>

</table>
</div>
</div>

</div>

<!--Radio Button-->
<script>
/* $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
}); */
</script>

</body>