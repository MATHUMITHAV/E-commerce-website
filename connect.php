<?php   
    
    //Database connection
    $con = new mysqli('localhost','root','','e-commerce');
    
   if($con->connect_error){
    die("fail:".$con->connect_error);
   }else{
    if(isset($_POST['submit'])){
    //insertion
        $name= $_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $houseno=$_POST['houseno'];
        $address1=$_POST['address1'];
        $address2=$_POST['address2'];
        $city=$_POST['city'];
        $postcode=$_POST['postcode'];
        $country=$_POST['country'];
        $state=$_POST['state'];
        $sql="INSERT INTO `customer detail`(`name`, `email`, `phone`, `houseno`, `address1`, `address2`, `city`, `postcode`, `country`, `state`) VALUES ('{$name}','{$email}','{$phone}','{$houseno}','{$address1}','{$address2}','{$city}','{$postcode}','{$country}','{$state}')";
        $result=mysqli_query($con , $sql);
        if($result){
            echo "<script> alert('Your order have been placed successfully!');
                       window.location.href='index.html';
             </script>";
        }
    }
   
    }

   
    
    
?>