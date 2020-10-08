<!DOCTYPE html>
<html lang="en">
<head>
  <title>NutriBytes</title>
  <?php 
  		include 'link.php';
  		include 'db_connect.php';
  ?>
  </head>
<body>

<div class="container">
	<p>&nbsp;</p>
  <h3>Welcome to Nutri Bytes, Please fill below detail for new Offers</h3>
  <hr/>
  <?php

  		
		$name = '';
		$email = '';
		$order = '';
		$quality = '';
		$gender='';

  		if(isset($_POST['submit'])) {
			if(empty($_POST['name'])) {
				echo '<p style="color: red;">Pls enter your name</p>';
			}

			if(empty($_POST['email'])) {
				echo '<p style="color: red;">Pls enter your email</p>';
			}

			if(!empty($_POST['name']) && !empty($_POST['email'])) {
				$name = $_POST['name'];
				$email = $_POST['email'];
				$order = $_POST['order'];
				$quality = $_POST['quality'];
				if(isset($_POST['gender'])) {
					$gender = $_POST['gender'];
				}
				
				$INSERT = "INSERT INTO user_info(name, email, quality, order, gender) VALUE('$name', '$email', '$order', '$quality', '$gender')";

				if ($con->query($INSERT) === TRUE) {
				  echo "New record created successfully";
				  header("Location:index.php");
				} else {
				  echo "Error: " . $INSERT . "<br>" . $con->error;
				}
				$con->close();
			}
  		}

?>
<form method="post" action="">
	<p>
Name: <input type="text" name="name" value="<?php echo $name; ?>">
</p>
<p>
E-mail: <input type="text" name="email" value="<?php echo $email;?>">
</p><p>
order: <textarea name="order" rows="5" cols="40"><?php echo $order;?></textarea>
</p><p>
quality: <input type="text" name="quality" value="<?php echo $quality;?>">
</p><p>
Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other
</p>
<p>
	<input type="submit" name="submit" value="Submit">
	<input type="reset" name="reset" value="Reset">
</p>
</form>


</div>

</body>
</html>