<?php
 //Database connection
 $con = new mysqli('localhost','root','','e-commerce');
 $index=$_GET['id'];  
 if($con->connect_error){
  die("fail:".$con->connect_error);
 }else{
    $sql="DELETE FROM `cart` WHERE id='$index'";
	$row=mysqli_query($con,$sql);
	if($row){
		echo "<script> alert('Removed successfully!');
        window.location.href='bag.php';
</script>";
	}else{
        echo "Failed to delete";
	}
 }
?>