<?php
include("connection.php");

session_start();
if(!isset($_SESSION['user']))
{
	header('location:index.php');
}

$pro_id=$_GET['id'];


$sql=mysql_query("DELETE FROM products WHERE pro_id='$pro_id'");

if($sql)
{
	echo "Delete Successful!";
}

else
{
	echo "Error! Delete was Unsuccessful.";
}
