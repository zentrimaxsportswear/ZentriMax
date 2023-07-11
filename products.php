<?php

include'header.php';

include('hasprises/connection.php');

if(isset($_GET['proid']))
{
	$pro_id = $_GET['proid'];
	
	$sql = mysql_query("SELECT * FROM products WHERE pro_id='$pro_id'");
	
}

else if(isset($_GET['cat']))
{
	$cat = $_GET['cat'];
	
	$sql = mysql_query("SELECT * FROM products WHERE category='$cat'");
	
}

else if(isset($_POST['search']))
{
	$search_input = $_POST['search_input'];
	
	$sql = mysql_query("SELECT * FROM products WHERE pro_name LIKE '%$search_input%' OR category LIKE '%$search_input%'");
}

else
{
	$sql = mysql_query("SELECT * FROM products where category='Football Player Uniforms'");
}




?>
<br><br><br><br><br><br><br>
    <div class="container-fluid">

	
	<section id="page-wrapper">

		<div class="">

			
			<div class="row">

			<div id="page-content-wrapper" class="col-md-push-3 col-lg-9 col-md-9 col-sm-12 col-xs-24">

				<h2 class="heading"><span>Products</span></h2>

				<div class="row">	  <?php
	  
		$count = mysql_num_rows($sql);
		
		if($count==0)
		{
			echo "<div style='text-align:center; margin-top:85px;'><font color='red' size='4'>No Products :D !</font></div>";
		}
		else
		{
			
		while($row=mysql_fetch_array($sql))
		{
			
			$id = $row["pro_id"];
			$name = $row["pro_name"];
			$model = $row["model"];
			$category = $row["category"];

				$img_path = "images/products/".$row["pro_img"];
		
		echo '

					
						
						
		        		        			        		    <div class="prd-container col-lg-3 col-md-4 col-sm-4 col-xs-6"><div class="wrapper"><a href="detail.php?proid='.$id.'" class="prd_container_img"><img src="'.$img_path.'" alt="" style="height: 250px;"></a><a href="detail.php?proid='.$id.'" class="prd_container_zoom prdzoom"><i class="glyphicon glyphicon-eye-open"></i></a><strong>'.$category.'</strong><span>'.$name.'</span><a href="detail.php?proid='.$id.'" class="prd_container_details">view details <i class="glyphicon glyphicon-play"></i></a></div></div>     ';
         
		}
	
		}
	  ?>                           		                                		        		        			        		                                   		        
							
						
					
				</div>

			</div>
<?php include 'side_nav.php'; ?>
		</div>

		</div>

	</section>

        
   <?php

    include'footer.php';

   ?>