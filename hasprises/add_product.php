<?php
session_start();

if(!isset($_SESSION['user']))
{
	header('location:index.php');
}

include("header_admin.php");

include("connection.php");

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

<div class="panel panel-primary" style="width:400px; margin:auto;">
<div class="panel-heading"><h3>Adding New Product</h3></div>
<div class="panel-body">
<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="name">Product Name</label>
<input type="text" class="form-control" name="name" />
</div>


<div class="form-group">
<label for="code">Article no.</label>
<input type="text" class="form-control" name="model" />
</div>

<div class="form-group">
<label for="code">Select Category</label>
	<select class="form-control" name="cat" required>
	  
	<option value="featured" >Featured Products</option>
	<option value="footballplayeruniforms">Football Player Uniforms</option>
	<option value="goalkeeperuniforms">Goal Keeper Uniforms</option>
		<option value="ladiestanktops">Ladies Tank Tops</option>
		<option value="runningtrousers">Running Trousers</option>
		<option value="basketBalluniforms">BasketBall Uniforms</option>
		<option value="hoodies" >hoodies</option>
				<option value="bubblejacket" >Bubble jackets</option>

	<option value="trainingvests">Training Vests</option>
	<option value="tracksuits">Track Suits</option>
	<option value="ladiessuits">Ladies Suits</option>
	<option value="mechanicsgloves">Mechanics Gloves</option>
	<option value="weightliftinggloves">Weight Lifting Gloves</option>
	<option value="cyclinggloves">Cycling Gloves</option>
	<option value="leatherjackets">Leather Jackets</option>
	<option value="rainjackets">Rain Jackets</option>
	<option value="gymshirts">Gym Shirts</option>
	<option value="gymsinglets">Gym Singlets</option>
	<option value="gymjerseys">Gym Jerseys</option>
	<option value="gymtrousers">Gym Trousers</option>
	<option value="gymshorts">Gym Shorts</option>
	<option value="ladiesbras">Ladies Bras</option>
	<option value="ladiesgymleggings">Ladies Gym Leggings</option>
	<option value="ladiesshorts">Ladies Shorts</option>
	<option value="compressionshirtshortsleeves">Compression Shirt Short Sleeves</option>
	<option value="compressionshirtlongsleeves">Compression Shirt Long Sleeves</option>
	<option value="compressionpants">Compression Pants</option>
	<option value="compressionshorts">Compression Shorts</option>
	<option value="ladiescompressionshirtshortsleeves">Ladies Compression Shirt Short Sleeves</option>
	<option value="ladiescompressionshirtLongsleeves">Ladies Compression Shirt Long Sleeves</option>
	<option value="ladiescompressionbras">Ladies Compression Bras</option>
	<option value="ladiescompressionpants">Ladies Compression Pants</option>
	<option value="runningjerseys">Running Jerseys</option>
	<option value="runningshirts">Running Shirts</option>
	<option value="runningsuits">Running Suits</option>
	<option value="runningshorts">Running Shorts</option>
	<option value="ladiesjerseys">Ladies Jerseys</option>
	<option value="ladiessuits">Ladies Suits</option>
	<option value="ladiesshirts">Ladies Shirts</option>
	<option value="ladiesleggings">Ladies Leggings</option>
	<option value="deniemjeans">DeinemJeans</option>
	<option value="judosuits">JudoKrate Suits</option>
	<option value="motorbikesuits">Motorbike Suits</option>
		<option value="sublimationtshirts">Sublimation T-Shirts</option>
			<option value="icehockeyjerseys">Ice Hockey Jerseys</option>

	  
	</select>
</div>

<div class="form-group">
<label for="description">Color</label>
<input type="text" class="form-control" name="color" />
</div>

<div class="form-group">
<label for="description">Description</label>
<input type="text" class="form-control" name="desc" />
</div>



<div class="form-group">

<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;"></div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
	<input type="file" name="img" /></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
</div>

</div>

<button class="btn btn-primary" name="add">Add</button>&nbsp;<button class="btn btn-default" name="cancel">Cancel</button>
</form>
</div>
</div>

</div>

<script>
$('#total_inst').on('input', function() {

    var total = $(this).val(); // get the current value of total.
	var months = $('#months').val();
	var instal = total/months;
	inst = Math.round(instal);
	$('#instalment input').val(inst);
});

$('#months').on('input', function() {

    var months = $(this).val(); // get the current value of months.
	var total = $('#total_inst').val();
	var instal = total/months;
	inst = Math.round(instal);
	$('#instalment input').val(inst);
});
</script>

</body>


<?php

if(isset($_POST['add']))
{
	$name=$_POST['name'];
	$model=$_POST['model'];
	$cat=$_POST['cat'];
	$color=$_POST['color'];
	$desc=$_POST['desc'];
	// $size=$_POST['size'];

	
	$targetfolder = "../images/products/";


	//Image Start//
	if(isset($_FILES['img']) && !empty($_FILES['img']['name']))
	{
		$testimg = $targetfolder . basename( $_FILES['img']['name']);
		$new=move_uploaded_file($_FILES['img']['tmp_name'], $testimg);	
	
		if($new)
		{
			$img=$_FILES['img']['name'];
		}
		
	}
	else
	{
		$img = "noimg.jpg";
	}
	//Image End//
	
	// die($img);


		$sql=mysql_query("INSERT INTO products(pro_name, pro_img, model, color,  category, description) VALUES('$name', '$img', '$model', '$color',  '$cat', '$desc')");
	
		if(!$sql)
		{
			echo "<script> AddError(); </script>";
		}
	
		else
		{
			echo "<script> ProAddAlert(); </script>";
		}

	

}

if(isset($_POST['cancel']))
{
	header('location:products.php');
}
?>