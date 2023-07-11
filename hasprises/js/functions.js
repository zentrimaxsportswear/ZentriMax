function productdel(id)
{
	if(confirm("You are about to delete a Product's entire record. This will not be reversable. \nAre you sure you want to proceed?") == true)
	{
		$("#"+id).css("display","none");
		
		$.ajax({
		url: "product_delete.php?id="+id, method: "post", dataType: "text", success: function(result) {
			
			alert(result);
			// console.log(result);
		}
		});
	}
		
	else
	{
		return false;
	}

}

function customerdel(id)
{
	if(confirm("You are about to delete a Customer's entire record. This will not be reversable. \nAre you sure you want to proceed?") == true)
	{
		$("#"+id).css("display","none");
		
		$.ajax({
		url: "customer_delete.php?id="+id, method: "post", dataType: "text", success: function(result) {
			
			alert(result);
			// console.log(result);
		}
		});
	}
		
	else
	{
		return false;
	}

}

function LoginError()
{
	alert("Login Error! Incorrect username or password.")
}

function UpdateError()
{
	alert("Error! The record was not updated.")
}

function AddError()
{
	alert("Error! The record was not added.")
}

function ProAddAlert()
{
	alert("The record has been added successfully.")
	window.location='products.php';
}

function ProUpdateAlert()
{
	alert("The record has been updated successfully.")
	window.location='products.php';
}

function CusUpdateAlert()
{
	alert("The record has been updated successfully.")
	window.location='customers.php';
}

function OrderUpdateAlert()
{
	alert("The order has been approved successfully.")
	window.location='admin.php';
}

function OrderDelAlert()
{
	alert("The order has been deleted successfully.")
	window.location='admin.php';
}

function LogOutMsg()
{
	alert("You have Logged Out");
}