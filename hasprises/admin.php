<?php

session_start();

include("connection.php");

if(!isset($_SESSION['user']))
{
	header('location:index.php');
}

$user=$_SESSION['user'];

include("header_admin.php");

?>

		<nav class="wsmenu clearfix">
			<ul class="mobile-sub wsmenu-list">
			 
			
			  <li><a href="products.php">Manage Products</a></li>
			  
			
			  
			</ul>
		</nav>
              </div>
           </div>
           
        </div>
      </div>
    </div>
	
	<hr class="set-nav">
    
  </header>



</div>
</body>