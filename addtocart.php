<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>E-commerce - About Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
</head>

<body> 

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="img/bg.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="img/logo.png" alt="Logo" class="tm-site-logo" /> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">E-Commerce</h1>
								<h6 class="tm-site-description">life is better with handbag</h6>	
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.html" class="tm-nav-link">Home</a></li>
								<li class="tm-nav-li"><a href="about.html" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="contact.html" class="tm-nav-link">Contact</a></li>
                                <li class="tm-nav-li"><a href="bag.php" class="tm-nav-link active"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>

					
        <center>
      <div class="tm-container-inner tm-persons">
          <h3 class="col-12 text-center tm-section-title">PRODUCTS IN CART</h3>
        
            <table width="100%" class="table-item">
                <thead>
                    <tr>
                        <th><center>IMAGE</center></th>
                        <th><center>PRODUCT NAME</center></th>
                        <th><center>QUANTITY</center></th>
                        <th><center>PRICE</center></th>
                    </tr>
                </thead>
<?php

include "connect_item.php"; // Using database connection file here
$value=$_GET['id'];
$records = mysqli_query($db,"SELECT * FROM `item` WHERE id='$value'"); // fetch data from database
$data = mysqli_fetch_array($records);
$username=$data['name'];
$price=$data['amount'];
$pic=$data['image'];
$sql="INSERT INTO `cart`(`id`,`product`, `price`, `quantity`,`pic`) VALUES ('{$value}','{$username}','{$price}','{$_GET['qty']}','{$pic}')";
$result=mysqli_query($db , $sql);
$query="SELECT SUM(quantity*price) AS sum FROM `cart`";
$query_result=mysqli_query($db,$query);
while($row=mysqli_fetch_assoc($query_result)){
    $total=$row['sum'];
}


$select = mysqli_query($db,"SELECT * FROM `cart` "); // fetch data from database
while($var = mysqli_fetch_array($select))

{
?>
  
  <tr>
  <td><center><?php echo "<img src='img/gallery/".$var['pic']."' width='300' height='300'/>"; ?></center></td>
  <td><center><b><?php echo $var['product'] ; ?></b></center></td>
    <td><center><b><?php echo $var['quantity']; ?></b></center></td>
    <td><center><b><?php echo "$",$_GET['qty']*$var['price']; ?></b></center></td>
    <td><center><a href="delete.php?id=<?php echo $var['id'];?>"><button class="remove">REMOVE</button></a></center></td>
    
    
  </tr>	
  
<?php
}
?>
<tr>
      <td colspan="4"><center><b>TOTAL AMOUNT</b></center></td>
      <td><center><b><?php echo "$",$total;?></b></center></td>
      

      
  </tr>
  <tr>
  <td colspan="5" ><center><form action="cart.html" method="POST"><input type="submit" value="PROCEED  TO CHECKOUT"></form></center></td>
</tr>

</table>

<?php mysqli_close($db);  // close connection ?>

</div>
        </center>			
		</main>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2021 E-commerce</p>
		</footer>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
</body>
</html>
